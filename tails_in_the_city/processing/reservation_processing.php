<?php
session_start();
include("../connect.php");

if ($_SESSION['errors']){
  print_r($_SESSION['errors']);
  header('Location: ../reservation.php');
}

// $petname=$_POST["pet_name"];
// $petgender=$_POST["pet_gender"];
// $petage=$_POST["pet_age"];
$vetname=$_POST["select_vet"];
$sql = "SELECT vet_id FROM vet WHERE vet_name='$vetname'";
//$user_id = $_SESSION["user_id"];
$pet_id=$_SESSION["pet_id"];
$res_date = $_POST["reservation_date"];

# retrieve vet id
$sql = "SELECT vet_id FROM vet WHERE vet_name='$vetname'";
$result = mysqli_query($conn, $sql);
$res_vet_id = mysqli_fetch_all($result, MYSQLI_ASSOC);
//print_r($res_vet_id);
$vet_id = $res_vet_id[0]['vet_id'];

# retrieve pet id
// $sql = "SELECT user_pet_id FROM parent_pet join pets on
//  pets.pet_id=parent_pet.user_pet_id
//   WHERE user_id='$user_id' AND pet_name='$petname'";
// $result = mysqli_query($conn, $sql);
// $res_pet_id = mysqli_fetch_all($result, MYSQLI_ASSOC);
// $pet_id=$res_pet_id[0]['user_pet_id'];
// print_r($res_pet_id);
//get count of appointments for the selected date
$sqlcount = "SELECT COUNT(*) AS count FROM appointment
 WHERE vet_id='$vet_id' 
 AND date(appointment_date)= date('$res_date')";

$resultcount = mysqli_query($conn, $sqlcount);
$row =$resultcount->fetch_assoc();
#print_r($row);

// //insert info into appointment table
// $sql = "INSERT INTO appointment(pet_id, user_id, vet_id, appointment_date)
// VALUES ('$pet_id', '$user_id', '$vet_id', '$res_date')";

// if(mysqli_query($conn, $sql)){
//   echo "successful";                                    
//   } else{
//       echo "no";
//   }
  #if count is greater than 2, then redirect to reservation page else insert into appointment table
if ($row['count'] >= 2){
   # $_SESSION['errors'] = array("Vet is fully booked for this date");
   echo "errrroooorrrr";
   # header('Location: ../reservation.php');
  } else {
    //insert info into appointment table 
    $sqlreserve = "INSERT INTO appointment (pet_id,vet_id, appointment_date)
    VALUES ('$pet_id','$vet_id', '$res_date')";
  
      if(mysqli_query($conn, $sqlreserve)){
       $_SESSION['success'] = true;
       //redirect to reservation.php
       header("Location: http://localhost/tails_in_the_city/reservation.php?type=redirect");                                  
      } else{
          echo "no";
      }
  
    } 
   // header('Location: ../profile_processing.php');                                  
  // Close connection
  mysqli_close($conn);


//   #if count is greater than 2, then redirect to reservation page else insert into appointment table
// if ($res_count[0]['count'] > 2){
//   $_SESSION['errors'] = array("Vet is fully booked for this date");
//   header('Location: ../reservation.php');
// } else {
//   //insert info into appointment table 
//   $sqlreserve = "INSERT INTO appointment(pet_id, user_id, vet_id, appointment_date)
//   VALUES ('$pet_id', '$user_id', '$vet_id', '$res_date')";

//     if(mysqli_query($conn, $sqlreserve)){
//     echo "successful";                                    
//     } else{
//         echo "no";
//     }

 // } 