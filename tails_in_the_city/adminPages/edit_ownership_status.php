<?php
include('../connect.php');
// include('newheader.php');

session_start();
$_SESSION['errors'] = [];

if(isset($_SESSION["success"]))
{
  $line= "You have successfully updated the ownership status!";
  echo " <p <div style='font-size:22; color:#000000'>" .  $line . "</div>";
  echo "<br> </p>";
unset($_SESSION["success"]);
}

 ?>
<script>
function checkown(that){
 
  if(that.value=="owned"){
    document.getElementById("ownerid").style.display = "block";
  }
  else{
    document.getElementById("ownerid").style.display = "none";
  }
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
  transform: translateX(+30px);
  display: available;
  background-color: #ffffff4a;
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
    #breedingstatus{
      transform: translate(0px,0px);
      width: 400px;
      height: 400px;
      color: white;
      background-color: #ffffff4a;
      text-align: center ;
      margin: 0 auto;
      display: block;
      border-radius: 10px;
      border: 1px hidden #302d2d;
    }
    #ownership{
      font-family: 'Poppins', sans-serif;
    width: max-content;
    height:290px;
    width:320px;
    margin: 40px auto;
    padding: 20px;
    background: #FFFFFF8c;
    border-radius: 40px;
    /* border: 1px hidden #302d2d; */
    animation: popup 0.4s cubic-bezier(0.68, -0.55, 0.27, 1.55);
    transform: translate(-510px, 100px);
    }
    #ownershiptitle{
      font-family: 'Fredericka the Great', cursive;
  font-size: 70px;
  color: black;
  margin-left: 20px;
  margin-top: 20px;
  margin-bottom: 20px;
    }
#pet_ownership_status{
  transform: translateX(+7px);
  font-family: 'Poppins', sans-serif;
  width : 150px;
}
#pet_id{
  transform:translateX(+94px);
  width : 150px;
  font-family: 'Poppins', sans-serif;
}
#owned{
  transform:translateX(+24px);
  width : 150px;
  font-family: 'Poppins', sans-serif;
}
#back{
      transform: translate(700px,-510px);
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
  <h2 id="ownershiptitle">Update Ownership Status</h2>
  
<form name="ownership" action="../adminPages/edit_ownership_status_processing.php" id="ownership" onsubmit="return validateForm() " method="post">
  <div id="petform">
  <h3 id="petheader">Pet Info 🐾</h3>
  <!-- validate pet id -->
  Pet ID: <input type="text" id='pet_id'class='pet'placeholder="Pet ID" name="pet_id" onkeyup="validate_ajax('pet_id', 'check_pet_id_ownship', 'admin_ajaxHandler.php', this.value)" required> <br> <label id="check_pet_id_ownship"></label> <br><br>
  <div>
 Ownership Status<select id="pet_ownership_status" name="pet_ownership_status" onchange='checkown(this);'>
  <option value="adopt">Adopt</option>
  <option value="owned">Owned</option>
  </select><br><br>  
    </div>
    <div id="ownerid" style="display: none;">
    <label for="owned">Enter Owner ID</label> 
    <input type="text" placeholder="Owner ID" id="owned" name="owned" onkeyup="validate_ajax('owner_id', 'check_owner_id_ownship', 'admin_ajaxHandler.php', this.value)" > <br> <label id="check_owner_id_ownship"></label> <br><br>
</div>
  <input type="submit" id='btn' value="Submit"/>
  </div>
</form>
<form>
<input type="button" value="Back" id='back' onclick="history.go(-1)">
</form>
</body>
</html>
<script src="../validation.js"></script>

