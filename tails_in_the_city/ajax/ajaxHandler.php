<?php  
include("../connect.php");
// type represents where we got info from
$type = $_REQUEST["type"];
$q = $_REQUEST["q"];
session_start();

# for checking email
if ($type == 'email'){
    $emailPattern = "/\S+@\S+\.\S+/";
    $email = $_REQUEST['q'];
    $sql = "SELECT email FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $res = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if ($res){
        echo 'Email already exists !';
        array_push($_SESSION['errors'], 'Email already exists !');
    }
    else{
        // remove from error list
        $_SESSION['errors'] = \array_diff($_SESSION['errors'], ['Email already exists !']);
    }
    if (preg_match($emailPattern, $email) != 1){
        echo "Not a valid Email form";
        array_push($_SESSION['errors'], 'Not a valid Email form');
    }
    else{
        // remove from error list
        $_SESSION['errors'] = \array_diff($_SESSION['errors'], ['Not a valid Email form']);
    }
}
# for checking password
if ($type == 'pass' or $type == 'retype'){
    if ($type == 'pass'){
        $_SESSION['pass'] = $q;
    }
    if ($type == 'retype'){
        $_SESSION['retype'] = $q;
    }

    if ($_SESSION['pass'] == $_SESSION['retype']){
        echo "passwords match";
        // remove from error list
        $_SESSION['errors'] = \array_diff($_SESSION['errors'], ["passwords don't match"]);
    }
    else {
        echo "passwords don't match";
        array_push($_SESSION['errors'], "passwords don't match");
    }
}

# for checking phone number
if ($type == 'phone_number'){
    $_SESSION['phone_number'] = $q;

    if (preg_match("/^[0-9]{4,12}$/", $q) != 1){
        echo "Not valid";
        array_push($_SESSION['errors'], 'Not Valid');
    }
    else{
        $_SESSION['errors'] = \array_diff($_SESSION['errors'], ["Not Valid"]);
    }
}

# for checking age
if ($type == 'age'){
    $_SESSION['age'] = $q;

    if (preg_match("/^[0-9]{1,2}$/", $q) != 1){
        echo "Not a valid Age";
        array_push($_SESSION['errors'], 'Not a valid Age');
    }
    else{
        $_SESSION['errors'] = \array_diff($_SESSION['errors'], ["Not a valid Age"]);
    }
}

# for checking gender
if ($type == 'gender'){
    $_SESSION['gender'] = $q;
    $gender_array = array("f", "m");
    if (!in_array(strtolower($q), $gender_array)) {
        echo "Gender Not Correct";
        array_push($_SESSION['errors'], 'Gender Not Correct');
    }
    else{
        $_SESSION['errors'] = \array_diff($_SESSION['errors'], ["Gender Not Correct"]);
    }
}
# for checking pet name
if ($type == 'pet_name_res'){
    $pet_name = $_REQUEST['q'];
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM owned_pets WHERE user_id='$user_id'AND pet_name LIKE '$pet_name' ";
    $result = mysqli_query($conn, $sql);
    $res = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if ($res){
        echo "pet found";
        $_SESSION['errors'] = \array_diff($_SESSION['errors'], ['pet not found !']);
    }
    else{
        // remove from error list
        array_push($_SESSION['errors'], 'pet not found !');
    }
}

?>