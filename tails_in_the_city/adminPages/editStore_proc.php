<?php 
  include("../connect.php");
  session_start();
  if (isset($_POST['edititem_delete'])){
    $orig_id = $_SESSION['original_id'];
    $id = $_SESSION['original_id'];
    $sql1 = "DELETE FROM store WHERE item_id='$orig_id';";
    $res = mysqli_query($conn, $sql1);
  }
  elseif(isset($_POST['edititem_edit'])){
    $orig_id = $_SESSION['original_id'];
    $item_id =  $_POST['item_id'];
    $item_name = $_POST['item_name'];
    $item_category = $_POST['item_category'];
    $item_price = $_POST['item_price'];
    $item_quantity = $_POST['item_quantity'];

    $sql = "UPDATE store SET item_id = '$item_id', item_name = '$item_name',
    item_category = '$item_category', item_price = '$item_price', quantity = '$item_quantity' WHERE item_id = '$orig_id';";

    $res = mysqli_query($conn, $sql);

    # if id is changed change the parent_item table too
    if($orig_id != $item_id){
    $sql = "UPDATE purchases SET item_id = '$item_id' WHERE item_id = '$orig_id';";
    $res = mysqli_query($conn, $sql);
    }
  }
// Close connection
mysqli_close($conn);
header('Location: admin.php');
?>