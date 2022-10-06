<?php
require './connect.php';
$id = (int) $_GET['id'];
$sql = "DELETE FROM `user` WHERE `id` = {$id}";
if(!mysqli_query($conn,$sql)){
    die('Lỗi Sql: ' .mysqli_errno($conn));
}
// echo "Xoá Thành Công user";
header("location: php_administrator.php");
?>
