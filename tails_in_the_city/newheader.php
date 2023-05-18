<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
  @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
@import url('https://fonts.googleapis.com/css?family=Tangerine&display=swap');
@import url('https://fonts.googleapis.com/css?family=Helvetica&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Fredericka+the+Great&display=swap');

body {
  margin: 0;
  font-family: 'Fredericka the Great', cursive;
  z-index: 100;
   position:absolute;
}

.topnav {
  overflow: hidden;
  background-color: #8a6a9182;
  width: 2000px;
  transform: translate(-10px, 0px);
  top: 0;
  position:fixed;
  left:0;
  right:0;
  z-index: 100;
 

}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  top: 0;
  z-index: 100;
  /* font-size: 17px; */
}


.topnav a:hover {
  background-color: #ddd;
  color: black;
  top: 0;
  z-index: 100;

}

.topnav a.active {
  background-color: #3e284e;
  color: white;
  top: 0;
  z-index: 100;

}
</style>
</head>
<body>

<div class="topnav">

  <a class="active" href="http://localhost/tails_in_the_city/Home.php">Home</a>
  <a  href="http://localhost/tails_in_the_city/profile_processing.php">Profile</a>
  <a href="http://localhost/tails_in_the_city/store.php">Store</a>
  <a href="http://localhost/tails_in_the_city/day_care.php">Day Care</a>
  <a href="http://localhost/tails_in_the_city/reservation.php">Clinic</a>
  <a href="http://localhost/tails_in_the_city/adopt.php">Adopt</a>
  <a href="http://localhost/tails_in_the_city/breeding.php">Breeding</a>
  <?php session_start();
   if (empty($_SESSION['loggedIn']) or $_SESSION['loggedIn'] == false)
    {
    $_SESSION['loggedIn'] = false;
    ?>
      <a href="http://localhost/tails_in_the_city/menutest.php">Sign In</a>
  <?php
   }
   else {
    ?>
    <a href="http://localhost/tails_in_the_city/signout.php">Sign Out</a>
    <?php } ?>
</div>

<!-- <div style="padding-left:16px">
  <h2>Top Navigation Example</h2>
  <p>Some content..</p>
</div> -->

</body>
<script src="validation.js"></script>
</html>

<?php 
function showAlert($message) {
  echo "<div style='position: fixed; top: 25%; left: 50%; transform: translate(-50%, -50%); background-color: #fff; border: 1px solid #ccc; padding: 20px; border-radius: 5px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5); z-index: 9999;'><p style='font-size: 18px; font-weight: bold; margin-bottom: 10px;'>Hello..</p><p style='font-size: 16px; margin-bottom: 0;'>$message</p><button onclick='this.parentNode.parentNode.removeChild(this.parentNode);' style='position: absolute; top: 5px; right: 5px; font-size: 16px; border: none; background-color: transparent; color: #333; cursor: pointer;'>X</button></div>";
}
?>



