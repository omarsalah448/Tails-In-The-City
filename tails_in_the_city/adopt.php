<?php
#search bar 
#checkboxes
include("connect.php");
include("newheader.php");

if ($_SESSION['loggedIn'] == false){
  header('Location: Menutest.php');
}

// if ($_SESSION['errors']){
//   print_r($_SESSION['errors']);
//   header('Location: store.php');
// }
# check if the user is signed in
// $userid= $_SESSION["user_id"];

$sqladopt= "SELECT * FROM pets
where pets.own_status = 'adopt'";

$resultadopt = mysqli_query($conn, $sqladopt);

?>
<link rel="stylesheet" href="styles/style5.css">
<style>
  @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
@import url('https://fonts.googleapis.com/css?family=Tangerine&display=swap');
@import url('https://fonts.googleapis.com/css?family=Helvetica&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Fredericka+the+Great&display=swap');
  @import url('https://fonts.googleapis.com/css2?family=Shippori+Mincho+B1&display=swap');
  @import url('https://fonts.googleapis.com/css2?family=Life+Savers&display=swap');
  
body {
margin : 50px;
    background-image: url('p50.png');
    /* background-repeat: no-repeat; */
    background-size: cover;
    background-attachment: fixed;
background-position: center;
  }
  #searchEntry{
  background: #8a6a9126;
  height: 40px;
  width: 1300px;
  margin-top: 20px;
  margin-left: 20px;
  border-radius: 5px;
  border: 1px solid #8a6a9126;
  padding: 10px;
  font-size: 16px;
  font-family: "Poppins", sans-serif;
  color: #333;
  transition: 0.3s;
  transform: translateY(+5px);
}
   .card{
    text-align: center;
background-color: white;
    display: inline-block;
    width: 420px;
    height: 800px;
    /* display:inline-block; */
    margin: 20px;
    border-radius: 10px;
    position: relative;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2),
    0 10px 20px 0 rgba(0, 0, 0, 0.19);
    transform: scale(0.80);
  transition: box-shadow 0.5s, transform 0.5s;
  
    &:hover{
    transform: scale(1);
    box-shadow: 5px 20px 30px rgba(0,0,0,0.2);
    z-index: 1000;
  }
}
#Adopt{
        width: 400px;
        height: 55px;
        color: white;
        background-color: #795ba3;
        text-align: center ;
        margin: 0 auto;
        display: block;
        border-radius: 10px;
        border: 1px hidden #302d2d;
        font-family: 'Poppins', sans-serif;
        font-size: 16px;
    }
#adopt{
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
      font-size: 16px
    }
    span{
      font-family: 'Life Savers', cursive;
     
    }
  
</style>
<h1 id = "title">Adopt Your Best Friend!</h1>
<div class="search">
    <!-- create 4 search bars to search by type, breed, age, and color -->
    <input type='search' placeholder='Search' id='searchEntry' onkeyup='handleSearch_adopt(this.value)' />
</div>

 <?php echo "<div class='adoptcard' id='adopt_page'>";
    while ($row = $resultadopt->fetch_assoc())
    {      
      echo "<div class='card'>";
      echo "<div class='card-body'>";
      echo" <div class='product__photo'>
      <div class='photo-container'>
      <div class='photo-main'>
        <div class='controls'>";
        echo "<img class='card-img-top' id='pet_image' src='".$row['photo']."' alt='Card image cap'>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "<div class='card-body'>";
        echo "<h2 id='pet_name'class='card-title'><span> ".$row['pet_name']." </span></h2>";
        echo "</div>";
        echo "</div>";
        echo "
        <form action='processing/adopt_processing.php' method='post'>
        <div class='form-group'>
        <h3 > Pet Type: " . $row["pet_type"] ." </h3> 
        <h3>Breed: " . $row["breed"] ." </h3> 
        <h3> Age: " . $row["age"] ." </h3> 
        <h3>Color: " . $row["color"] ." </h3> 
        <h3 >Gender: ".$row["gender"]." </h3>

        <input type='hidden' name='pet_id' id='pet_id' value='" . $row["pet_id"] . "'>
        <input type='hidden' name='pet_name' id='pet_name' value='" . $row["pet_name"] . "'>
        <input type='hidden' name='pet_type' id='pet_type' value='" . $row["pet_type"] . "'>
        <input type='hidden' name='breed' id='breed' value='" . $row["breed"] . "'>
        <input type='hidden' name='age' id='age' value='" . $row["age"] . "'>
        <input type='hidden' name='color' id='color' value='" . $row["color"] . "'>
        <input type='hidden' name='gender' id='gender' value='".$row["gender"]."'>
        <input type='hidden' name='photo' id='photo' value='".$row["photo"]."'>
        <button type='submit' class='btn btn-primary' id='Adopt' name='Adopt' value='Adopt'>Adopt</button>
        </div>
        </form>";
        echo  "</div> ";
       
   }


// free result from memory
mysqli_free_result($resultadopt);
mysqli_close($conn);
?>
<script src="validation.js"></script>