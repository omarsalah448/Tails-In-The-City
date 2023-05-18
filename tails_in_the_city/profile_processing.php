
<?php
//include("connect.php");
include('newheader.php');
if ($_SESSION['loggedIn'] == false){
  header('Location: Menutest.php');
}

if (isset($_REQUEST["choose"])){
  showAlert("Please choose a pet");
}

$db = mysqli_connect("localhost","root","","tails_in_the_city");
//$tableName="users";
//fetch data from  php file
// $userid=$_SESSION["user_id"];
// echo "before session <br>";
// echo "user id is" .$_SESSION["user_id"]. "<br>";
// echo "after session";

$userid=$_SESSION["user_id"];

$sqluser="SELECT * FROM users WHERE user_id = '$userid'";
$result = $db->query($sqluser);
$row = $result->fetch_assoc();
$username=$row["user_name"];
$address=$row["user_address"];
$phone=$row["phone"];
$email=$row["email"];

// #echo user details in each line
// echo "user id is" .$userid. "<br>";
// echo "username is" .$username. "<br>";
// echo "address is" .$address. "<br>";
// echo "phone is" .$phone. "<br>";
// echo "email is" .$email. "<br>";


$sqlpet="SELECT * FROM pets join parent_pet 
                  on pets.pet_id=parent_pet.user_pet_id
                  WHERE user_id = '$userid'";

$resultpet= $db->query($sqlpet);
#$rowpetname_id = $resultpetname_id->fetch_assoc();
// echo "pet id is" .$rowpetname_id["pet_id"]. "<br>";
#$petid=$rowpetname_id["pet_id"];

# $sqlpet= "SELECT * FROM pets WHERE pet_id = '$petid'";
// $resultpet = $db->query($sqlpet);
// #$rowpet = $resultpet->fetch_assoc();
// $petname=$rowpet["pet_name"];
// $pettype=$rowpet["pet_type"];
// $petbreed=$rowpet["breed"];
// $petage=$rowpet["age"];
// $petcolor=$rowpet["color"];
// $petgender= $rowpet["gender"];


// echo "pet id is" .$petid. "<br>";
// echo "pet name is" .$petname. "<br>";
// echo "pet type is" .$pettype. "<br>";
// echo "pet breed is" .$petbreed. "<br>";
// echo "pet age is" .$petage. "<br>";
// echo "pet color is" .$petcolor. "<br>";
// echo "pet gender is" .$petgender. "<br>";



//display data

// echo $username;
// echo $address;
// echo $phone;
// echo $email;
// echo $user_id;

?>
 <html>
  <head>
    <style>
@import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
@import url('https://fonts.googleapis.com/css?family=Tangerine&display=swap');
@import url('https://fonts.googleapis.com/css?family=Helvetica&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Fredericka+the+Great&display=swap');
  @import url('https://fonts.googleapis.com/css2?family=Shippori+Mincho+B1&display=swap');
  @import url('https://fonts.googleapis.com/css2?family=Life+Savers&display=swap');


    *{
      margin: 0;
      padding: 2px;
      box-sizing: border-box;
  
       /* font-size: 18px; */

    }body {
    background-image: url('images/p41.jpg');
    background-repeat: no-repeat;
    background-size: 100% 100%;
    background-attachment: fixed;
background-position: center;
  }
    html,body{
        display: grid;
  height: 100%;
  width: 100%;
  place-items: center;
    }
   
    tr:nth-child(even) {
  background-color: #D6EEEE;
  
}

table,tr,th,td {
         border:0.5px solid black;
         width: 400px;
      }
      thead th,
tfoot th {
  font-family: 'Poppins', sans-serif;
}

th {
  letter-spacing: 2px;
}

td {
  letter-spacing: 1px;
}

tbody td {
  text-align: center;
}

tfoot th {
  text-align: right;
}
      #tails_in_the_city{
        font-family: 'Fredericka the Great', cursive;
        font-size: 50px;
        font-weight: 600;
        transform: translate(50px, 60px);
        margin-left: auto;
    margin-right: auto;
    text-align: center;
    letter-spacing: 2px;
//adjust the table borders

      }
      #pett{
        font-family: 'Fredericka the Great', cursive;
        font-size: 40px;
        font-weight: 600;
        transform: translate(50px, 70px);
        margin-left: auto;
    margin-right: auto;
    text-align: center;
    letter-spacing: 2px;
      }
      #table{
        transform:translateY(20px);
      }
      .card{
           height: 370px;
           width: 370px;
        font-family: 'Shippori Mincho B1', serif;
    display: inline-block;
     display:inline-block; 
    margin: 20px;
    background-color: #FFFFFF8c;
    border-radius: 10px;
    /* position: relative; */
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2),
    0 10px 20px 0 rgba(0, 0, 0, 0.19);
        transform: translate(300px,-287px);
    /* transform: scale(0.95); */
  /* transition: box-shadow 0.5s; */
    &:hover{
     /* transform: scale(3);  */
    box-shadow: 5px 20px 30px rgba(0,0,0,0.2);
    /* z-index: 1000; */
    background-color: #FFFFFF;
    /* move card upward */
 

  }
}
  #cardpet{
    height: 370px;
    width: 370px;
        font-family: 'Shippori Mincho B1', serif;
    display: inline-block;
     display:inline-block; 
    margin: 20px;
    background-color: #FFFFFF8c;
    border-radius: 10px;
    position: relative;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2),
    0 10px 20px 0 rgba(0, 0, 0, 0.19);
    transform: scale(0.95);
   transition: box-shadow 0.5s, transform 0.5s; */
     &:hover{
      transform: scale(3); 
    box-shadow: 5px 20px 30px rgba(0,0,0,0.2);
     z-index: 1000; 
    background-color: #FFFFFF;
  }  
}
     .card-title{
        font-family: 'Life Savers', cursive;
        font-size: 58px;
        font-weight: 650;
        color:#482d5c;
        transform:translate(10px, 20px);
    /* text-align: center; */
    letter-spacing: 2px;
     }
   
     .card-text{
        transform: translateY(35px);
        font-size: 26px;
        font-weight: 700;
     }
     #user-card{
        
        transform: translate(-140px,120px);
        
     }
     #pet-card{
        transform: translate(260px,-290px);
       
     }
     
