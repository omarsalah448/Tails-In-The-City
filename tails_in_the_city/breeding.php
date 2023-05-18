<?php
#search bar 
#checkboxes
include("connect.php");
include("newheader.php");

if ($_SESSION['loggedIn'] == false){
  header('Location: Menutest.php');
}

if (empty($_SESSION['pet_id']) == true){
  header('Location: profile_processing.php?choose=false');
  exit();
}

// print_r($_SESSION['pet_id']);

// if ($_SESSION['errors']){
//   print_r($_SESSION['errors']);
//   header('Location: store.php');
// }

#fetch all data in store table
//get user's pet id,gender
//print_r($_SESSION['pet_id']);
$userid= $_SESSION["user_id"];
$user_pet_id=$_SESSION["pet_id"];
//print_r($user_pet_id);
// $sqlpetid = "SELECT pet_id FROM parent_pet WHERE user_id = '$userid'";
// $pet_id = mysqli_query($conn, $sqlpetid);
// //removes first row from source
// $user_pet_id = $pet_id->fetch_assoc();
#print_r($user_pet_id);

//get type and gender of user's pet
$sqlmatch = "SELECT * FROM pets 
join parent_pet on parent_pet.user_pet_id=pets.pet_id 
WHERE parent_pet.user_id = '$_SESSION[user_id]'and parent_pet.user_pet_id = '$_SESSION[pet_id]'";

$resultpetmatch = mysqli_query($conn, $sqlmatch);
$petmatch = $resultpetmatch->fetch_assoc();
#print $petmatch
//print_r($petmatch);


# for ajax
$pet_type = $petmatch['pet_type'];
$gender = $petmatch['gender'];

//select all pets that are breeding and not the user's pet
$sqlbreeding = "SELECT * FROM pets
left join parent_pet on parent_pet.user_pet_id=pets.pet_id
WHERE pets.breeding_status = 'Breeding' 
and pets.pet_id != '$user_pet_id' 
and pets.pet_type like '$pet_type'
and pets.gender not like '$gender' ";

$resultbreeding = mysqli_query($conn, $sqlbreeding);

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
.card{
    text-align: center;
background-color: white;
    display: inline-block;
    width: 420px;
    height: 820px;
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
span{
      font-family: 'Life Savers', cursive;
     
    }
#searchbreed{
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
#btnconfirm{
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
  
</style>
<h1 id = "title">Let's Find Your Pet's Ideal Match!</h1>
<div class="search">
    <input type='search' placeholder='Search' id='searchbreed' onkeyup="handleSearch_breed(this.value, '<?php echo $user_pet_id; ?>', '<?php echo $pet_type; ?>', '<?php echo $gender; ?>')" />
</div>
<div class="con">
 <?php echo "<div class='breedingcard' id='breeding_page'>";
    while ($row = $resultbreeding->fetch_assoc()){      
      # display 4 items per row
      echo "<div class='card'>";
      echo "<div class='card-body'>";
      echo" <div class='product__photo'>
      <div class='photo-container'>
      <div class='photo-main'>
        <div class='controls'>";
        echo "<img class='card-img-top' src='".$row['photo']."' alt='Card image cap'>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "<div class='card-body'>";
        echo "<h1 id='pet_name'class='card-title'><span> ".$row['pet_name']." </span></h1>";
        //  echo "<p class='card-text'>".$row['item_price']."</p>";
        echo "</div>";
        echo "</div>";
        echo "
        <form action='processing/breeding_processing.php' method='post'>
        <div class='form-group'>
        <h3>Pet Type: " . $row["pet_type"] ." </h3> 
        <h3>Breed: " . $row["breed"] ." </h3> 
        <h3>Age: " . $row["age"] ." </h3> 
        <h3>Color: " . $row["color"] ." </h3> 
        <h3>Gender: ".$row["gender"]." </h3>
        <h3>id: ".$row["pet_id"]." </h3>
        <input type='hidden' name='pet_id' id='pet_id' value='" . $row["pet_id"] . "'>
        <input type='hidden' name='user_pet_id' id='user_pet_id' value='" . $user_pet_id. "'>
        <button type='submit' class='btn btn-primary' id='btnconfirm' name='btnconfirm' value='confirm'>Confirm</button>
        </div>
        </form>";
        echo  "</div>  <form id='review'> -Hands down the best Pet Store in Egypt.
        Very affordable prices, a kind staff, and such a high quality. 
       My cats always admire these scratches and toys. Keep going guys! Always sending you love from our family! ❤️-.<br>
  
       <label id='sig'>Karen Fr.</label>
       </form>";
  
       
   }


// free result from memory
// mysqli_free_result($resultbreeding);
// mysqli_close($conn);
?>
<script src="validation.js"></script>