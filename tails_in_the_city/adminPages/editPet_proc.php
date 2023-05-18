<?php 
  include("../connect.php");
  session_start();
  if (isset($_POST['editPet_delete'])){
    $orig_id = $_SESSION['original_id'];
    $id = $_SESSION['original_id'];
    # delete from pets table
    $sql1 = "DELETE FROM pets WHERE pet_id='$orig_id';";
    $res = mysqli_query($conn, $sql1);
    # delete from parent_pet table
    $sql2 = "DELETE FROM parent_pet WHERE user_pet_id='$orig_id';";
    $res = mysqli_query($conn, $sql2);
  }
  elseif(isset($_POST['editPet_edit'])){
    $orig_id = $_SESSION['original_id'];
    $pet_id =  $_POST['pet_id'];
    $pet_name = $_POST['pet_name'];
    $pet_type = $_POST['pet_type'];
    $pet_gender = $_POST['pet_gender'];
    $pet_breed = $_POST['pet_breed'];
    $pet_age = $_POST['pet_age'];
    $pet_color = $_POST['pet_color'];

    $sql = "UPDATE pets SET pet_id = '$pet_id', pet_name = '$pet_name', pet_type = '$pet_type', 
    gender = '$pet_gender', breed = '$pet_breed', breed = '$pet_breed', 
    age = '$pet_age', color = '$pet_color' WHERE pet_id = '$orig_id';";

    $res = mysqli_query($conn, $sql);

    # if id is changed change the parent_pet table too
    if($orig_id != $pet_id){
    $sql = "UPDATE parent_pet SET user_pet_id = '$pet_id' WHERE user_pet_id = '$orig_id';";
    $res = mysqli_query($conn, $sql);
    }
  }
// Close connection
mysqli_close($conn);
header('Location: admin.php');
?>