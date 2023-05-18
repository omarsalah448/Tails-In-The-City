<?php  
include("../connect.php");
// type represents where we got info from
$type = $_REQUEST["type"];
$q = $_REQUEST["q"];
session_start();
# for checking vet id
if ($type == 'vet_id'){
    $vet_id = $_REQUEST['q'];
    $sql = "SELECT vet_id FROM vet WHERE vet_id = '$vet_id'";
    $result = mysqli_query($conn, $sql);
    $res = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if (!$res){
        echo 'Vet not found !';
        array_push($_SESSION['errors'], 'Vet not found !');
    }
    else{
        // remove from error list
        $_SESSION['errors'] = \array_diff($_SESSION['errors'], ['Vet not found !']);
    }
}
if ($type == 'pet_id'){
    $pet_id = $_REQUEST['q'];
    $sql = "SELECT pet_id FROM pets WHERE pet_id = '$pet_id'";
    $result = mysqli_query($conn, $sql);
    $res = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if (!$res){
        echo 'Pet not found !';
        array_push($_SESSION['errors'], 'Pet not found !');
    }
    else{
        // remove from error list
        $_SESSION['errors'] = \array_diff($_SESSION['errors'], ['Pet not found !']);
    }
}
if ($type == 'owner_id'){
    $owner_id = $_REQUEST['q'];
    $sql = "SELECT user_id FROM users WHERE user_id = '$owner_id'";
    $result = mysqli_query($conn, $sql);
    $res = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if (!$res){
        echo 'User not found !';
        array_push($_SESSION['errors'], 'User not found !');
    }
    else{
        // remove from error list
        $_SESSION['errors'] = \array_diff($_SESSION['errors'], ['User not found !']);
    }
}

if ($type == 'diagnosis' || $type == 'drugs'){
    $diagnosis = $_REQUEST['q'];
    
    if (is_numeric($diagnosis)){
        echo 'Not a valid form !';
        array_push($_SESSION['errors'], 'Not a valid form !');
    }
    else{
        // remove from error list
        $_SESSION['errors'] = \array_diff($_SESSION['errors'], ['Not a valid form !']);
    }
}
?>