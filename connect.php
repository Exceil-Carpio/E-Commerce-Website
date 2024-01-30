<?php

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mnum = $_POST['mnum'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $country = $_POST['country'];
    $password = $_POST['password'];
    $photo_name = $_FILES['photo']['name'];
    $photo_tmp = $_FILES['photo']['tmp_name'];

    $path;

    if(!(empty($_FILES['photo']['name']) == true)){
        $path = "profile_pics/".$photo_name;
        move_uploaded_file($photo_tmp, $path);
    }else{
        $path = "profile_pics/no_profile.png";
    }

    $conn = new mysqli('localhost', 'root', '', 'ct_db');
    if($conn->connect_error){
        die ('Connection Failed : ' .$conn->connect_error);
    } else {try {$stmt = $conn->prepare("insert into sign_up (fname, lname, mnum, email, address, country, password, photo)
        values(?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $fname, $lname, $mnum, $email, $address, $country, $password, $path);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        session_start();
		$_SESSION ["flag"] = "";
		header("Location: http://localhost/Website/LoginSignup.php");
	exit();  }
		catch (Exception $e){
			setcookie ("flag", "Try again", time()+3600);
			session_start();
			$_SESSION ["flag"] = "Try again";
			header("Location: http://localhost/Website/Signup.php");
			exit();
		}
    }

?>