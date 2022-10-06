<?php
require './connection.php';
$id = (int) $_GET['id'];
$sql = "DELETE FROM `posts` WHERE `id` = {$id}";
if(!mysqli_query($conn,$sql)){
    die('Lỗi Sql: ' .mysqli_errno($conn));
}
// echo "Xoá Thành Công posts";
header("location: index.php");
?>
