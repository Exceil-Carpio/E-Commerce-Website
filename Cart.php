<?php
session_start();
$_SESSION["flag"] = "";
?>

<?php
include 'config.php';

$customer_id = $_SESSION['id'];

if(isset($_POST['update_update_btn'])){
	$update_value = $_POST['update_quantity'];
   $prod_id = $_POST['prod_id'];
	$update_quantity_query = mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_value' WHERE prod_id = '$prod_id' AND id = '$customer_id'");

 };
 
 if(isset($_GET['remove'])){
	$remove_id = $_GET['remove'];
   $prod_id = $_GET['prod_id'];
	mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id' AND prod_id = '$prod_id'");
	header('location:Cart.php');
 };
 
 if(isset($_GET['delete_all'])){
	mysqli_query($conn, "DELETE FROM `cart`");
	header('location:Cart.php');
 }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Cart</title>
      <link rel="stylesheet" href="style3.css">
	   <link rel="stylesheet" href="new2.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src= "https://kit.fontawesome.com/11ac07d21b.js" crossorigin= "anonymous"></script>
   </head>
   <body>

   <?php include('navigation.html')?>


   <!-- Cart Section -->
   <div class="container">

<section class="shopping-cart">

   <h1 class="heading">Shopping Cart</h1>

   <table>

      <tbody>

         <?php 
         
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE id = '$customer_id'");
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            echo "<thead>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>Action</th>
            </thead>";
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
               $prodCart_id = $fetch_cart['prod_id'];
               $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE prod_id = '$prodCart_id'");
               $fetch_product = mysqli_fetch_assoc($select_products);
         ?>

         <tr>
            <td><img src="imagess/<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
            <td><?php echo $fetch_product['prod_name']; ?></td>
            <td>$<?php echo number_format($fetch_product['prod_price']); ?></td>
            <td>
               <form action="" method="post">
                  <input type="hidden" name="prod_id" value="<?php echo $fetch_product['prod_id']; ?>">
                  <input type="number" name="update_quantity" min="1"  value="<?php echo $fetch_cart['quantity']; ?>" >
                  <input type="submit" value="Update" name="update_update_btn">
               </form>   
            </td>
            <td>$<?php echo $sub_total = number_format($fetch_product['prod_price'] * $fetch_cart['quantity']); ?></td>
            <td><a href="Cart.php?remove=<?php echo $fetch_cart['id']; ?>&prod_id=<?php echo $fetch_cart['prod_id'];?>" onclick="return confirm('remove item from cart?')" class="delete-btn"> <i class="fas fa-trash"></i> Remove</a></td>
         </tr>
         <?php
           $grand_total += $sub_total;  
            };
         }
         else{
            echo "<div class='center'>
            <h2> Your cart is empty </h2>
            </div>";
         }
         ?>
         <?php
                  $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE id = '$customer_id'");
                 // $grand_total = 0;       
              
                  if(mysqli_num_rows($select_cart) > 0){
                     echo "  
                     <tr class='table-bottom'>
                     <td><a href='Collections.php' class='option-btn' style='margin-top: 0;'>Continue Shopping</a></td>
                     <td colspan='3'>Grand Total</td>
                     <td> $  $grand_total </td>
                     <td><a href='Cart.php?delete_all' onclick='return confirm('are you sure you want to delete all?');' class='delete-btn'> <i class='fas fa-trash'></i> Delete All </a></td>
                  </tr>";
                  }else{
                     echo "<td><a href='Collections.php' class='option-btn' style='margin-top: 0;'>Continue Shopping</a></td>";
                  }

         ?>

      </tbody>

   </table>

</section>

</div>



<?php include('footer.html')?>



</body>
</html>