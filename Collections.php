<?php
session_start();
$_SESSION["flag"] = "";

include 'config.php';

if(isset($_POST['add_to_cart'])){

    $customer_id = $_SESSION['id'];
    $product_image = $_POST['product_image'];
    $prod_id = $_POST['prod_id'];
    $product_quantity = 1;
    $flag = $_POST['flag'];

    if($flag == "not loggged in"){
      header("Location: http://localhost/Website/LoginSignup.php");
    }else{
      $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE prod_id = '$prod_id' AND id = '$customer_id'");
 
      if(mysqli_num_rows($select_cart) > 0){
         $message[] = 'Product Already Added to Cart';
      }else{
         $insert_product = mysqli_query($conn, "INSERT INTO `cart`(id, prod_id, image, quantity) VALUES('$customer_id', '$prod_id', '$product_image', '$product_quantity')");
         $message[] = 'Product Added to Cart Succesfully';
      }
    }
 
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Collections</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style3.css">
    <link rel="stylesheet" href="new.css">
    <script src= "https://kit.fontawesome.com/11ac07d21b.js" crossorigin= "anonymous"></script>
</head>
<body>


<?php include('navigation.html')?>
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>


<div class="container">

<section class="products">
   <div class="box-container">

      <?php
      
      $select_products = mysqli_query($conn, "SELECT * FROM `products`");
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
      ?>

      <form action="" method="post">
         <div class="boxx">
            <input type="hidden" name="flag" value="<?php 
               if(empty($_SESSION['id'])){
                  echo "not loggged in";
               }else{
                  echo "logged in";
               }
            ?>">
            <input type="hidden" name="prod_id" value="<?php echo $fetch_product['prod_id']; ?>">
            <img class="picc" src="imagess/<?php echo $fetch_product['prod_image']; ?>" alt="">
            <h3><?php echo $fetch_product['prod_name']; ?></h3>
            <div class="pricee">$<?php echo $fetch_product['prod_price']; ?></div>
            <input type="hidden" name="product_name" value="<?php echo $fetch_product['prod_name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['prod_price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['prod_image']; ?>">
            <input type="submit" class="bttn" value="add to cart" name="add_to_cart">
         </div>
      </form>

      <?php
         };
      };
      ?>

   </div>
   </div>

</section>

</div>
    
    <?php include('footer.html')?>
</body>
</html>