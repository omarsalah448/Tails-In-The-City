<?php
session_start();
include("../connect.php");

if ($_SESSION['errors']){
 // print_r($_SESSION['errors']);
  header('Location: edit_medical_record.php');
  exit();
}

$vetid=$_POST["vet_id"];
$petid=$_POST["pet_id"];
$diagnosis=$_POST["diagnosis"];
$drugs=$_POST["drugs"];

$date = date('Y-m-d H:i:s');

//check if the pet id is valid
$sql = "SELECT * FROM pets WHERE pet_id = '$petid'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 0) {
    echo "Pet ID is invalid!";
   // header("Location: http://localhost/tails_in_the_city/adminPages/edit_breeding_status.php");
    exit();
}
//check if vet id is valid
$sql = "SELECT * FROM vet WHERE vet_id = '$vetid'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 0) {
    echo "Vet ID is invalid!";
   // header("Location: http://localhost/tails_in_the_city/adminPages/edit_breeding_status.php");
    exit();
}
//else update the pet breeding status
else{
    //get medical record id
    $sql = "SELECT * FROM medical_records WHERE pet_id = '$petid'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result) == 0){
       //generate random medical record id
        $medical_record_id = rand(100000, 999999);
    }
    else{

        
        $medical_record_id = $row["med_rec_id"];
    }

    $sql = "INSERT INTO medical_records (med_rec_id, pet_id,vet_id,medical_date, diagnosis, drugs) VALUES ('$medical_record_id','$petid','$vetid','$date','$diagnosis','$drugs')";
    $result = mysqli_query($conn, $sql);
    if(!$result){
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      #  header("Location: http://localhost/tails_in_the_city/adminPages/edit_breeding_status.php");
        exit();
    }
    else{
   // echo "Medical record updated!";
    $_SESSION["success"] =true;
    header("Location: http://localhost/tails_in_the_city/adminPages/edit_medical_record.php?type=redirect");
    // exit();
    }
}