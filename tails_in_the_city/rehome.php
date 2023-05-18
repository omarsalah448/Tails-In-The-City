


<!-- add to selected items from store to data base -->
<?php
include("connect.php");
session_start();


echo "<link rel='stylesheet' type='text/css' href='styles/table1.css'>";
// if ($_SESSION['errors']){
//   print_r($_SESSION['errors']);
//   header('Location: store.php');
// }
# check if the user is signed in
// if (!isset($_SESSION["email"]) || !isset($_SESSION["password"])) {
//     echo "You are not signed in!";
//     echo "Redirecting to login page...";
//     header("Location: Menutest.php");
// }
// else{
//   $username = $_SESSION["username"];
//   $password = $_SESSION["password"];
//   $user_id=   $_SESSION["user_id"];
// }

$user_id=   $_SESSION["user_id"];
$petid=$_SESSION["pet_id"];
// $petname=$_POST["pet_name"];
// $pettype= $_POST["pet_type"];
// $petbreed=$_POST["breed"];
// $petphoto=$_POST["photo"];
// $petage= $_POST["age"];
// $petcolor= $_POST["color"];
// $petgender= $_POST["gender"];

//update own_status of the pet to adopt
$sql = "UPDATE pets SET own_status = 'adopt' WHERE pet_id = '$petid'";
if(mysqli_query($conn, $sql)){
 echo "updated own_status to adopt successfully";
} else{
    echo "no";
}

//drop the pet from the parent_pet table
$sql = "DELETE FROM parent_pet WHERE user_pet_id = '$petid'";
if(mysqli_query($conn, $sql))
{
 echo "dropped from parent_pet table";  
 unset($_SESSION["pet_id"]);
// wait 2 seconds and redirect to adopt.php
   header("refresh:2;url=profile_processing.php");                              
} else{
    echo "no";
}

  mysqli_close($conn);