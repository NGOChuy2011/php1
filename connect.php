<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "user";
global $conn;

$conn = new mysqli($servername,$username,$password,$db);
if( $conn->connect_error){
    die('could not connect: ' .$conn->connect_errno);
}
mysqli_select_db($conn,$db);
?>
