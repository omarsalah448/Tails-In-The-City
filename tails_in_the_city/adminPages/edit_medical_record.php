<?php
include('../connect.php');

session_start();
$_SESSION['errors'] = [];
if(isset($_SESSION["success"]))
{
  $line= "You have successfully updated the medical record!";
  echo " <p <div style='font-size:22; color:#000000'>" .  $line . "</div>";
  echo "<br> </p>";
unset($_SESSION["success"]);
}
 ?>
<script>
  submitForms = function(){
    echo "New record created successfully! ";
    document.getElementById("medicalrecord").submit();
  //  document.getElementById("petform").submit();
}
</script>
<!-- <script src="validation.js"></script> -->
<html>
<head>
  <link rel="stylesheet" href="styles/style55.css">
<style>
      @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
@import url('https://fonts.googleapis.com/css?family=Tangerine&display=swap');
@import url('https://fonts.googleapis.com/css?family=Helvetica&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Fredericka+the+Great&display=swap');
 
body {
  background-image: url('../images/p40.jpg');
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
    #medicalrecord{
      font-family: 'Fredericka the Great', cursive;
  font-size: 70px;
  color: black;
  margin-left: 20px;
  margin-top: 20px;
  margin-bottom: 20px;
    }
#medicalrecordform{
  font-family: 'Poppins', sans-serif;
    width: max-content;
    height:380px;
    width:320px;
    margin: 40px auto;
    padding: 20px;
    background: #eceff1;
    border-radius: 40px;
    /* border: 1px hidden #302d2d; */
    animation: popup 0.4s cubic-bezier(0.68, -0.55, 0.27, 1.55);
    transform: translate(-510px, 10px);
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
#drugs{
  transform:translateX(29px);
  font-family: 'Poppins', sans-serif;
}
#pet_id{
  transform:translateX(36px);
  font-family: 'Poppins', sans-serif;

}
#vet_id{
  transform:translateX(36px);
  font-family: 'Poppins', sans-serif;

}
#diagnosis{
  font-family: 'Poppins', sans-serif;

}
#back{
      transform: translate(700px,-600px);
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
  <h2 id="medicalrecord">Update Medical Record</h2>
  
<form name="medicalrecordform" action="../adminPages/edit_medical_record_processing.php" id="medicalrecordform" onsubmit="return validateForm() " method="post">
  <div id="petform">
  <h3 id="petheader">Pet Info 🐾</h3>
  <!-- validate pet id -->
  Vet ID: <input type="text" id='vet_id'class='pet'placeholder="Vet ID" name="vet_id" onkeyup="validate_ajax('vet_id', 'check_vet_id_med_rec', 'admin_ajaxHandler.php', this.value)" required> <br> <label id="check_vet_id_med_rec"></label> <br><br>
  Pet ID: <input type="text" id='pet_id'class='pet'placeholder="Pet ID" name="pet_id" onkeyup="validate_ajax('pet_id', 'check_pet_id_med_rec', 'admin_ajaxHandler.php', this.value)" required> <br> <label id="check_pet_id_med_rec"></label> <br><br>
  Diagnosis: <input type="text" id='diagnosis'class='pet'placeholder="Diagnosis" name="diagnosis" onkeyup="validate_ajax('diagnosis', 'check_diagnosis_med_rec', 'admin_ajaxHandler.php', this.value)" required> <br> <label id="check_diagnosis_med_rec"></label> <br><br>
  Drugs: <input type="text" id='drugs'class='pet'placeholder="Drugs" name="drugs" onkeyup="validate_ajax('drugs', 'check_drugs_med_rec', 'admin_ajaxHandler.php', this.value)" required> <br> <label id="check_drugs_med_rec"></label> <br><br>
  <input type="submit"id='btn' value="Submit" onclick="submitForms()" />
  </div>
</form>
<form>
<input type="button" value="Back" id='back' onclick="history.go(-1)">
</form>

</body>
</html>
<script src="../validation.js"></script>

