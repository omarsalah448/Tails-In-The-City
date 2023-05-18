<?php
include('connect.php');
include('newheader.php');

$_SESSION['pass'] = '';
$_SESSION['retype'] = '';
$_SESSION['errors'] = [];

 ?>
<script>
  submitForms = function(){
    echo "New record created successfully! ";
    document.getElementById("newparentreg").submit();
    document.getElementById("petform").submit();
}
</script>
<script src="validation.js"></script>
<html>
<head>
  <link rel="stylesheet" href="styles/style55.css">
<style>
  
 
body {
  background-image: url('images/p30.jpg');
  background-repeat: no-repeat;
  background-size: 100% 100%;
  font-family: 'Poppins', sans-serif;
}
html,
body{
   width: 100%;
   height: 100%;
   overflow: hidden;
   margin: 0;
}
#pet_breeding_status{
  transform: translateX(+11px);
  display: available;
  background-color: #ffffff4a;
  width: 170px;
  font-family: 'Poppins', sans-serif;
  border-radius: 5px;
}
#petform{
    display: block;
    margin-left: auto;
    margin-right: auto;
    transform: translate(540px, -690px);
    font-family: 'Poppins', sans-serif;
    width: auto;
    margin: 40px auto;
    padding: 25px;
    background: #FFFFFF8c;
    border-radius: 40px;
    border: 1px hidden #302d2d;
    animation: popup 0.4s cubic-bezier(0.68, -0.55, 0.27, 1.55);
    
}
.pet{
    font-family: 'Poppins', sans-serif;
    border-radius: 5px;
}
.reg1{
    font-family: 'Poppins', sans-serif;
    border-radius: 5px;
}

</style>
</head>
<body>
  <h2 id="newparentregtitle">HELLO AND COME IN!</h2>
  
<form name="newparentreg" action="processing/parent_reg_processing.php" id="newparentreg" onsubmit="return validateForm() " method="post">
<div id="newparent">
  Name: <input type="text" id='fname'class='reg1'placeholder="Name" name="fname" required> <br><br><br>

  Email: <input type="text" id='femail'class='reg1'placeholder="Email" name="femail" onkeyup="validate_ajax('email', 'check_email', 'ajaxHandler.php', this.value)" required><br> <label id="check_email"></label><br><br>

  Address: <input type="text" id='faddress'class ='reg1'placeholder="Address" name="faddress"> <br><br>

  Password: <input type="password" id='fpassword' class ='reg1' placeholder="Password" name="fpassword" onkeyup="validate_ajax('pass', 'check_retype_password', 'ajaxHandler.php', this.value)" required> <br> <label id="check_password"></label><br><br>

  Confirm Password: <input type="password" id='fcpassword'class='reg1'placeholder="Confirm Password" name="fcpassword" onkeyup="validate_ajax('retype', 'check_retype_password', 'ajaxHandler.php', this.value)" required><br> <label id="check_retype_password"></label><br><br>

  SSN: <input type="text" id='fssn'class='reg1'placeholder="SSN" name="fssn" onkeyup="validate_ajax('phone_number', 'check_SSN', 'ajaxHandler.php', this.value)" required><br> <label id="check_SSN" ></label><br><br>

  Phone Number: <input type="text" id='fphone'class='reg1'placeholder="Phone" name="fphone" onkeyup="validate_ajax('phone_number', 'check_phone_number', 'ajaxHandler.php', this.value)" ><br>  <label id="check_phone_number"></label><br><br>
  </div>
  <div id="petform">
  <h3 id="petheader">Pet Info 🐾</h3>
  Name: <input type="text"placeholder="Name"style="text-transform: lowercase" id='pet_name'class="pet" name="pet_name"><br>
  
  Type: <input type="text" class="pet" id='pet_type'class='pet'placeholder="Pet Type" name="pet_type" > <br><br>

  Breed: <input type="text" class="pet" id='pet_breed'class='pet'placeholder="Pet Breed" name="pet_breed" > <br><br>

  Age: <input type="text" class="pet" id='pet_age'class='pet'placeholder="Pet Age" name="pet_age" onkeyup="validate_ajax('age', 'check_age', 'ajaxHandler.php', this.value)"> <br>
  <label id="check_age"></label><br><br>

  Gender: <input type="text" class="pet" id='pet_gender'class='pet'placeholder="Pet Gender" name="pet_gender" onkeyup="validate_ajax('gender', 'check_gender', 'ajaxHandler.php', this.value)"> <br>
  <label id="check_gender"></label><br><br>

  Color: <input type="text" class="pet" id='pet_color'class='pet'placeholder="Pet Color" name="pet_color" > <br><br>

  Breeding Status:<select id="pet_breeding_status" name="pet_breeding_status">
  <option value="Breeding">Breeding</option>
  <option value="Not Breeding">Not Breeding</option>
  </select><br><br>   
  <input type="submit"id='btn' value="Submit" onclick="submitForms()" />
  </div>
</form>

<!-- <form name="petform" action="parent_reg_processing.php" id="petform"onsubmit="return validateFormadmin()"  method="post">
<h3 id="AdminHeader">Pet Info</h3>
Name:     <input type="text"placeholder="Name"style="text-transform: lowercase" id='pet_name'class="pet" name="petname" ><br> <br>
Breed: <input type="text" id='pet_breed'class='pet'placeholder="Pet Breed" name="pet_breed" > <br><br>
Age: <input type="text" id='pet_age'class='pet'placeholder="Pet Age" name="pet_age" > <br><br>
Gender: <input type="text" id='pet_gender'class='pet'placeholder="Pet Gender" name="pet_gender" > <br><br>
Color: <input type="text" id='pet_color'class='pet'placeholder="Pet Color" name="pet_color" > <br><br>

</form> -->
</body>
</html>

