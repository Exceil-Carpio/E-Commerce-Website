<?php
session_start();
$_SESSION["flag"] = "";

if(!isset($_SESSION['first'])){
    $_SESSION['id'] = "";
    $_SESSION['first'] = "True";
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Homepage</title>
      <link rel="stylesheet" href="style3.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src= "https://kit.fontawesome.com/11ac07d21b.js" crossorigin= "anonymous"></script>
      <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/> -->
      <script src="script.js" type="text/javascript"></script>
      <script type="text/javascript"
      src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
      <script type="text/javascript">
      emailjs.init('xHWj4eOf20N9Qy_cc')
      </script>
   </head>
   <body>
      <?php include('navigation.html')?>

    <div class="bgimg1">
        <div class="slider">
            <div class="slides">
                <input type="radio" name="radio-btn" id="radio1">
                <input type="radio" name="radio-btn" id="radio2">
                <input type="radio" name="radio-btn" id="radio3">
                <input type="radio" name="radio-btn" id="radio4">

                <div class="slide first">
                    <img src="slider1.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="slider2.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="slider3.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="slider4.jpg" alt="">
                </div>

                <div class="navigation-auto">
                    <div class="auto-btn1"></div>
                    <div class="auto-btn2"></div>
                    <div class="auto-btn3"></div>
                    <div class="auto-btn4"></div>
                </div>
            </div>

            <div class="navigation-manual">
                <label for="radio1" class="manual-btn"></label>
                <label for="radio2" class="manual-btn"></label>
                <label for="radio3" class="manual-btn"></label>
                <label for="radio4" class="manual-btn"></label>
            </div>
        </div>
    </div>

    <div class="shippingnationwide">
        <p style="text-align:center; font-size:13px;">
            <span class="color_15"><span style="letter-spacing:0.3em;">SHIPPING NATIONWIDE</span>
            </span>
        </p>
    </div>

    <div class="Featured">
        <h6 style="text-align:center; font-size:45px;" class="font_6">
        <span style="letter-spacing:10.8000001907349px;">
        <span style="font-family:times new roman,times,serif;"><b>TRENDSETTING</b></span>
        </span></h6>
    
        <div class="Musthave">
            <h2 style="text-align:center; font-size:19px;">
            <span style="font-family:raleway, sans-serif; font-weight:normal; 
            letter-spacing:0.3em; line-height:normal; text-align:center;">Must Have Items</span></h2>
        </div>    

        <div class="rowpics">
            <figure class="pics">
                <figure>
                <a href="#"><img src="11.jpg" alt="" height="400" width="300"></a>
                </figure>
                <figcaption>
                    <a href="#" style="color:white">Hot Sales</a>
                </figcaption>
            </figure>

            <figure class="pics">
                <a href="#"><img src="12.jpg" alt="" height="400" width="300"></a>
                <figcaption>
                    <a href="#" style="color:white">New Arrivals</a>
                </figcaption>
            </figure>
        </div>
    </div>


    <div class="bgimg2">
        <div class="form">
            <form name="form" onsubmit="reset();">
                <h3> WE WOULD LIKE TO HEAR FROM YOU</h3>
                <input type="text" id="from_name" name="fname" placeholder="Enter your Name" required>
                <input type="email" id="email_add" name="" placeholder="Enter your Email Address" required>
                <!-- <input type="phone" id="phone" placeholder="Enter your Phone Number"> -->
                <textarea id="message" rows="4" placeholder="How can we help you?" required></textarea>
                <button onclick="SendMail(); reset()" type="submit">Submit</button>
            </form>
        </div>
    </div>

    <?php include('footer.html')?>
    
   </body>
</html>