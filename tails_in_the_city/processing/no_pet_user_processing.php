<?php
session_start();
include("../connect.php");


$name=$_POST["fname"];
$password1=$_POST["fpassword"];
$password1=md5($password1);
$email=$_POST["femail"];
$address=$_POST["faddress"];
$phone=$_POST["fphone"];
$ssn=$_POST["fssn"];




if ($_SESSION['errors']){
  print_r($_SESSION['errors']);
  header("Location: http://localhost/tails_in_the_city/no_pet_user.php");
}
else{

  $resultofssn = mysqli_query($conn,"SELECT * FROM users WHERE user_id = '$ssn'");

  if(mysqli_num_rows($resultofssn) != 0  ) {
      echo "You already have an account";
      $_SESSION["try4"]="SSN is already used!";

     header("Location: http://localhost/tails_in_the_city/new_parent_signup.php");
  }

  


 //check if the user is already registered
  $result = mysqli_query($conn,"SELECT * FROM users WHERE user_id = '$ssn'");
  if(mysqli_num_rows($result) != 0  ) {
      echo "You already have an account";
      $_SESSION["try4"]="SSN is already used!";
      #header("Location: http://localhost/tails_in_the_city/new_parent_signup.php");

  }
  else 
  {
    $_SESSION['loggedIn'] = true;
      //insert into users table
      $sqlparent = "INSERT INTO users (user_id,user_name, user_password ,email, phone,user_address)
      VALUES ('$ssn', '$name', '$password1','$email','$phone','$address')";

      $_SESSION["user_id"]=$ssn;
   }

  if ( $conn->query($sqlparent) === TRUE){
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
