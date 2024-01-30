<!DOCTYPE html>
<?php
session_start();
if ($_SESSION["flag"] == "Try again"){
	echo '<script>alert("Email is already in use")</script>';
}
?>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>SignUp</title>
      <link rel="stylesheet" href="style3.css">
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
      

      <div class="container">
        <div class="row">
                <div class="col-12">
                    <!-- Page title -->
                    <div class="my-5">
                        <h3>Create Account</h3>
                        <hr>
                    </div>
                    <!-- Form START -->
                    <form id="signForm" class="file-upload" action="connect.php" method="post" enctype = "multipart/form-data">
                        <div class="row mb-5 gx-5">
                            <!-- Contact detail -->
                            <div class="col-xxl-8 mb-5 mb-xxl-0">
                                <div class="bg-secondary-soft px-4 py-5 rounded">
                                    <div class="row g-3">
                                        <h4 class="mb-4 mt-0">Contact detail</h4>
                                        <!-- First Name -->
                                        <div class="col-md-6">
                                            <label class="form-label">First Name <span class="requiredIndic">*</span></label>
                                            <input type="text" class="form-control" placeholder="" aria-label="First name" name="fname" required>
                                        </div>
                                        <!-- Last name -->
                                        <div class="col-md-6">
                                            <label class="form-label">Last Name <span class="requiredIndic">*</span></label>
                                            <input type="text" class="form-control" placeholder="" aria-label="Last name" name="lname" required>
                                        </div>
                                        <!-- Mobile number -->
                                        <div class="col-md-6">
                                            <label class="form-label">Mobile number <span class="requiredIndic">*</span></label>
                                            <input type="text" class="form-control" placeholder="" aria-label="Mobile number" name="mnum" required>
                                        </div>
                                        <!-- Email -->
                                        <div class="col-md-6">
                                            <label for="inputEmail4" class="form-label">Email <span class="requiredIndic">*</span></label>
                                            <input type="email" class="form-control" id="inputEmail4" name="email" required>
                                        </div>
                                        <!-- Address -->
                                        <div class="col-md-6">
                                            <label class="form-label">Address <span class="requiredIndic">*</span></label>
                                            <input type="text" class="form-control" placeholder="" aria-label="Address" name="address" required>
                                        </div>
                                        <!-- Country -->
                                        <div class="col-md-6">
                                            <label class="form-label">Country <span class="requiredIndic">*</span></label>
                                            <input type="text" class="form-control" placeholder="" aria-label="Country" name="country" required>
                                        </div>
                                        <!-- Password -->
                                        <div class="col-md-6">
                                            <label class="form-label">Password <span class="requiredIndic">*</span></label>
                                            <input type="password" onkeyup="validation()" class="form-control" placeholder="" aria-label="Password" name="password" id="password" required>
                                            <span id="errorMsg" class="requiredIndic"></span>
                                        </div>
                                        <!-- Confirm Password -->
                                        <div class="col-md-6">
                                            <label class="form-label">Confirm Password<span class="requiredIndic">*</span></label>
                                            <input type="password" onkeyup="matchPass()" class="form-control" placeholder="" aria-label="Confirm Password" name="confirm_password" id="confirm_password" required>
                                            <span id="errorMsgC" class="requiredIndic"></span>
                                        </div>

                                    </div> <!-- Row END -->
                                </div>
                            </div>
                            <!-- Upload profile -->
                            <div class="col-xxl-4">
                                <div class="bg-secondary-soft px-4 py-5 rounded">
                                    <div class="row g-3">
                                        <h4 class="mb-4 mt-0">Upload your profile photo</h4>
                                        <div class="text-center">
                                            <!-- Image upload -->
                                            <div class="square position-relative display-2 mb-3">
                                                <img class="profilePic" src='profile_pics/no_profile.png' width=250 height=250 id="profilePic"/>
                                            </div>
                                            <!-- Button -->
                                            <input type="file" onchange="showPreview(event)" accept="image/jpeg, image/png" id="customFile" name="photo" hidden=""/>
                                            <label class="btn btn-success-soft btn-block" for="customFile">Upload</label>
                                            <button type="button" onclick="removeImage()" class="btn btn-danger-soft">Remove</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- Row END -->

                        <!-- button -->
                        <div class="gap-3 d-md-flex justify-content-md-end text-center">
                            <a href="LoginSignup.php">
                            <button type="button" class="btn btn-danger btn-lg">Log In</button>
                            </a>
                            <button type="submit" id="btnSubmit" class="btn btn-primary btn-lg" disabled>Create Account</button>
                        </div>
                    </form> <!-- Form END -->
                </div>
            </div>
        </div>
        
        <?php include('footer.html')?>

        <script>
            var image = document.getElementById("profilePic");
            var password = document.getElementById('password');
			var confirm_password = document.getElementById('confirm_password');
            var btnSubmit = document.getElementById('btnSubmit');
			var customFile = document.getElementById('customFile');
            
            function showPreview(event){
                if(event.target.files.length > 0){
                    var src = URL.createObjectURL(event.target.files[0]);
                    image.src = src;
                    image.style.display = "block";
                }
            }
			
			function removeImage(){
                if(customFile.value != ''){
                    customFile.value = '';
                    image.src = 'profile_pics/no_profile.png';
                }
            }
            
            function validation(){
                if (password.value.length < 8) {
                    document.getElementById("errorMsg").innerHTML = "Password must be at least 8 characters in length";
                    btnSubmit.disabled = true;
                } else if (!(/^[A-Za-z0-9]*$/.test(password.value))){
                    document.getElementById("errorMsg").innerHTML ="Password must contain only numbers and letters";
                    btnSubmit.disabled = true;
                }else{
                    document.getElementById("errorMsg").innerHTML ="";
                    if(password.value != confirm_password.value && confirm_password.value.length <= 8){
                        if(confirm_password.value == ""){
                            document.getElementById("errorMsgC").innerHTML = "";
                        }else{
                            document.getElementById("errorMsgC").innerHTML = "Passwords does not match";
                        }
                        btnSubmit.disabled = true;
                    }else{
                        document.getElementById("errorMsgC").innerHTML = "";
                        btnSubmit.disabled = false;
                    }
                }
            }

            function matchPass(){
                if(password.value != confirm_password.value){
                    document.getElementById("errorMsgC").innerHTML = "Passwords does not match";
                    btnSubmit.disabled = true;
                }else if(password.value.length >= 8){
                    document.getElementById("errorMsgC").innerHTML = "";
                    btnSubmit.disabled = false;
                }
            }

        </script>
    </body>
</html>