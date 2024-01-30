<?php

 $conn = new mysqli('localhost', 'root', '', 'ct_db');

   if($conn->connect_error){
        die ('Connection Failed : ' .$conn->connect_error);
    }else{
		
		$id = $_POST['id'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$mnum = $_POST['mnum'];
		$address = $_POST['address'];
		$country = $_POST['country'];
		$password = $_POST['password'];
		$photo_name = $_FILES['photo']['name'];
		$photo_tmp = $_FILES['photo']['tmp_name'];
		$back_up = $_POST['photoBackup'];
		
			$path;

			if(!(empty($_FILES['photo']['name']) == true)){
				$path = "profile_pics/".$photo_name;
				move_uploaded_file($photo_tmp, $path);
			}else{
				$path = $back_up;
			}
				
			mysqli_query($conn, "UPDATE sign_up SET 
				fname = '$fname',
				lname = '$lname',
				email = '$email',
				mnum = '$mnum',
				address = '$address',
				country = '$country',
				password = '$password',
				photo = '$path' 
				WHERE id = $id");

		session_start();
		$_SESSION["email"] = $email;

		header("Location: http://localhost/Website/Account.php");
		exit;
	}

?>