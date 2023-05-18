


<!-- add to selected items from store to data base -->
<?php
include("../connect.php");
session_start();


echo "<link rel='stylesheet' type='text/css' href='../styles/table1.css'>";
// if ($_SESSION['errors']){
//   print_r($_SESSION['errors']);
//   header('Location: ../store.php');
// }
# check if the user is signed in
// if (!isset($_SESSION["email"]) || !isset($_SESSION["password"])) {
//     echo "You are not signed in!";
//     echo "Redirecting to login page...";
//     header("Location: ../Menutest.php");
// }
// else{
//   $username = $_SESSION["username"];
//   $password = $_SESSION["password"];
//   $user_id=   $_SESSION["user_id"];
// }

#$user_id=   $_SESSION["user_id"];

$petid=$_POST["pet_id"];
$userpetid=$_POST["user_pet_id"]; 
#echo" pet id ". $petid. "user pet id ". $userpetid;
$date = date('d-m-y h:i:s');

$sql = "INSERT INTO breeding_history(pet1_id, pet2_id, breeding_date)
VALUES ('$userpetid','$petid', '$date')";
if(mysqli_query($conn, $sql)){
   #echo "successful";                                    
  } else{
      echo "no";
  }
  echo "<h2 id='title' >Tails in the city 🐾 </h2>";
  #display the items in the cart and the total price in a table
    $sql = "SELECT * FROM breeding_history WHERE pet1_id = '$userpetid'";
    $result = mysqli_query($conn, $sql);
    $total_price = 0;
    if ($result->num_rows > 0)
    { 
      echo "<body class='large-screen'>
      <div class='wrap'>
      <h1 style='text-align:center'>Breeding History</h1>
            <div class='table-wrapper'>
              <table class='table-responsive card-list-table'>
              <thead>
              <tr>
                  <th>pet ID</th>
                    <th>pet Name</th>
                    <th>pet Breed</th>
                  <th>breeding date</th>
              </tr>
              </thead>";
        while ($row = $result->fetch_assoc())
        {
            $pet_id = $row["pet2_id"];
            $sql2 = "SELECT * FROM pets WHERE pet_id = '$pet_id'";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = $result2->fetch_assoc();
            $pet_name = $row2["pet_name"];
            $breeding_date = $row["breeding_date"];
            $pet_breed = $row2["breed"];
            echo "<tbody>
            <tr>
            <td>$pet_id</td>
            <td>$pet_name</td>           
            <td>$pet_breed</td>
            <td>$breeding_date</td>
            </tr>
                </tbody>
                ";
        }
        echo "  </table>";
       
          echo"    </div>
            </div>
        </body>";
        // echo "<h3 id='total' >Total Price: " . $total_price . "</h3>";
        // //go back to store
        // echo "<form  action='store.php' method='post'>
        // <input  type='submit' id='back' value='Back to Store' class='button'>
        // </form>";
       
      }
    else
    {
        echo "0 results";
    }
  
  // Close connection
  mysqli_close($conn);
  mysqli_free_result($result);