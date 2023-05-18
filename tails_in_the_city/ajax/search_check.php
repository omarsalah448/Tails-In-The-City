<?php 
include('../connect.php');
$type = $_REQUEST["type"];
if ($type == "admin_search"){
  $search_type = $_REQUEST["search_type"];
}
$sql = $_REQUEST["query"];
// echo $type;
// print_r($sql);

$result = mysqli_query($conn, $sql);
// $res = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<?php 
if ($type == "searchBar" or $type == 'checkbox'){
    echo "<div class='col-md-4' id='store_page'>";
    while ($row = $result->fetch_assoc()){      
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
      // echo "<p class='card-text'>".$row['item_price']."</p>";
      echo "</div>";
      echo "</div>";
      echo "
      <form action='store_processing.php' method='post'>
      <input type='hidden' name='item_id' value='" . $row["item_id"] . "'>
      <input type='hidden' name='item_name' value='" . $row["item_name"] . "'>
      <div class='price'>		EGP <span> " . $row["item_price"] . "</span> </div>
      <input type='hidden' name='item_quantity' value='" . $row["quantity"] . "'>
      <input type='number'id='entered_quantity' name='entered_quantity' min='1'  max=".$row["quantity"]."  value='1'>
      <input id= 'btn' type='submit' class='btn btn-primary' value='Purchase'>
      </form>
      </div>  <form id='review'> -Hands down the best Pet Store in Egypt.
      Very affordable prices, a kind staff, and such a high quality. 
     My cats always admire these scratches and toys. Keep going guys! Always sending you love from our family!-.<br>

     <label id='sig'>Karen Fr.</label>
     </form>";
    }
      echo "</div>"; 
  }

  if ($type == "searchBar_adopt"){
  echo "<div class='adoptcard' id='adopt_page'>";
    while ($row = $result->fetch_assoc())
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
  }
  if ($type == "searchBar_breeding"){
    session_start();
    $user_pet_id = $_SESSION['pet_id'];
    echo "<div class='breedingcard' id='breeding_page'>";
    while ($row = $result->fetch_assoc()){      
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
  }

  if ($type == "admin_search"){ ?>

    <div id="admin_page">
      <?php if ($search_type == "pet_checkbox"){ ?>
            <div class="mainbar" id="mainbar">
             <?php while ($pet = $result->fetch_assoc()){ ?>
            <div class="card" style="width: 18rem; margin-right: 20px; margin-top:20px;">
                <img src=<?php echo $pet["photo"]; ?> width="250" height="350" alt="Pet Image" class="card-img-top">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $pet['pet_id']; ?></h5>
                  <h6 class="card-title"><?php echo $pet['pet_name']; ?></h6>
                  <form action="editPet.php" method="POST">
                  <button class="btn btn-primary" type="submit" name="submit" value="<?php echo $pet['pet_id']; ?>">Edit Record</button>
                  </form>
                </div>
            </div>
            <?php }}  ?>
            </div>
            
            <?php if ($search_type == "store_checkbox"){ ?>
            <div class="mainbar" id="mainbar">
              <?php
              while ($store = $result->fetch_assoc()){  ?>
                <div class="officeContainer">
                 <div class="card" style="width: 18rem; margin-right: 10px;">
                  <img src=<?php echo $store["item_image"]; ?> width="250" height="350" alt="Item Image" class="card-img-top">
                    <div class="card-body">
                      <h4 class="card-title">ID: <?php echo $store['item_id']; ?></h4>
                      <h4 class="card-title">Price: <?php echo $store['item_price']; ?></h4>
                      <h5 class="card-title">Quantity: <?php echo $store['quantity']; ?></h5>
                      <form action="editStore.php" method="POST">
                        <button class="btn btn-primary" type="submit" name="submit" value="<?php echo $store['item_id']; ?>">Edit Item</button>
                      </form>
                    </div>
                </div>
              </div>
              <?php }}  ?>
            </div>

            <?php if ($search_type == "vet_checkbox"){ ?>
            <div class="mainbar" id="mainbar">
              <?php
              while ($vet = $result->fetch_assoc()){ ?>
                <div class="officeContainer">
                  <form action="editVet.php" method="POST">
                 <div class="card" style="width: 18rem; margin-right: 10px;">
                  <div class="card-body">
                    <h4 class="card-title">ID: <?php echo $vet['vet_id']; ?></h4>
                    <h4 class="card-title">Name: <?php echo $vet['vet_name']; ?></h4>
                    <h5 class="card-title">Phone: <?php echo $vet['phone']; ?></h5>
                    <button class="btn btn-primary" type="submit" name="submit" value="<?php echo $vet['vet_id']; ?>">Edit Vet</button>
                  </div>
                </div>
                </form>
              </div>
              <?php }}  ?>
            </div> 
  </div>

  <?php } 


  // free result from memory
  mysqli_free_result($result);
  mysqli_close($conn);
?>
