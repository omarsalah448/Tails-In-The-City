<?php
session_start();
include("../connect.php");

if ($_SESSION['errors']){
    header('Location: edit_breeding_status.php');
    exit();
}

$petid=$_POST["pet_id"];
$pet_breeding_status=$_POST["pet_breeding_status"];

//check if the pet id is valid
$sql = "SELECT * FROM pets WHERE pet_id = '$petid'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 0) {
    echo "Pet ID is invalid!";
   // header("Location: http://localhost/tails_in_the_city/adminPages/edit_breeding_status.php");
    exit();
}
//else update the pet breeding status
else{
    $sql = "UPDATE pets SET breeding_status = '$pet_breeding_status' WHERE pet_id = '$petid'";
    $result = mysqli_query($conn, $sql);
    if(!$result){
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      #  header("Location: http://localhost/tails_in_the_city/adminPages/edit_breeding_status.php");
        exit();
    }
    else{
   // echo "Pet breeding status updated!";
    $_SESSION["success"] =$pet_breeding_status;
    header("Location: http://localhost/tails_in_the_city/adminPages/edit_breeding_status.php?type=redirect");
    exit();
    }
} 