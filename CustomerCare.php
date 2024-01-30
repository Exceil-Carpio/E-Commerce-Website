<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Customer Care</title>
      <link rel="stylesheet" href="style.css">
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


    <div class="bgimg-contact">
        <center>
            <br>
            <br>
            <br>
            <br>
            <div class="contact-container">
                <div class="contents-tab">  
                    <div class="left-content">
                        <img src="2.jpg" style="height:500px;width: 100%; border-radius: 20px 0px 0px 20px; opacity: 30%;">
                        <h2 style="color:#fff; margin-top:-350px;"><i style="background: -webkit-linear-gradient(#e60073, #ff99cc);
                        -webkit-background-clip: text;
                        -webkit-text-fill-color: transparent;"> WE </i>VALUE <br> <br>YOU OUR <i style="background: -webkit-linear-gradient(#e60073, #ff99cc);
                        -webkit-background-clip: text;
                        -webkit-text-fill-color: transparent;">CUSTOMERS</i></h2>
                    </div>
                    <div class="right-content">
                        <br><br>
                        <input type="text" id="from_name" name="fname" placeholder="Full Name"  style="height:50px; width: 350px; text-align: center;" required>
                        <br>
                        <input type="text" id="email_add" name="" placeholder="Subject"  style="height:50px; width: 350px; text-align: center; margin-top: 10px;" required>
                        <h4 style="margin-left:-250px;">Message: </h4><br>
                        <textarea id="message" style="height:150px; width: 350px;margin-top:-30px;" required></textarea><br>
                        <h6>Upload image for reference </h6>
                        <input id="inserted_image" type="file" name="Upload file" style="margin-top:-120px;"><br>
                        <button onclick="SendMail(); reset()" type="submit" class="submitbtn" name="Submit">Submit </button>
                    </div>
                </div>
            </div>
        </center>
        
    </div>
       
    <?php include('footer.html')?>
    
</body>
</html>