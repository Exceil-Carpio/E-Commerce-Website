<?php
session_start();
$_SESSION["flag"] = "";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>About</title>
      <link rel="stylesheet" href="style3.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src= "https://kit.fontawesome.com/11ac07d21b.js" crossorigin= "anonymous"></script>
      <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/> -->
   </head>
   <body>

    <?php include('navigation.html')?>

    <div class="abt-bgimg1">
        <center>
            <br>
            <br>
            <br>
            <div class="our_story" style="width:80%; height:400px; background-color: #fff; margin-top: 20px; margin-bottom: 20px; border-radius: 20px; box-shadow: 2px 2px 6px #000;">
                <br><h2>Our Story</h2><br>
                <p>Welcome to <b><em>Chosen Trends</em></b>, your one-stop shop for thrift apparel for women and men. We're dedicated to providing you with the fullest good clothing product.<br> With a focus on being fashionable, affordable, unique, and customer service satisfaction. Since its founding in 2022 in Buting, Pasig City, has come a long way. </p> <br>
                <p>When we originally began out, we were seeking for a source of income that suited our passion for fashion style. Our passion benefits not just ourselves and our customers by delivering high-quality clothing at a affordable price, but also by encouraging everyone to be more eco-friendly. We now serve customers all over nationwide. With our product, we want to help you start your own chosen trend.</p>    
            </div>

            <br>
            <br>
            <br>
            <div class="mission_vision" style="margin-bottom: 30px; display:flex; margin:20px; justify-content: center;">     
                <div class="mission" style="width:300px; height:400px; background-color: #fff; border-radius: 15px; box-shadow: 2px 2px 6px #a3a3a3;">
                        <div class="content-desc">
                            <h2 style="text-transform: uppercase; margin-top: 30px; font-size:24px;font-weight: bold;background-color: #000; color:#fff;">Mission</h2>
                            <br>
                        
                            <p style="color:#000">To provide you with quality and affordable styles according to your chosen trend.</p>
                        </div>
                </div>
                <div class="vision" style="width:300px; height:400px; background-color: #fff;margin-left: 30px;border-radius: 15px; box-shadow: 2px 2px 6px #a3a3a3;">
                    <div class="content-desc">
                        <h2 style="text-transform: uppercase; margin-top: 30px; font-size:24px;font-weight: bold;background-color: #000; color:#fff;">Vision</h2>
                        <br>
                    
                        <p style="color:#000">We aim to give timeless garments and encourage you to make your own trend.</p>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
        </center>

        <?php include('footer.html')?>
    </div> 

</body>
</html>