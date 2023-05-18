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
.reg1{
    font-family: 'Poppins', sans-serif;
    border-radius: 5px;
}

</style>
</head>
<body>
  <h2 id="newparentregtitle">HELLO AND COME IN!</h2>
  
<form name="newparentreg" action="processing/no_pet_user_processing.php" id="newparentreg" onsubmit="return validateForm() " method="post">
<div id="newparent">
  Name: <input type="text" id='fname'class='reg1'placeholder="Name" name="fname" required> <br><br><br>

  Email: <input type="text" id='femail'class='reg1'placeholder="Email" name="femail" onkeyup="validate_ajax('email', 'check_email', 'ajaxHandler.php', this.value)" required><br> <label id="check_email"></label><br><br>

  Address: <input type="text" id='faddress'class ='reg1'placeholder="Address" name="faddress"> <br><br>

  Password: <input type="password" id='fpassword' class ='reg1' placeholder="Password" name="fpassword" onkeyup="validate_ajax('pass', 'check_retype_password', 'ajaxHandler.php', this.value)" required> <br> <label id="check_password"></label><br><br>

  Confirm Password: <input type="password" id='fcpassword'class='reg1'placeholder="Confirm Password" name="fcpassword" onkeyup="validate_ajax('retype', 'check_retype_password', 'ajaxHandler.php', this.value)" required><br> <label id="check_retype_password"></label><br><br>

  SSN: <input type="text" id='fssn'class='reg1'placeholder="SSN" name="fssn" onkeyup="validate_ajax('phone_number', 'check_SSN', 'ajaxHandler.php', this.value)" required><br> <label id="check_SSN" ></label><br><br>

  Phone Number: <input type="text" id='fphone'class='reg1'placeholder="Phone" name="fphone" onkeyup="validate_ajax('phone_number', 'check_phone_number', 'ajaxHandler.php', this.value)" ><br>  <label id="check_phone_number"></label><br><br>
  <input type="submit"id='btn' value="Submit" />
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

