<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Edit Pet</title>
</head>
<?php                     
  //On page 2
  include('../connect.php');
  $id = $_POST['submit'];
  $_SESSION['original_id'] = $id;
  $sql1 = "SELECT * FROM pets WHERE pet_id='$id';";
  $res1 = mysqli_query($conn,$sql1);
  $result1 = mysqli_fetch_all($res1, MYSQLI_ASSOC);
?>
<body>
    <section class="vh-100" >
        <div class="container">
        <form action="editPet_proc.php" method="POST">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-9">
            <br>
              <h1 class="text-white mb-4">Edit Pet</h1>
      
              <div class="card" style="border-radius: 15px;">
                <div class="card-body">
      
                  <div class="row align-items-center pt-4 pb-3">
                  <form action="editPet_proc.php" method="POST">
                    <div class="col-md-9 pe-5">
                    <?php foreach ($result1 as $m){ ?>
                      <h6 class="mb-0">Pet ID</h6> <br>
                      <input type="text" name="pet_id" id="pet_id" class="form-control form-control-lg" value="<?php echo $m['pet_id']; ?>"/> <br>
                      <h6 class="mb-0">Pet Name</h6> <br>
                      <input type="text" name="pet_name" id="pet_name" class="form-control form-control-lg" value="<?php echo $m['pet_name']; ?>"/> <br>
                      <h6 class="mb-0">Pet Type</h6> <br>
                      <input type="text" name="pet_type" id="pet_type" class="form-control form-control-lg" value="<?php echo $m['pet_type']; ?>"/> <br>
                      <h6 class="mb-0">Pet Breed</h6> <br>
                      <input type="text" name="pet_breed" id="pet_breed" class="form-control form-control-lg" value="<?php echo $m['breed']; ?>"/> <br>
                      <h6 class="mb-0">Pet Gender</h6> <br>
                      <input type="text" name="pet_gender" id="pet_gender" class="form-control form-control-lg" value="<?php echo $m['gender']; ?>"/> <br>
                      <h6 class="mb-0">Pet Age</h6> <br>
                      <input type="text" name="pet_age" id="pet_age" class="form-control form-control-lg" value="<?php echo $m['age']; ?>"/> <br>
                      <h6 class="mb-0">Pet color</h6> <br>
                      <input type="text" name="pet_color" id="pet_color" class="form-control form-control-lg" value="<?php echo $m['color']; ?>"/> <br>
                      <?php }?>
                    </div>
                  </div>
                  <div class="px-5 py-4">
                    <button type="submit" name="editPet_edit" id="editPet_edit" class="btn btn-primary btn-lg" value="set" id="btn">Submit</button>
                  </div>  
                  </form>    
                        <form action="editPet_proc.php" method="POST">
                       <!-- <button type="submit" name="editPet_delete" id="editPet_delete" style=" red; float: right; margin-bottom: 25px; margin-right: 20px;" class="btn btn-primary btn-lg" style="background-color: darkmagenta;;" value="<?php echo $result1[0]['pet_id']; ?>">Delete Pet</button> -->
                  </div>
                 </form>
                </div>
              </div>
            </div>
          </div>
        <br>
      </div>
      </section>
    </body>
</html>


