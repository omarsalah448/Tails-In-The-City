<?php
include('connect.php');
include('newheader.php');

if ($_SESSION['loggedIn'] == false){
  header('Location: Menutest.php');
}

if (empty($_SESSION['pet_id']) == true){
  header('Location: profile_processing.php?choose=false');
  exit();
}
if(isset($_SESSION["success"]))
{
  $line= "You have successfully reserved your appointement!";
  echo " <p <div style='font-size:30; transform: translate(40%, 200%); color: #000000; font-family: 'Roboto', sans-serif; text-align: center; margin-top: 10%;'> $line </div> </p>";
  echo "<br> </p>";
unset($_SESSION["success"]);
}

$sql = "SELECT vet_name FROM vet;";
$result = mysqli_query($conn, $sql);
$res = mysqli_fetch_all($result, MYSQLI_ASSOC);

$_SESSION['pass'] = '';
$_SESSION['retype'] = '';
$_SESSION['errors'] = [];
  if(isset($_SESSION["try4"]))
  {
      echo"You already have an account!";
      unset($_SESSION["try4"]);
  }

 ?>
<script>
  submitForms = function(){
    echo "New record created successfully!";
    document.getElementById("newparentreg").submit();
    document.getElementById("petform").submit();
}
</script>
<html>
<head>
  <!-- <link rel="stylesheet" href="styles/style2.css"> -->
<script>
function validateForm() {
  let x = document.forms["appointment_reservation"]["pet_name"].value;
  let y = document.forms["appointment_reservation"]["pet_age"].value;
  let z = document.forms["appointment_reservation"]["pet_gender"].value;
  let e = document.forms["appointment_reservation"]["select_vet"].value;
  let s = document.forms["appointment_reservation"]["reservation_date"].value;

  if (x == "" || y == "" || z== "" || e == "" || s == "") {
    alert("Text fields must be filled out");
    return false;
  }
}

</script>
<style>
  @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
@import url('https://fonts.googleapis.com/css?family=Tangerine&display=swap');
@import url('https://fonts.googleapis.com/css?family=Helvetica&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Fredericka+the+Great&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Cantata+One&family=Fredericka+the+Great&family=Indie+Flower&display=swap');

body {
  background-image: url('images/p36.jpg');
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
#appointment_reservation{
    display: block;
    margin: 30 auto;
    justify-content: center;
    font-family: 'Poppins', sans-serif;
    width: 390px;
    margin: 40px auto;
    padding: 25px;
    background: #FFFFFF8c;
    border-radius: 40px;
    border: 1px hidden #302d2d;
    animation: popup 0.4s cubic-bezier(0.68, -0.55, 0.27, 1.55);
    zoom: 100%;
    left      : 50%;
    top       : 50%;
    position  : absolute;
    transform : translate(-50%, -50%);
}
#appointment_reg{
        font-family: 'Fredericka the Great', cursive;
        font-size: 50px;
        font-weight: 600;
        transform: translate(50px, 15px);
        margin-left: auto;
    margin-right: auto;
    text-align: center;

    }
    #btn{
        transform: translate(-0px,-0px);
        width: 200px;
        height: 40px;
        color: white;
        background-color: #795ba3;
        text-align: center ;
        margin: 0 auto;
        display: block;
        border-radius: 10px;
        border: 1px hidden #302d2d;
    }
    #pet_name{
      height: 25px;
      transform: translateX(95px);
      font-family: 'Poppins', sans-serif;
      width: 190px;
    }
    #pet_age{
      height: 25px;
      transform: translateX(112px);
      font-family: 'Poppins', sans-serif;
      width: 190px;
    }
    #pet_gender{
      height: 25px;
      transform: translateX(112px);
      font-family: 'Poppins', sans-serif;
      width: 190px;
    }
    #select_vet{
      height: 25px;
      transform: translateX(80px);
      font-family: 'Poppins', sans-serif;
      width: 190px;
    }
    #reservation_date{
      height: 25px;
      font-family: 'Poppins', sans-serif;
      width: 190px;
    }
    #vision1{
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
    transform: translate(-700px,-300px );
    font-size: 20px;
    }
    #vision2{
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
    transform: translate(300px,-145px );
    font-size: 20px;
    }
    #vision3{
      display: block;

      font-family: 'Cantata One', serif;
font-family: 'Fredericka the Great', cursive;
font-family: 'Indie Flower', cursive;
font-size: 20px;
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
    transform: translate(-700px,10px );
    }
</style>
</head>
<body>
  <h2  id="appointment_reg">Book Your Appointment </h4>

<form name="appointment_reservation" action="processing/reservation_processing.php" id="appointment_reservation" onsubmit="return validateForm() " method="post">

  <!-- Pet Name: <input type="text" id='pet_name'class='reg1'placeholder="Pet Name" name="pet_name" > <br><br>

  Pet Age: <input type="text" id='pet_age'class='pet'placeholder="Pet Age" name="pet_age" onkeyup="validate_ajax('age', 'check_age_reservation', 'ajaxHandler.php', this.value)"> <br>
  <label id="check_age_reservation"></label><br><br>

  Gender: <input type="text" id='pet_gender'class='pet'placeholder="Pet Gender" name="pet_gender" onkeyup="validate_ajax('gender', 'check_gender_reservation', 'ajaxHandler.php', this.value)"> <br>
  <label id="check_gender_reservation"></label><br><br> -->

  <label for="select_vet">Select a vet:</label>
  <select id="select_vet" name="select_vet">
  <option value="">--Please choose a vet--</option>
  <?php foreach ($res as $vet){ ?>
  <option> <?php echo $vet['vet_name']; ?> </option>
  <?php } ?>
</select><br><br>

  <label for="reservation_date">Select a suitable date:</label>
  <input type="date" id="reservation_date" name="reservation_date"><br><br>
  <input type="submit"id='btn' value="Submit" onclick="submitForms()" />
  </div>
</form>
<form id='vision1'>
At Tails in the city 🐾, we are committed to ensuring that your cat or dog receives
 the quality of care they deserve.


  </form>
  <form id='vision2'>
  <h3  id="vision2_h">   Dog Wound Care & Healing Stages</h3>
  Not every cut or graze your dog gets will need veterinary intervention, so you need to know how to care for your dog's wounds.
   Here the Tucson vets provide tips on how to care for your dog's wounds at home.
  </form>
  <form id='vision3'>
  <h3  id="vision3_h">  How to Tell If My Cat Has a Broken Leg?</h3>

The Pet Doctor vets know that whether your cat is an outdoor feline or an indoor friend,
 accidents can happen. That's why it's important to understand what to look for if you think your cat may have a broken or fractured leg. 
  </form>


</body>
</html>

