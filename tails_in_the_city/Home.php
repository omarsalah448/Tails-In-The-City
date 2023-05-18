<?php

  session_start();

    if(isset($_SESSION["username"]))
    {
        unset($_SESSION["username"]);
    }
    if(isset($_SESSION["password"]))
    {
        unset($_SESSION["password"]);
    }
    if(isset($_SESSION["c_ssn"]))
    {
        unset($_SESSION["c_ssn"]);
    }
    if(isset($_SESSION["try1"]))
    {
        echo"Email and password are not found!";
        unset($_SESSION["try1"]);
    }
    if(isset($_SESSION["try2"]))
    {
        echo" Incorrect Password";
        unset($_SESSION["try2"]);
    }
    if(isset($_SESSION["try3"]))
    {
        echo"Incorrect Email Address";
        unset($_SESSION["try3"]);
    }
    if(isset($_SESSION["try5"]))
    {
        echo"Admin not found!";
        unset($_SESSION["try5"]);
    }
    if(isset($_SESSION["try6"]))
    {
        echo"Incorrect Admin Password!";
        unset($_SESSION["try6"]);
    }
 ?>

<html>
<head>
      <link rel="stylesheet" href="styles/style3.css">
      <style>
  body {
    background-image: url('images/p54.jpg');
    background-repeat: no-repeat;
    background-size: 100% 100%;
  }
  html,
  body{
     width: 100%;
     height: 100%;
     overflow: hidden;
     margin: 0;
  }
  </style>

<script>


</script>
</head>



<body>
<h2 id="tails_in_the_city">Tails in the City 🐾</h2>
<h4 id="subphrase">Online Pet Care Service</h4>

<img id="title" src="images/p56.png"  width="300" height ="300" >
<button id="button-89" class="button-89"onclick="window.location.href='http://localhost/tails_in_the_city/Menutest.php'">Get Started Here!</button>

</body>
</html>
