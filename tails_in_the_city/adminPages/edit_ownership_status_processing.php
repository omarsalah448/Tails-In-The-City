<?php
session_start();
include("../connect.php");

if ($_SESSION['errors']){
  header('Location: edit_ownership_status.php');
  exit();
}

$petid=$_POST["pet_id"];
$pet_ownership_status=$_POST["pet_ownership_status"];
$ownerid=$_POST["owned"];

//check if the pet id is valid
$sql = "SELECT * FROM pets WHERE pet_id = '$petid'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 0) {
    echo "Pet ID is invalid!";
   // header("Location: http://localhost/tails_in_the_city/adminPages/edit_ownership_status.php");
    exit();
}
//else update the pet breeding status
else{
    //get old pet ownership status
    $sql = "SELECT * FROM pets WHERE pet_id = '$petid'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $old_pet_ownership_status = $row["own_status"];

    if($old_pet_ownership_status == "owned" && $pet_ownership_status == "adopt"){
        //drop pet from parent_pet table
        $sql = "DELETE FROM parent_pet WHERE user_pet_id = '$petid'";
        $result = mysqli_query($conn, $sql);
        if(!$result){
            echo "Error in deletion from parent pet: " . $sql . "<br>" . mysqli_error($conn);
         //  header("Location: http://localhost/tails_in_the_city/adminPages/edit_ownership_status.php");
            exit();
        }

        else{
            $sql = "UPDATE pets SET own_status = '$pet_ownership_status' WHERE pet_id = '$petid'";
            $result = mysqli_query($conn, $sql);
            if(!$result){
                echo "Error in update: " . $sql . "<br>" . mysqli_error($conn);
             //  header("Location: http://localhost/tails_in_the_city/adminPages/edit_ownership_status.php");
                exit();
        }
        $_SESSION["success"] =$pet_ownership_status;
        header("Location: http://localhost/tails_in_the_city/adminPages/edit_ownership_status.php");
    }
      //if old pet ownership status is adopt and new pet ownership status is owned
    }
    elseif($old_pet_ownership_status == "adopt" && $pet_ownership_status == "owned"){

        //check that ownerid is not empty
        if(empty($ownerid)){
            echo "Owner ID is empty!";
         //  header("Location: http://localhost/tails_in_the_city/adminPages/edit_ownership_status.php");
            exit();
        }
       else{ 
         //check if the owner id is valid
        $sql = "SELECT * FROM users WHERE user_id = '$ownerid'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 0) {
            echo "Owner ID is invalid!";
           // header("Location: http://localhost/tails_in_the_city/adminPages/edit_ownership_status.php");
            exit();
        }
        else{
            //add pet to parent_pet table
            $sql = "INSERT INTO parent_pet (user_pet_id,user_id) VALUES ('$petid','$ownerid')";
            $result = mysqli_query($conn, $sql);
            if(!$result){
                echo "Error in insertion in parent pet: " . $sql . "<br>" . mysqli_error($conn);
             // header("Location: http://localhost/tails_in_the_city/adminPages/edit_ownership_status.php");
                exit();
            }
            else{
                //update status of pet
                $sql = "UPDATE pets SET own_status = '$pet_ownership_status' WHERE pet_id = '$petid'";
                $result = mysqli_query($conn, $sql);
                if(!$result){
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                  // header("Location: http://localhost/tails_in_the_city/adminPages/edit_ownership_status.php");
                    exit();
                 }
                 $_SESSION["success"] =true;
                header("Location: http://localhost/tails_in_the_city/adminPages/edit_ownership_status.php?type=redirect");
            }
        }
   }  
}
//header("Location: http://localhost/tails_in_the_city/adminPages/admin_signin_processing.php?type=redirect");
}