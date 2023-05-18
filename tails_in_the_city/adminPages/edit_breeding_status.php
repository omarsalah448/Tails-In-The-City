<?php
include('../connect.php');
session_start();
$_SESSION['errors'] = [];
$_SESSION['errors'] = [];
if(isset($_SESSION["success"]))
{
  $line= "You have successfully updated the breeding Status!";
  echo " <p <div style='font-size:22; color:#000000'>" .  $line . "</div>";
  echo "<br> </p>";
unset($_SESSION["success"]);
}
 ?>
<script>
  submitForms = function(){
    echo "New record created successfully! ";
    document.getElementById("breedingstatus").submit();
  //  document.getElementById("petform").submit();
}
</script>
<script src="validation.js"></script>
<html>
<head>
  <link rel="stylesheet" href="styles/style55.css">
<style>
  @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
@import url('https://fonts.googleapis.com/css?family=Tangerine&display=swap');
@import url('https://fonts.googleapis.com/css?family=Helvetica&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Fredericka+the+Great&display=swap');
 
body {
  background-image: url('../images/p53.jpg');
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
#pet_breeding_status{
  transform: translateX(+10px);
  display: available;
  background-color: white;
  width:170px;
  font-family: 'Poppins', sans-serif;
}
#btn{
        transform: translate(-0px,-0px);
        width: 200px;
        height: 40px;
        color: white;
        background-color: #84bed9;
        text-align: center ;
        margin: 0 auto;
        display: block;
        border-radius: 10px;
        border: 1px hidden #302d2d;
    }
    #pet_id{
      transform:translateX(+86px);
      font-family: 'Poppins', sans-serif;
    }
    #breedingstatus{
      font-family: 'Poppins', sans-serif;
    width: max-content;
    height:250px;
    width:300px;
    margin: 40px auto;
    padding: 20px;
    background: #FFFFFF8c;
    border-radius: 40px;
    /* border: 1px hidden #302d2d; */
    animation: popup 0.4s cubic-bezier(0.68, -0.55, 0.27, 1.55);
    transform: translate(-510px, 100px);
    
    }
    #breedingtitle{
      font-family: 'Fredericka the Great', cursive;
  font-size: 70px;
  color: black;
  margin-left: 20px;
  margin-top: 20px;
  margin-bottom: 20px;

    }
    #back{
      transform: translate(700px,-470px);
      width: 100px;
      height: 40px;
      color: white;
      background-color: black;
      text-align: center ;
      margin: 0 auto;
      display: block;
      border-radius: 10px;
      border: 1px hidden #302d2d;
      font-family: 'Poppins', sans-serif;
    }

</style>
</head>
<body>
  <h2 id="breedingtitle">Update Breeding Status</h2>
  
<form name="breedingstatus" action="../adminPages/edit_breeding_status_processing.php" id="breedingstatus" onsubmit="return validateForm() " method="post">
  <div id="petform">
  <h3 id="petheader">Pet Info 🐾</h3>
  <!-- validate pet id -->
  Pet ID: <input type="text" id='pet_id'class='pet'placeholder="Pet ID" name="pet_id" onkeyup="validate_ajax('pet_id', 'check_pet_id_breeding', 'admin_ajaxHandler.php', this.value)" required> <br> <label id="check_pet_id_breeding"></label> <br><br>
  Breeding Status:<select id="pet_breeding_status" name="pet_breeding_status">
  <option value="Breeding">Breeding</option>
  <option value="Not Breeding">Not Breeding</option>
  </select><br><br>   
  <input type="submit"id='btn' value="Submit" onclick="submitForms()" />
  </div>
</form>
<form>
<input type="button" value="Back" id='back' onclick="history.go(-1)">
</form>
</body>
</html>
<script src="../validation.js"></script>

