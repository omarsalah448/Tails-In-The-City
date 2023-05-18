


<!-- add to selected items from store to data base -->
<?php
include("../connect.php");
session_start();


echo "<link rel='stylesheet' type='text/css' href='styles/table1.css'>";
// if ($_SESSION['errors']){
//   print_r($_SESSION['errors']);
//   header('Location: ../store.php');
// }
# check if the user is signed in
// if (!isset($_SESSION["email"]) || !isset($_SESSION["password"])) {
//     echo "You are not signed in!";
//     echo "Redirecting to login page...";
//     header("Location: ../Menutest.php");
// }
// else{
//   $username = $_SESSION["username"];
//   $password = $_SESSION["password"];
//   $user_id=   $_SESSION["user_id"];
// }

$user_id=   $_SESSION["user_id"];
$petid=$_POST["pet_id"];
$petname=$_POST["pet_name"];
$pettype= $_POST["pet_type"];
$petbreed=$_POST["breed"];
$petphoto=$_POST["photo"];
$petage= $_POST["age"];
$petcolor= $_POST["color"];
$petgender= $_POST["gender"];


#$date = date('d-m-y h:i:s');

$sql = "INSERT INTO parent_pet(user_pet_id,user_id) 
        VALUES ('$petid','$user_id')";
if(mysqli_query($conn, $sql))
{
// echo "successful";                                    
} else{
    echo "no";
}

//alter the own_status of the pet to owned
$sql = "UPDATE pets SET own_status = 'owned' WHERE pet_id = '$petid'";
if(mysqli_query($conn, $sql)){
 echo "you adopted a new bestfriend successful";
 //wait 2 seconds and redirect to adopt.php
   header("refresh:2;url=../adopt.php");
} else{
    echo "no";
}
  echo "<h2 id='title' >Tails in the city 🐾 </h2>";
  
  // Close connection
  mysqli_close($conn);