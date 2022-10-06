<?php
require './connect.php';
// include "./connect.php";
// global $conn;
// $result = mysqli_query($conn,"SELECT * FROM user");
//lấy dữ liệu từ from gọi lên
$username = $_POST['username'];
$password = $_POST['password'];


// kết nối đến csdl
$db = mysqli_connect("localhost", "root", "", "user");


// Truy vấn dữ liệu
// $sql = "SELECT * FROM `user` (`username`,`password`)";
$sql = "select * from user where username='$username' and password=md5('$password')";
// echo $sql; exit;
// Thực thi truy vấn
$result = mysqli_query($db, $sql);

if(mysqli_num_rows($result) > 0){
    echo "<h1>Đăng nhập thành công</h1>";
    echo '<a href="php_administrator.php"> Next to page admin</a>';
    echo '<br>';
    echo '<br>';
    echo '<a href="login_user.php"> Đăng Xuất khỏi trái đất</a>';
}else{
    echo "<h2>Thất bại</h2>";
    require_once 'login_user.php';
}



// require './connect.php';
// if(isset($_POST['btn_login'])){

//     $username = $_POST['username'];
//     $password = $_POST['password'];
//     $birth = $_POST['birth'];
//     $address = $_POST['address'];
//     $email = $_POST['email'];
//     $phone = $_POST['phone'];

//     if(!empty($username) && !empty($password) && !empty($birth) && !empty($address) && !empty($email) && !empty($phone)){

//         $sql = "SELECT * FROM `user` (`username`,`password`,`birth`,`address`,`email`,`phone`) VALUES('$username',md5('$password'),'$birth','$address','$email','$phone')";

//         if($conn->query($sql)===TRUE){
//             echo "Lưu dữ liệu thành công!";
//         }else{
//             echo "Lỗi {$sql}" .$conn->error;
//         }
//     }else{
//         echo "Yêu cầu nhập đầy đủ các thông tin!";
//     }
// }
?>
