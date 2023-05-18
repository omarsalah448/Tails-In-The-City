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
  font-family: 'Fredericka the Great', cursive;
  background-color: #5593af73;
  width: 2000px;
  transform: translate(-10px, 0px);
  top: 0;
  position:fixed;
  left:0;
  right:0;
  z-index: 100;
 

}

.topnav a {
    font-family: 'Fredericka the Great', cursive;
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
    font-family: 'Fredericka the Great', cursive;
  background-color: #ddd;
  color: black;
  top: 0;
  z-index: 100;

}

.topnav a.active {
    font-family: 'Fredericka the Great', cursive;
  background-color: #88c6d7;
  color: white;
  top: 0;
  z-index: 100;

}
</style>
</head>
<body>

<div class="topnav">

  <a class="active" href="Home.php">Home</a>
  <a  href="profile_processing.php">Profile</a>
  <a href="store.php">Store</a>
  <a href="day_care.php">Day Care</a>
  <a href="reservation.php">Clinic</a>
  <a href="#adopt">Adopt</a>
  <a href="#breeding">Breeding</a>
  <?php session_start();
   if (empty($_SESSION['loggedIn']) or $_SESSION['loggedIn'] == false) {
    $_SESSION['loggedIn'] = false;
    ?>
    <a href="menutest.php">Sign In</a>
  <?php } else {?>
    <a href="signout.php">Sign Out</a>
    <?php } 
    session_write_close();?>
</div>

<!-- <div style="padding-left:16px">
  <h2>Top Navigation Example</h2>
  <p>Some content..</p>
</div> -->

</body>
<script src="validation.js"></script>
</html>




