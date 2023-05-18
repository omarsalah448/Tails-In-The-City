<?php
#search bar 
#checkboxes
include("connect.php");
include("newheader.php");


#fetch all data in store table
$sql = "SELECT * FROM store WHERE quantity > 0";
$result = mysqli_query($conn, $sql);
?>
<link rel="stylesheet" href="styles/style5.css">
<style>
  body {
margin : 50px;
    background-image: url('p50.png');
    /* background-repeat: no-repeat; */
    background-size: cover;
    background-attachment: fixed;
background-position: center;
  }
   .card{
background-color: white;
    display: inline-block;
    width: 420px;
    height: 600px;
    /* display:inline-block; */
    margin: 20px;
    border-radius: 10px;
    position: relative;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2),
    0 10px 20px 0 rgba(0, 0, 0, 0.19);
    transform: scale(0.95);
  transition: box-shadow 0.5s, transform 0.5s;
  
    &:hover{
    transform: scale(1);
    box-shadow: 5px 20px 30px rgba(0,0,0,0.2);
    z-index: 1000;
  }
}
</style>
<h1 id = "title">Now it's time to shop your Pet Supplies!</h1>
<input type='search' placeholder='Search' id='searchEntry' onkeyup='handleSearch(this.value)' />
</div>
<div class="con">
  <h5 id='headerr' class="">Popular Categories</h5>
  <div class="">
    <input class="" type="checkbox" id="dryFood"  onclick="handleCheckBox();"> Dry Food &nbsp;&nbsp;&nbsp;&nbsp;
    <input class="" type="checkbox" id="wetFood"  onclick="handleCheckBox();"> Wet Food &nbsp;&nbsp;&nbsp;&nbsp;
    <input class="" type="checkbox" id="toys"  onclick="handleCheckBox();"> Toys &nbsp;&nbsp;&nbsp;&nbsp;
    <input class="" type="checkbox" id="accessories"  onclick="handleCheckBox();"> Accessories &nbsp;&nbsp;&nbsp;&nbsp;
    <input class="" type="checkbox" id="hygiene"  onclick="handleCheckBox();"> Hygiene &nbsp;&nbsp;&nbsp;
  </div>

<?php echo "<div class='col-md-4' id='store_page'>";
    while ($row = $result->fetch_assoc()){      
      # display 4 items per row
      echo "<div class='card'>";
      echo "<div class='card-body'>";
     echo" <div class='product__photo'>
      <div class='photo-container'>
      <div class='photo-main'>
        <div class='controls'>";
      echo "<img class='card-img-top' src='".$row['item_image']."' alt='Card image cap'>";
      echo "</div>";
      echo "</div>";
      echo "</div>";
      echo "</div>";
      echo "<div class='card-body'>";
      echo "<h1 id='productname'class='card-title'>".$row['item_name']."</h1>";
      //  echo "<p class='card-text'>".$row['item_price']."</p>";
      echo "</div>";
      echo "</div>";
      echo "
      <form action='store_processing.php' method='post'>
      <input type='hidden' name='item_id' value='" . $row["item_id"] . "'>
      <input type='hidden' name='item_name' value='" . $row["item_name"] . "'> 
      <input type='hidden' name='item_price' value='" . $row["item_price"] . "'>
       <div class='price'  > EGP <span>". $row["item_price"] . "</span> </div>
      <input type='hidden' name='item_quantity' value='" . $row["quantity"] . "'>
      <input type='number'id='entered_quantity' name='entered_quantity' min='1' max=".$row["quantity"]."  value='1'>
      <input id= 'btn' type='submit' class='btn btn-primary' value='Purchase'>
      </form>
      </div>  <form id='review'> -Hands down the best Pet Store in Egypt.
      Very affordable prices, a kind staff, and such a high quality. 
     My cats always admire these scratches and toys. Keep going guys! Always sending you love from our family! ❤️-.<br>

     <label id='sig'>Karen Fr.</label>
     </form>";

       
    }

// free result from memory
mysqli_free_result($result);
mysqli_close($conn);
?>
<script src="validation.js"></script>