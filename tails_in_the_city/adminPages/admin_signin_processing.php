<?php
session_start();
# if redirection, don't go back
if(!isset($_REQUEST['type'])){
  # admin sigin
  $admin_email = "admin@gmail.com";
  $admin_pass = "123456";
  $email=$_POST["ffemail"];
  $_SESSION['adminLoggedIn'] = true;

  if ($email != $admin_email || $_POST["fpassword"] != $admin_pass) {
      header("Location: http://localhost/tails_in_the_city/adminPages/admin_signin.php");
  }
}
?>

<html>
<head>
      <link rel="stylesheet" href="../styles/style3.css">
      <style>
  body {
    background-image: url('../images/p3.jpg');
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
 
   /* admin buttons */
 #button-90{
  transform: translate(400px,-65px);
  width: 310px;
}
  .button-90 {
    --b: 2px;   /* border thickness */
    --s: .45em; /* size of the corner */
    --color: #FFFFFF;
    
    padding: calc(.5em + var(--s)) calc(.9em + var(--s));
    color: var(--color);
    --_p: var(--s);
    background:
      conic-gradient(from 90deg at var(--b) var(--b),#0000 90deg,var(--color) 0)
      var(--_p) var(--_p)/calc(100% - var(--b) - 2*var(--_p)) calc(100% - var(--b) - 2*var(--_p));
    transition: .3s linear, color 0s, background-color 0s;
    outline: var(--b) solid #0000;
    outline-offset: .6em;
    font-size: 16px;
  
    border: 0;
  
    user-select: none;
    -webkit-user-select: none;
    touch-action: manipulation;
  }
  #header2{
    display: block;
 font-family: 'Fredericka the Great', cursive;
 font-size: 55px;
 transform: translate(+390px, -30px);
  }
  
  .button-90:hover,
  .button-90:focus-visible{
    --_p: 0px;
    outline-color: var(--color);
    outline-offset: .05em;
  }
  
  .button-90:active {
    background: var(--color);
    color: #fff;
  }
  </style>

<script>


</script>
</head>



<body>
<h2 id="header2">Tails in the City 🐾</h2>
<!-- <h4 id="subphrase">Admin</h4> -->


<button id="button-90" class="button-90"onclick="window.location.href='http://localhost/tails_in_the_city/adminPages/edit_breeding_status.php'">Update Breeding Status</button>
<button id="button-90" class="button-90"onclick="window.location.href='http://localhost/tails_in_the_city/adminPages/edit_ownership_status.php'">Update Ownership Status</button>
<button id="button-90" class="button-90"onclick="window.location.href='http://localhost/tails_in_the_city/adminPages/edit_medical_record.php'">Update medical Record</button>
<!-- Vet and store to be added -->
<button id="button-90" class="button-90"onclick="window.location.href='http://localhost/tails_in_the_city/adminPages/admin.php'">Update Info</button>
<!-- <button id="button-90" class="button-90"onclick="window.location.href='http://localhost/tails_in_the_city/adminPages/admin.php'">Add Vet</button> -->

</body>
</html>