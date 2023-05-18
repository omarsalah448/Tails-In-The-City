
<?php

  session_start();
 ?>

<html>
<head>
    
      <link rel="stylesheet" href="../styles/style1.css">
      <style>
        @import url('https://fonts.googleapis.com/css2?family=Fredericka+the+Great&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Cantata+One&family=Fredericka+the+Great&display=swap');
  body {
    background-image: url('../images/p13.jpg');
    background-repeat: no-repeat;
    background-size: 100% 100%;
  }
  #tails_in_the_city{
  display: block;
 font-family: 'Fredericka the Great', cursive;
 font-size: 65px;
 transform: translateX(-300px);
}
  #adminform {
    font-family: 'Cantata One', serif;
font-family: 'Fredericka the Great', cursive;
color: black;
    width: max-content;
    height: 350px;
    margin: 40px auto;
    padding: 25px;
    background: #ffffff4a;
    border-radius: 40px;
    border: 1px hidden #302d2d;
    animation: popup 0.4s cubic-bezier(0.68, -0.55, 0.27, 1.55);
    transform: translateY(-30px);
    transform: translate(-70px,-750px);
}
#parentheader{
    font-family: 'Fredericka the Great', cursive;
    transform:translateY(-10px);
}
#p21{
    transform: translate(-560px,0px);
}
#p23{
    transform: translate(-560px,20px);
}
#p22{
    transform: translate(-350px,-300px);
}
#p24{
    transform: translate(-350px,-280px);
}
#log{
    width: 200px;
    height: 40px;
    color: white;
    background-color: #cf8811;
    text-align: center 
    margin: 0 auto;
    display: block;
    border-radius: 10px;
    border: 1px hidden #302d2d;
    transform: translate(30px,0px);
}
#newmember{
    font-family: 'Cantata One', serif;
font-family: 'Fredericka the Great', cursive;
}
#registerr{
    transform: translate(-68px,-750px);
    width: 200px;
    height: 40px;
    color: white;
    background-color: #cf8811;
    text-align: center 
    margin: 0 auto;
    display: block;
    border-radius: 10px;
    border: 1px hidden #302d2d;
}
#ffemail{
    
    background-color: #ffffff4a;
}
#fpassword{
    
    background-color: #ffffff4a;
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

function validateFormadmin() {
  let x = document.forms["myForm"]["adminname"].value;
  let y = document.forms["myForm"]["adminpassword"].value;
 if (x == "" )
 {
 alert("Admin username must be filled out");

    return false;

}
if (y == "" )
{
alert("Admin password must be filled out");

   return false;

}
}
function validateForm2() {
  let x = document.forms["myForm2"]["ffemail"].value;
  let y = document.forms["myForm2"]["fpassword"].value;
 if (x == "" )
 {
 alert("Email must be filled out");

    return false;

}
if (y == "" )
{
alert("password must be filled out");

   return false;

}
}

</script>
</head>

<body>
<h2 id="tails_in_the_city">Tails in the City 🐾</h2> 
<!-- <h4 id="subphrase">Online Pet Care Service</h4>  -->

<img id="p21" src="../images/p21.png"  width="200" height ="200" >
<img id="p23" src="../images/p25.png"  width="200" height ="200" >
<img id="p22" src="../images/p22.png"  width="200" height ="200" >
<img id="p24" src="../images/p24.png"  width="200" height ="200" >
<form name="adminform" action="../adminPages/admin_signin_processing.php" id="adminform" onsubmit="return validateForm()" method="post">
<h3 id="parentheader">Admin Login</h3> 
 Username:     <input type="text"placeholder="Name"style="text-transform: lowercase" id='ffemail'class="login" name="ffemail" ><br> <br>
 Password:   <input type="password"placeholder="Password" id='fpassword' class="login" name="fpassword" ><br> <br>
  <input type="submit" value="LOGIN" id='log'/><br> <br>
  <!-- <h4 id="newmember">Are you a new member?</h4>  -->
</form>

<!-- <form name="register" action="new_parent_signup.php" id="myform1"  method="post">

<input  type="submit" class="reg"formaction="new_parent_signup.php" id='registerr' value="Click here to register">
</form> -->

</body>
</html>
