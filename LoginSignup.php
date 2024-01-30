<?php

session_start();
$_SESSION["flag"] = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/retrieve.php";
    
    $sql = sprintf("SELECT * FROM sign_up
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    
    if ($user) {
        if ($_POST["password"] == $user["password"]) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["id"] = $user["id"];
            
            header("Location: http://localhost/Website/Homepage.php");
            exit;
        }else {
			echo '<script>alert("Incorrect Password")</script>';
		}
    }else {
        echo '<script>alert("Email does not exist")</script>';
    }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Login</title>
      <link rel="stylesheet" href="login2.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src= "https://kit.fontawesome.com/11ac07d21b.js" crossorigin= "anonymous"></script>
      <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
      <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/> -->
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src= "https://kit.fontawesome.com/11ac07d21b.js" crossorigin= "anonymous"></script>
      <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
   </head>
   <body>

   <?php include('navigation.html')?>


      <section class="login-container forms">
        <div class="form login">
            <div class="form-content">
                <header>Login</header>
                <form method = "post">
                    <div class="field input-field">
                        <input type="email" placeholder="Email" class="input" name="email">
                    </div>

                    <div class="field input-field">
                        <input type="password" placeholder="Password" class="password" name="password">
                        <i class='bx bx-hide eye-icon'></i>
                    </div>

                    <div class="form-link">
                        <a href="#" class="forgot-pass">Forgot password?</a>
                    </div>

                    <div class="field button-field">
                        <button type = "submit">Login</button>
                    </div>
                </form>

                <div class="form-link">
                    <span>Don't have an account? <a href="SignUp.php">Signup</a></span>
                </div>
            </div>
        </div>

       
                <div class="form-link">
                    <span>Already have an account? <a href="#" class="link login-link">Login</a></span>
                </div>
            </div>
        </div>
    </section>


    <?php include('footer.html')?>

    <script>
        const forms = document.querySelector(".forms"),
        pwShowHide = document.querySelectorAll(".eye-icon"),
        links = document.querySelectorAll(".link");

        pwShowHide.forEach(eyeIcon => {
        eyeIcon.addEventListener("click", () => {
        let pwFields = eyeIcon.parentElement.parentElement.querySelectorAll(".password");
        
        pwFields.forEach(password => {
            if(password.type === "password"){
                password.type = "text";
                eyeIcon.classList.replace("bx-hide", "bx-show");
                return;
            }
            password.type = "password";
            eyeIcon.classList.replace("bx-show", "bx-hide");
            })
        
            })
            })      

        links.forEach(link => {
            link.addEventListener("click", e => {
            e.preventDefault(); //preventing form submit
            forms.classList.toggle("show-signup");
            })
        })
    </script>
    </body>
</html>