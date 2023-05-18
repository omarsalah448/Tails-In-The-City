
<?php
include('newheader.php');
  
if (empty($_SESSION['pet_id']) == true){
    header('Location: profile_processing.php?choose=false');
    exit();
  }
  

  if(isset($_SESSION["totalprice"])){
    $line= "You have successfully booked a daycare!";
    $line2= "Your total price is: ";
    $line3="EGP";
    echo " <p <div style='font-size:22; transform:translate(-500px,450px); color:#000000'>" .  $line . "</div>";
    echo "<br>";
    echo "<div style='font-size:18; transform:translate(-500px,340px); color:#000000'>" .  $line2 . "</div>";
    echo "<div style='font-size:18; transform:translate(-500px,220px); color:#000000'>" .  $_SESSION["totalprice"]. "</div>";
    echo "<div style='font-size:18; transform:translate(-500px,100px); color:#000000'>" . $line3. "</div> </p>";
    unset($_SESSION["totalprice"]);
  }

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
    
      <link rel="stylesheet" href="styles/style1.css">
      <style>

        
@import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
@import url('https://fonts.googleapis.com/css?family=Tangerine&display=swap');
@import url('https://fonts.googleapis.com/css?family=Helvetica&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Fredericka+the+Great&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Cantata+One&family=Fredericka+the+Great&family=Indie+Flower&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Cantata+One&family=Fredericka+the+Great&family=Indie+Flower&family=Kristi&family=Pacifico&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Hurricane&display=swap');
  
body {
    background-image: url('images/p52.jpg');
    background-repeat: no-repeat;
    background-size: 100% 100%;
  }
  #tails_in_the_city{
  display: block;
 font-family: 'Fredericka the Great', cursive;
 font-size: 65px;
 transform: translate(-500px,-270px);
 position: fixed;
}
  #daycareform {
    font-family: 'Cantata One', serif;
font-family: 'Fredericka the Great', cursive;
color: black;
    width: max-content;
    height: 230px;
    margin: 40px auto;
    padding: 25px;
    background: #ffffff4a;
    border-radius: 40px;
    border: 1px hidden #302d2d;
    animation: popup 0.4s cubic-bezier(0.68, -0.55, 0.27, 1.55);
    transform: translate(-500px,0px);
    position: fixed;
      
  }
  #paragraph{
    display: block;
font-family: 'Cantata One', serif;
font-family: 'Fredericka the Great', cursive;
font-family: 'Indie Flower', cursive;
width: 390px;
margin: 40px auto;
padding: 25px;
background: #FFFFFF40;
border-radius: 40px;
border: 1px hidden #302d2d;
animation: popup 0.4s cubic-bezier(0.68, -0.55, 0.27, 1.55);
zoom: 100%;
left      : 50%;
top       : 50%;
position  : absolute;
transform: translate(300px,-280px );
font-size: 25px;

  }
  #review{
    display: block;
    font-family: 'Cantata One', serif; 
font-family: 'Fredericka the Great', cursive;
font-family: 'Indie Flower', cursive;
width: 600px;
height: 200px;
margin: 40px auto;
padding: 25px;
background: #FFFFFF40;
border-radius: 40px;
border: 1px hidden #302d2d;
animation: popup 0.4s cubic-bezier(0.68, -0.55, 0.27, 1.55);
zoom: 100%;
left      : 50%;
top       : 50%;
position  : absolute;
transform: translate(300px,-280px );
font-size: 25px;
  
  }
  #sig{
        font-family: 'Hurricane', cursive;

    font-size: 40px;
    }
  #subphrase{
  display: block;
 margin-left: auto;
 margin-right: auto;
 font-family: RlFreight, HoeflerText-Black, Times New Roman, serif;
font-size: 20px;
font-weight: 900;
letter-spacing: +4px;
line-height: 90px;
text-transform: none;
transform: translate(-500px,-200px);
position: fixed;
}
#pickup_date{
    transform:translateX(6px);
}
#dropoff_date{
    transform:translateX(0px);
}
#datesheader{
    font-family: 'Fredericka the Great', cursive;
    transform:translateY(-10px);
}
#headerr{
    font-family: 'Fredericka the Great', cursive;
    transform:translateY(-10px);
    font-size: 23px;
}
#log{
    width: 200px;
    height: 40px;
    color: white;
    background-color: #88c6d7;
    text-align: center 
    margin: 0 auto;
    display: block;
    border-radius: 10px;
    border: 1px hidden #302d2d;
    transform: translate(33px,0px);
    font-size:18px;
    font-family: 'poppins', sans-serif;
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
function validateForm() {
  let x = document.forms["daycareform"]["dropoff_date"].value;
  let y = document.forms["daycareform"]["pickup_date"].value;
 if (x == "" )
 {
 alert("Dropoff Date must be filled out");

    return false;

}
if (y == "" )
{
alert("Pickup Date must be filled out");

   return false;

}
if(x>y)
{
    alert("Dropoff Date must be before Pickup Date");
    return false;
}
}


</script>
</head>

<body>
<h2 id="tails_in_the_city">Day Care</h2> 
<h4 id="subphrase">WE KNOW WHAT PETS LIKE</h4> 

<form name="daycareform" action="day_care_processing.php" id="daycareform" onsubmit="return validateForm()" method="post">
<h3 id="datesheader">Dates</h3> 
<label for="reservation_date">Dropoff: </label>
  <input type="datetime-local" id="dropoff_date" name="dropoff_date"><br><br>
  <label for="reservation_date">Pickup: </label>
  <input type="datetime-local" id="pickup_date" name="pickup_date"><br><br>
  <input type="submit"  value="Book" id='log'/><br> <br>
</form>
 <form id="paragraph">
 <h3 id="headerr">Tails in the City 🐾</h3>
 is designed to help you keep up with your pet’s
     health and happiness without sacrificing your busy schedule.</form>
     <!-- <form id="review"> --> 
 <!-- <h3 id="headerr">Hear from our Happy Pet Parents</h3>
My dogs love Tails in the City! They get so excited when they see the van pull up and they come home happy and tired. 
I love that they get to play with other dogs and get out of the house for a few hours. 
It’s a great service and safe environment and I highly recommend it! -   <label id='sig'>Danielle</label></form>
    </form> -->
<!-- <form name="register" action="new_parent_signup.php" id="myform1"  method="post">

<input  type="submit" class="reg"formaction="new_parent_signup.php" id='registerr' value="Click here to register">
</form> 

</body>
</html>
