
<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tails_in_the_city";

$email=$_POST["ffemail"];
$password1=md5($_POST["fpassword"]);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$resultnameandpassword = mysqli_query($conn,"SELECT * FROM users WHERE email = '$email' and user_password = '$password1'");
$sql="SELECT email FROM users WHERE email = '$email' and user_password = '$password1'";
$result = $conn->query($sql);
$resultofname=mysqli_query($conn,"SELECT * FROM users WHERE email = '$email'");
$resultofpassword=mysqli_query($conn,"SELECT * FROM users WHERE user_password = '$password1'");
if(empty($email) || empty($password1))
{
  header("Location: http://localhost/tails_in_the_city/Menutest.php");
}
elseif(mysqli_num_rows($resultnameandpassword) == 0 ) {
  echo "not found";

  $_SESSION["try1"]="Username and password are not found!";

  header("Location: http://localhost/tails_in_the_city/Menutest.php");

} elseif (mysqli_num_rows($resultnameandpassword) != 0){
    $sql2 = "SELECT user_id FROM users WHERE email = '$email' AND user_password = '$password1'";
    $result2 = $conn->query($sql2);
    $row = $result2->fetch_assoc();
    $userid=$row["user_id"];
    #put the user id in the session

    $_SESSION["user_id"]=$userid;
    $_SESSION['loggedIn'] = true;

  while($row = $result->fetch_assoc()) {
    #echo session value
    echo $_SESSION["user_id"];
   header("Location: http://localhost/tails_in_the_city/profile_processing.php");

  }

}
elseif(mysqli_num_rows($resultofname) != 0 && mysqli_num_rows($resultofpassword) == 0) {
  	echo " password is incorrect";
    #echo $password1;
    #$_SESSION["try2"]=" password is incorrect";

    #header("Location: http://localhost/tais_in_the_city/Menutest.php ");
}
else {
  echo " username is incorrect";
  $_SESSION["try3"]=" username is  incorrect";
 # header("Location: http://localhost/tails_in_the_city/Menutest.php");
}

$conn->close();
?>
