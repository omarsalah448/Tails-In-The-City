<?php 
// this file is for the sole purpose of connecting to the database

// connecting to database
$HOST = 'localhost';
$USER = 'root';
$PASSWORD = '';
$DBNAME = 'tails_in_the_city';

$conn = mysqli_connect($HOST, $USER, $PASSWORD, $DBNAME);

// check the connection
if (!$conn){
    echo "Connection error: ".mysqli_connect_error();
}
?>