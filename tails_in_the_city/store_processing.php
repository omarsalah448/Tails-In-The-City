<!-- add to selected items from store to data base -->
<?php
include("connect.php");
session_start();
# check if the user is signed in
if ($_SESSION['loggedIn'] == false){
  header('Location: Menutest.php');
}

$user_id=   $_SESSION["user_id"];

$itemid=$_POST["item_id"];
$itemname=$_POST["item_name"];
// $item_price=$_POST["item_price"];
$itemquantity=$_POST["item_quantity"];
$purchased_quantity=$_POST["entered_quantity"];

// print_r($purchased_quantity);

$date = date('d-m-y h:i:s');
$sql = "INSERT INTO purchases (user_id, item_id,purchase_date, quantity)
VALUES ('$user_id','$itemid', '$date', '$purchased_quantity')";

$sql2 = "UPDATE store
SET quantity = GREATEST(store.quantity - '$purchased_quantity', 0)
WHERE store.item_id = '$itemid';";

$result = mysqli_query($conn, $sql2);


if(mysqli_query($conn, $sql)){
  // echo "successful"; 
  header('Location:http://localhost/tails_in_the_city/view_purchases.php');                                
  } else{
      echo "no";
  }
  
  
  // Close connection
  mysqli_close($conn);