<?php 
  include("../connect.php");
  session_start();
  if (isset($_POST['editvet_delete'])){
    $orig_id = $_SESSION['original_id'];
    $id = $_SESSION['original_id'];
    $sql1 = "DELETE FROM vet WHERE vet_id='$orig_id';";
    $res = mysqli_query($conn, $sql1);
  }
  elseif(isset($_POST['editvet_edit'])){
    $orig_id = $_SESSION['original_id'];
    $vet_id =  $_POST['vet_id'];
    $vet_name = $_POST['vet_name'];
    $vet_email = $_POST['vet_email'];
    $vet_phone = $_POST['vet_phone'];
    $vet_address = $_POST['vet_address'];

    $sql = "UPDATE vet SET vet_id = '$vet_id', vet_name = '$vet_name', 
    email = '$vet_email', phone = '$vet_phone', vet_address = '$vet_address' WHERE vet_id = '$orig_id';";

    $res = mysqli_query($conn, $sql);
  }
// Close connection
mysqli_close($conn);
header('Location: admin.php');
?>