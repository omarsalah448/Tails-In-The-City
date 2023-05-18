<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tails_in_the_city";
$dropoff=$_POST["dropoff_date"];
$pickup=$_POST["pickup_date"];
//$user_id = $_SESSION['user_id'];
$petid=$_SESSION['pet_id'];
$hour_price=10;


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// $sql3="SELECT user_pet_id FROM parent_pet WHERE user_id = '$user_id' ";
// $result3 = $conn->query($sql3);
// $row3 = $result3->fetch_assoc();
// $petid=$row3["pet_id"];

$sqlparent = "INSERT INTO daycare (pet_id, dropoff, pickup ,hour_price)
VALUES ('$petid', '$dropoff', '$pickup','$hour_price')";
if ($conn->query($sqlparent) === TRUE) {
  echo "New record created successfully";
//   echo $hour_price;
  $difference= strtotime($pickup)-strtotime($dropoff);
  $totalhours=$difference/(60*60);
    $totalprice=$totalhours*$hour_price;
    $_SESSION["totalprice"] = $totalprice;
    // echo $totalprice;

    header("Location: http://localhost/tails_in_the_city/day_care.php");
} else {
  echo "Error: " . $sqlparent . "<br>" . $conn->error;
}
$conn->close();
?>