<?php 
include("connect.php");
session_start();
# check if the user is signed in
if ($_SESSION['loggedIn'] == false){
  header('Location: Menutest.php');
}

$user_id=   $_SESSION["user_id"];
echo "<link rel='stylesheet' type='text/css' href='styles/table1.css'>";
echo "<h2 id='title' >Tails in the city 🐾 </h2>";
  #display the items in the cart and the total price in a table
    $sql = "SELECT * FROM purchases WHERE user_id = '$user_id'";
    $result = mysqli_query($conn, $sql);
    $total_price = 0;
    if ($result->num_rows > 0)
    { 
      echo "<body class='large-screen'>
      <div class='wrap'>
      <h1 style='text-align:center'>Current Invoice</h1>
            <div class='table-wrapper'>
              <table class='table-responsive card-list-table'>
              <thead>
              <tr>
                  <th>Item Name</th>
                  <th>Item Price</th>
                  <th>Quantity</th>
                  <th>Total Price</th>
              </tr>
              </thead>";
        while ($row = $result->fetch_assoc())
        {
            $item_id = $row["item_id"];
            $sql2 = "SELECT * FROM store WHERE item_id = '$item_id'";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = $result2->fetch_assoc();
            $item_name = $row2["item_name"];
            $item_price = $row2["item_price"];
            $price=$item_price * $row["quantity"];
            $total_price += $item_price * $row["quantity"];
            $quantity=$row["quantity"];
            echo "<tbody>
            <tr>
                    <td>$item_name</td>
                    <td>$item_price</td>
                    <td>$quantity</td>
                    <td>$price</td>
                </tr>
                </tbody>
                ";
        }
        // echo "<h3 >Total Price: " . $total_price . "</h3>";
        echo "  </table>";
       
          echo"    </div>
            </div>
        </body>";
        echo "<h3 id='total' >Total Price: " . $total_price . "</h3>";
        //go back to store
        echo "<form  action='store.php' method='post'>
        <input  type='submit' id='back' value='Back to Store' class='button'>
        </form>";
       
      }
    else
    {
        echo "0 results";
    }

// Close connection
mysqli_close($conn);
    ?>