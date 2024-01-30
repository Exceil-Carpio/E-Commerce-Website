<?php
	session_start();
	$_SESSION["flag"] = "";
	 
	$mysqli = require __DIR__ . "/retrieve.php";
		
	$sql = sprintf("SELECT * FROM sign_up
					WHERE id = '%s'",
				   $mysqli->real_escape_string($_SESSION["id"]));
		
	$result = $mysqli->query($sql);
		
	$user = $result->fetch_assoc();
		
	if (!$user) {
		header("Location: http://localhost/Website/LoginSignup.php");
		exit;
	}
	
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>My Account</title>
      <link rel="stylesheet" href="style3.css">
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
                        <h3>My Account</h3>
                        <hr>
                    </div>
                    <!-- Form START -->
                    <form class="file-upload" action="update.php" method="post" enctype = "multipart/form-data">
						<input type="hidden" name="id" value="<?php echo $user['id']?>" />
						<input type="hidden" name="photoBackup" id="photoBackup" value="<?php echo $user['photo']?>" />
						<input type="hidden" name="password" value="<?php echo $user['password']?>" />
                        <div class="row mb-5 gx-5">
                            <!-- Contact detail -->
                            <div class="col-xxl-8 mb-5 mb-xxl-0">
                                <div class="bg-secondary-soft px-4 py-5 rounded">
                                    <div class="row g-3">
                                        <h4 class="mb-4 mt-0">Contact detail</h4>
                                        <!-- First Name -->
                                        <div class="col-md-6">
                                            <label class="form-label">First Name <span class="requiredIndic">*</span></label>
                                            <input type="text" class="form-control" placeholder="" aria-label="First name" name="fname" value="<?php echo $user['fname']?>">
                                        </div>
                                        <!-- Last name -->
                                        <div class="col-md-6">
                                            <label class="form-label">Last Name <span class="requiredIndic">*</span></label>
                                            <input type="text" class="form-control" placeholder="" aria-label="Last name" name="lname" value="<?php echo $user['lname']?>">
                                        </div>
                                        <!-- Mobile number -->
                                        <div class="col-md-6">
                                            <label class="form-label">Mobile number <span class="requiredIndic">*</span></label>
                                            <input type="text" class="form-control" placeholder="" aria-label="Phone number" name="mnum" value="<?php echo $user['mnum']?>">
                                        </div>
                                        <!-- Email -->
                                        <div class="col-md-6">
                                            <label for="inputEmail4" class="form-label">Email <span class="requiredIndic">*</span></label>
                                            <input type="email" class="form-control" id="inputEmail4" name="email" value="<?php echo $user['email']?>">
                                        </div>
                                        <!-- Address -->
                                        <div class="col-md-6">
                                            <label class="form-label">Address <span class="requiredIndic">*</span></label>
                                            <input type="text" class="form-control" placeholder="" aria-label="Phone number" name="address" value="<?php echo $user['address']?>">
                                        </div>
										
										<div class="col-md-6">
                                            <label class="form-label">Country <span class="requiredIndic">*</span></label>
                                            <input type="text" class="form-control" placeholder="" aria-label="Phone number" name="country" value="<?php echo $user['country']?>">
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
                                                <img class="profilePic" src="<?php echo $user['photo']?>" width=250 height=250 id="profilePic"/>
                                            </div>
                                            <!-- Button -->
                                            <input type="file" onchange="showPreview(event)" accept="image/jpeg, image/png" id="customFile" name="photo" hidden="">
                                            <label class="btn btn-success-soft btn-block" for="customFile">Upload</label>
                                            <button type="button" onclick="removeImage()" class="btn btn-danger-soft">Remove</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- Row END -->

                        <!-- button -->
                        <div class="gap-3 d-md-flex justify-content-md-end text-center">
                            <button onclick="logoutAcc()" type="button" class="btn btn-danger btn-lg">Log Out</button>
                            <button type="submit" name ="update" class="btn btn-primary btn-lg">Update profile</button>
                        </div>
                    </form> <!-- Form END -->
                </div>
            </div>
        </div>
        
        <?php include('footer.html')?>
		
		<script>
		
			var image = document.getElementById("profilePic");
			var customFile = document.getElementById('customFile');
			var back_up = document.getElementById('photoBackup');
            
            function showPreview(event){
                if(event.target.files.length > 0){
                    var src = URL.createObjectURL(event.target.files[0]);
                    image.src = src;
                    image.style.display = "block";
                }
            }
			
			function removeImage(){
                if(image.src != 'profile_pics/no_profile.png'){
                    customFile.value = '';
					back_up.value = "profile_pics/no_profile.png";
                    image.src = 'profile_pics/no_profile.png';
                }
            }
		
			function logoutAcc(){
				window.location.replace("http://localhost/Website/reset.php");
			}
		
		</script>

      </body>
    </html>