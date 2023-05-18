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
    <title>Edit vet</title>
</head>
<?php                     
  //On page 2
  include('../connect.php');
  $id = $_POST['submit'];
  $_SESSION['original_id'] = $id;
  $sql1 = "SELECT * FROM vet WHERE vet_id='$id';";
  $res1 = mysqli_query($conn,$sql1);
  $result1 = mysqli_fetch_all($res1, MYSQLI_ASSOC);
?>
<body>
    <section class="vh-100" >
        <div class="container">
        <form action="editVet_proc.php" method="POST">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-9">
            <br>
              <h1 class="text-white mb-4">Edit vet</h1>
      
              <div class="card" style="border-radius: 15px;">
                <div class="card-body">
      
                  <div class="row align-items-center pt-4 pb-3">
                  <form action="editVet_proc.php" method="POST">
                    <div class="col-md-9 pe-5">
                    <?php foreach ($result1 as $m){ ?>
                      <h6 class="mb-0">Vet ID</h6> <br>
                      <input type="text" name="vet_id" id="vet_id" class="form-control form-control-lg" value="<?php echo $m['vet_id']; ?>"/> <br>
                      <h6 class="mb-0">Vet Name</h6> <br>
                      <input type="text" name="vet_name" id="vet_name" class="form-control form-control-lg" value="<?php echo $m['vet_name']; ?>"/> <br>
                      <h6 class="mb-0">Vet Email</h6> <br>
                      <input type="text" name="vet_email" id="vet_email" class="form-control form-control-lg" value="<?php echo $m['email']; ?>"/> <br>
                      <h6 class="mb-0">Vet Phone</h6> <br>
                      <input type="text" name="vet_phone" id="vet_phone" class="form-control form-control-lg" value="<?php echo $m['phone']; ?>"/> <br>
                      <h6 class="mb-0">Vet Address</h6> <br>
                      <input type="text" name="vet_address" id="vet_address" class="form-control form-control-lg" value="<?php echo $m['vet_address']; ?>"/> <br>
                      <?php }?>
                    </div>
                  </div>
                  <div class="px-5 py-4">
                    <button type="submit" name="editvet_edit" id="editvet_edit" class="btn btn-primary btn-lg" value="set" id="btn">Submit</button>
                  </div>  
                  </form>    
                        <form action="editVet_proc.php" method="POST">
                       <!-- <button type="submit" name="editvet_delete" id="editvet_delete" style=" red; float: right; margin-bottom: 25px; margin-right: 20px;" class="btn btn-primary btn-lg" style="background-color: darkmagenta;;" value="<?php echo $result1[0]['vet_id']; ?>">Delete vet</button> -->
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


