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
    <title>Edit item</title>
</head>
<?php                     
  //On page 2
  include('../connect.php');
  $id = $_POST['submit'];
  $_SESSION['original_id'] = $id;
  $sql1 = "SELECT * FROM store WHERE item_id='$id';";
  $res1 = mysqli_query($conn,$sql1);
  $result1 = mysqli_fetch_all($res1, MYSQLI_ASSOC);
?>
<body>
    <section class="vh-100" >
        <div class="container">
        <form action="editStore_proc.php" method="POST">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-9">
            <br>
              <h1 class="text-white mb-4">Edit item</h1>
      
              <div class="card" style="border-radius: 15px;">
                <div class="card-body">
      
                  <div class="row align-items-center pt-4 pb-3">
                  <form action="editStore_proc.php" method="POST">
                    <div class="col-md-9 pe-5">
                    <?php foreach ($result1 as $m){ ?>
                      <h6 class="mb-0">Item ID</h6> <br>
                      <input type="text" name="item_id" id="item_id" class="form-control form-control-lg" value="<?php echo $m['item_id']; ?>"/> <br>
                      <h6 class="mb-0">Item Name</h6> <br>
                      <input type="text" name="item_name" id="item_name" class="form-control form-control-lg" value="<?php echo $m['item_name']; ?>"/> <br>
                      <h6 class="mb-0">Item Name</h6> <br>
                      <input type="text" name="item_price" id="item_price" class="form-control form-control-lg" value="<?php echo $m['item_price']; ?>"/> <br>
                      <h6 class="mb-0">Item Price</h6> <br>
                      <input type="text" name="item_quantity" id="item_quantity" class="form-control form-control-lg" value="<?php echo $m['quantity']; ?>"/> <br>
                      <h6 class="mb-0">Item Quantity</h6> <br>
                      <input type="text" name="item_category" id="item_category" class="form-control form-control-lg" value="<?php echo $m['item_category']; ?>"/> <br>
                      <h6 class="mb-0">Item Category</h6> <br>
                      <?php }?>
                    </div>
                  </div>
                  <div class="px-5 py-4">
                    <button type="submit" name="edititem_edit" id="edititem_edit" class="btn btn-primary btn-lg" value="set" id="btn">Submit</button>
                  </div>  
                  </form>    
                        <form action="editStore_proc.php" method="POST">
                       <!-- <button type="submit" name="edititem_delete" id="edititem_delete" style=" red; float: right; margin-bottom: 25px; margin-right: 20px;" class="btn btn-primary btn-lg" style="background-color: darkmagenta;;" value="<?php echo $result1[0]['item_id']; ?>">Delete item</button> -->
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