#pick_pet{
      width: 120px;
      height: 40px;
      color: white;
      background-color: #795ba3;
      text-align: center ;
      margin: 0 auto;
      display: block;
      border-radius: 10px;
      border: 1px hidden #302d2d;
      font-family: 'Poppins', sans-serif;
      font-size: 16px;
      transform: translate(110px, -10px);
    }

    </style>
  </head>
  <body>
    <h1 id="tails_in_the_city">Here's your Profile...</h1>
  <!-- <table style="width:60%" id="table"class="table table-bordered">
  <thead><tr>
         <th id="sn">S.N</th>
         <th id="fn">Full Name</th>
         <th id="add">Address</th>
         <th id="mn">Mobile Number</th>
         <th id="em" >Email</th>
      
        
    </thead>

    <tr>
    <td><?php echo $_SESSION['user_id']??''; ?></td>
      <td><?php echo $_SESSION['username']??''; ?></td>
      <td><?php echo $_SESSION['user_address']??''; ?></td>
      <td><?php echo $_SESSION['phone']??''; ?></td>
      <td><?php echo $_SESSION['email']??''; ?></td>
      
     </tr>
   </table> -->
   <!-- <table style="width:60%" id="table"class="tablestyle">
  <thead><tr>
         <th id="sn">Pet  ID</th>
         <th id="fn">Type</th>
         <th id="add">Breed</th>
         <th id="mn">Gender</th>
         <th id="em" >Age</th>
        <th id="co" >Color</th>
      
        
    </thead>
    <h1 id="pett">And Your Pet Profile 🐾</h1>
    <tr>
    <td><?php echo $_SESSION['pet_id']??''; ?></td>
      <td><?php echo $_SESSION['pet_type']??''; ?></td>
      <td><?php echo $_SESSION['pet_breed']??''; ?></td>
      <td><?php echo $_SESSION['pet_gender']??''; ?></td>
      <td><?php echo $_SESSION['pet_age']??''; ?></td>
        <td><?php echo $_SESSION['pet_color']??''; ?></td>
      
     </tr>
   </table> -->
    <!-- profile Card -->
    <div class="card" id="user-card" >
    <div class="card-body">
    <h5 class="card-title"> <?php echo $username??''; ?></h5>


    <p  class="card-text" >Address: <?php echo $address??''; ?></p>
    <p class="card-text">ID: <?php echo $userid??''; ?></p>
    <p class="card-text">Phone Number: <?php echo $phone??''; ?></p>
    <p class="card-text">Email: <?php echo $email??''; ?></p>
    </div>
    </div>
    <!-- </body>
</html> -->
    <!-- Pet Card -->
    <!-- <div class="card" id="pet-card" >
    <div class="card-body">
    <h5 class="card-title"><?php echo $petname??''; ?></h5>
    <p class="card-text">ID: <?php echo $petid??''; ?></p>
    <p class="card-text">Type: <?php echo $pettype??''; ?></p>
    <p class="card-text">Breed: <?php echo $petbreed??''; ?></p>
    <p class="card-text"> Gender: <?php echo $petgender??''; ?></p>
    <p class="card-text"> Age: <?php echo $petage??''; ?></p>
    <p class="card-text">Color: <?php echo $petcolor??''; ?></p>
      
    </div>
    </div> -->
    <!-- //put each result from $resultpet in a card -->
    

  

    <?php
     while($row = mysqli_fetch_assoc($resultpet)){
      echo "<div class='card'> ";    
        echo "<div class='card-body'>";
        echo "<h2 id='pet_name'class='card-title'><span> ".$row['pet_name']." </span></h2>";
        echo "</div>";
        echo "
        <form action='processing/pickpet_processing.php' method='POST'>
        <div class='form-group'>
        <h3 class='card-text' >  Pet Type: " . $row["pet_type"] ." </h3> 
        <h3 class='card-text'>Breed: " . $row["breed"] ." </h3> 
        <h3 class='card-text'> Age: " . $row["age"] ." </h3> 
        <h3 class='card-text'>Color: " . $row["color"] ." </h3> 
        <h3 class='card-text' >Gender: ".$row["gender"]." </h3>

        <input type='hidden' class='card-text' name='pet_id' id='pet_id' value='" . $row["pet_id"] . "'>
        <input type='hidden'  class='card-text' name='pet_name' id='pet_name' value='" . $row["pet_name"] . "'>
        <input type='hidden' class='card-text' name='pet_type' id='pet_type' value='" . $row["pet_type"] . "'>
        <input type='hidden' class='card-text' name='breed' id='breed' value='" . $row["breed"] . "'>
        <input type='hidden' class='card-text' name='age' id='age' value='" . $row["age"] . "'>
        <input type='hidden' class='card-text' name='color' id='color' value='" . $row["color"] . "'>
        <input type='hidden' class='card-text' name='gender' id='gender' value='".$row["gender"]."'>
        <input type='hidden' class='card-text' name='photo' id='photo' value='".$row["photo"]."'>
        <button type='submit' class='btn btn-primary' id='pick_pet' name='pick_pet' value='pick_pet'>Pick Pet</button>
        </div>
        </form>";
        echo  "</div> ";
       
   }
    ?>
