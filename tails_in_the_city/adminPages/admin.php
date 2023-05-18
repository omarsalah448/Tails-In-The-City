<?php 
include('../connect.php');
session_start();

$sql = "SELECT * FROM pets";
$sql2 = "SELECT * FROM store";
$sql3 = "SELECT * FROM vet";
$result = mysqli_query($conn, $sql);
$result2 = mysqli_query($conn, $sql2);
$result3 = mysqli_query($conn, $sql3);
$res = mysqli_fetch_all($result, MYSQLI_ASSOC);
$res2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);
$res3 = mysqli_fetch_all($result3, MYSQLI_ASSOC);
// free result from memory
mysqli_free_result($result);
mysqli_free_result($result2);
mysqli_free_result($result3);
mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Admin</title>
</head>
<body>
        <br>
        <div style="display: flex; width: 75%; margin: auto;">
          <div class="form-check">
            <input class="form-check-input" type="radio" id="pet_admin_checkbox" name="pet_admin_checkbox" onclick="handle_pet_admin_checkbox()" checked />
            <label class="form-check-label" for="pet_admin_checkbox" style="padding-right: 20px;">
              Pets
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" id="store_admin_checkbox" name="store_admin_checkbox" onclick="handle_store_admin_checkbox()" />
            <label class="form-check-label" for="store_admin_checkbox" style="padding-right: 20px;">
              Stores
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" id="vet_admin_checkbox" name="vet_admin_checkbox" onclick="handle_vet_admin_checkbox()" />
            <label class="form-check-label" for="vet_admin_checkbox">
              Vets
            </label>
            <form>
            <input type="button" value="Back" style="margin-left: 725px;" class="btn btn-outline-primary" id='back' onclick="history.go(-1)">
            </form>
          <!-- </div>
          <a href="../adminPages/admin_signin_processing.php" style="margin-left: 725px;"><button class="btn btn-outline-primary">Back</button></a>
        </div> -->
        <br>
            <div class="input-group" style="width: 75%; align-items: center; text-align: center; margin: auto;">
                <input type="search" class="form-control rounded" placeholder="Search" id='searchbreed' onkeyup="handleSearch_admin(this.value)" aria-label="Search" aria-describedby="search-addon" />
                <button type="button" class="btn btn-outline-primary">search</button>
            </div><br><br><br>
<div id="admin_page">
            <div class="mainbar" id="mainbar">
             <?php foreach ($res as $pet){ ?>
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
            <?php }  ?>
            </div>

            <div class="mainbar" id="mainbar">
              <?php
              foreach ($res2 as $store){ ?>
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
              <?php }  ?>
            </div>

            <div class="mainbar" id="mainbar">
              <?php
              foreach ($res3 as $vet){ ?>
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
              <?php }  ?>
            </div> 
  </div>
</body>
<script src="../validation.js"></script>
</html>

 