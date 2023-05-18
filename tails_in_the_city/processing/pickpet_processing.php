<?php
#search bar 
#checkboxes
include("../connect.php");
include("../newheader.php");

# check if the user is signed in
$userid= $_SESSION["user_id"];
$_SESSION['pet_id'] = $_POST['pet_id'];
print_r($_SESSION['pet_id']);
$petname= $_POST["pet_name"];
$pettype= $_POST["pet_type"];
$petbreed= $_POST["breed"];
$petphoto= $_POST["photo"];
$petage= $_POST["age"];
$petgender= $_POST["gender"];
$petcolor= $_POST["color"];


#echo $_SESSION['pet_id'];

#echo "you selected " . $_SESSION['pet_id'];
#wait 3 seconds and redirect to profile_processing.php
#header("refresh:4;url=profile_processing.php");

#$resultadopt = mysqli_query($conn, $sqladopt);

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
       font-size: 18px;
    }
      
    html,body{
    
        display: grid;
  height: 100%;
  width: 100%;
  place-items: center;
    }
    body {
margin : 50px;
  background-color: #b2a6b5;
  /* background-image: url('images/p30.jpg'); */

     background-repeat: no-repeat; 
    background-size: cover;
    background-attachment: fixed;
background-position: center; 
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
           height: 490px;
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
  transition: box-shadow 0.5s, transform 0.5s;
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
        transform: translate(50px,-20px);
       
     }
    #rehome{
      width: 150px;
      height: 40px;
      color: white;
      background-color: #795ba3;
      text-align: center ;
      margin: 0 auto;
      display: block;
      border-radius: 10px;
      border: 1px hidden #302d2d;
      font-family: 'Poppins', sans-serif;
      font-size: 16px
    }

    </style>
  </head>
  <body>
    <h1 id="tails_in_the_city">Here's your picked pet...</h1>
  
    </body>
</html>
    <!-- Pet Card -->
    <div class="card" id="pet-card" >
    <div class="card-body">
    <h5 class="card-title"><?php echo $petname??''; ?></h5>
    <p class="card-text">ID: <?php echo $_SESSION["pet_id"]??''; ?></p>
    <p class="card-text">Type: <?php echo $pettype??''; ?></p>
    <p class="card-text">Breed: <?php echo $petbreed??''; ?></p>
    <p class="card-text"> Gender: <?php echo $petgender??''; ?></p>
    <p class="card-text"> Age: <?php echo $petage??''; ?></p>
    <p class="card-text">Color: <?php echo $petcolor??''; ?></p>
    <br> <br>
    <form action="../rehome.php" method="post">
    <button type='submit' class='btn btn-primary' id='rehome' name='rehome' value='rehome'>Rehome yor pet</button>
    </form>
    </div>
    </div>    
<script src="../validation.js"></script>