<?php
session_start();
include("../connect.php");

#destroy session
$name=$_POST["fname"];
$password1=$_POST["fpassword"];
$password1=md5($password1);
$email=$_POST["femail"];
$address=$_POST["faddress"];
$phone=$_POST["fphone"];
$ssn=$_POST["fssn"];
$petname=$_POST["pet_name"];
$pettype=$_POST["pet_type"];
$petbreed=$_POST["pet_breed"];
$petgender=$_POST["pet_gender"];
$petage=$_POST["pet_age"];
$petcolor=$_POST["pet_color"];
$breeding_status=$_POST["pet_breeding_status"];

$_SESSION['username'] = $name;
$_SESSION['user_id'] = $ssn;
$_SESSION['email'] = $email;
$_SESSION['phone'] = $phone;
$_SESSION['user_address'] = $address;
$_SESSION['pet_name'] = $petname;
$_SESSION['pet_type'] = $pettype;
$_SESSION['pet_breed'] = $petbreed;
$_SESSION['pet_gender']= $petgender;
$_SESSION['pet_age'] = $petage;
$_SESSION['pet_color'] = $petcolor;



if ($_SESSION['errors']){
  print_r($_SESSION['errors']);
  header("Location: http://localhost/tails_in_the_city/new_parent_signup.php");
}
else{

  //generate pet id randomly
  $petid = rand(100000,999999);
  $resultofssn = mysqli_query($conn,"SELECT * FROM users WHERE user_id = '$ssn'");

  if(mysqli_num_rows($resultofssn) != 0  ) {
      echo "You already have an account";
      $_SESSION["try4"]="SSN is already used!";

     header("Location: http://localhost/tails_in_the_city/new_parent_signup.php");
  }

  $resultofpetid = mysqli_query($conn,"SELECT * FROM pets WHERE pet_id = '$petid'");

  while(mysqli_num_rows($resultofpetid) != 0  ) {
      $petid=rand(100000,999999);
     # $_SESSION['pet_id']=$petid;
  }

  


 //check if the user is already registered
  $result = mysqli_query($conn,"SELECT * FROM users WHERE user_id = '$ssn'");
  if(mysqli_num_rows($result) != 0  ) {
      echo "You already have an account";
      $_SESSION["try4"]="SSN is already used!";
      header("Location: http://localhost/tails_in_the_city/new_parent_signup.php");

  }
  else 
  {
    $_SESSION['loggedIn'] = true;
      //insert into users table
      $sqlparent = "INSERT INTO users (user_id,user_name, user_password ,email, phone,user_address)
      VALUES ('$ssn', '$name', '$password1','$email','$phone','$address')";

     //insert pet info to pets table
      $sqlpet = "INSERT INTO pets (pet_id,pet_name,age,pet_type, breed,gender,color,own_status,breeding_status)
      VALUES ('$petid','$petname','$petage','$pettype','$petbreed','$petgender','$petcolor','owned','$breeding_status')";

      //insert into parent_pet
      $sqlparentpet = "INSERT INTO parent_pet (user_pet_id,user_id)
      VALUES ('$petid','$ssn')";

      $_SESSION["user_id"]=$ssn;
   }




$_SESSION["pet_id"]=$petid;

  //   if ($conn->query($sqlpet) === TRUE) {
  //     echo "New record created successfully! ";
  //     echo "<br>";
  //   echo " Welcome $name!   ";
  //   } else {
  //     echo "Error: " . $sqlpet . "<br>" . $conn->error;
  //   }

  // if ($conn->query($sqlparent) === TRUE) {
  //   echo "New record created successfully! ";
  //   echo "<br>";
  // echo " Welcome $name!   ";
  // } else {
  //   echo "Error: " . $sqlparent . "<br>" . $conn->error;
  // }

  //   if ($conn->query($sqlparentpet) === TRUE) {
  //     echo "New record created successfully! ";
  //     echo "<br>";
  //     echo " Welcome $name!   ";
  //     } else {
  //     echo "Error: " . $sqlparentpet . "<br>" . $conn->error;
  //     }

  //     if ($conn->query($sqlownedpet) === TRUE) {
  //       echo "New record created successfully! ";
  //      header("Location: http://localhost/tails_in_the_city/Menutest.php");

  //       } else {
  //       echo "Error: " . $sqlownedpet . "<br>" . $conn->error;
  //       }

  if ($conn->query($sqlpet) === TRUE && $conn->query($sqlparent) === TRUE && $conn->query($sqlparentpet) === TRUE){
    echo "New record created successfully! ";
    echo "<br>";
    echo " Welcome $name!   ";
    #redirect to Menutest.php after 4 seconds
    header("refresh:4; url=../Menutest.php");
  }
  else {
    echo "Error in creating account: " . $conn->error;
  }

        // #redirect to Menutest.php
       # header("Location: http://localhost/tails_in_the_city/profile_processing.php");
       
      
  $conn->close();
}
?>
