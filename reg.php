<?php
require './connect.php';
if(isset($_POST['btn_reg'])){

    $username = $_POST['username'];
    $password = $_POST['password'];
    $birth = $_POST['birth'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    if(!empty($username) && !empty($password) && !empty($birth) && !empty($address) && !empty($email) && !empty($phone)){

        $sql = "INSERT INTO `user` (`username`,`password`,`birth`,`address`,`email`,`phone`) VALUES('$username',md5('$password'),'$birth','$address','$email','$phone')";

        if($conn->query($sql)===TRUE){
            echo "Lưu dữ liệu thành công!";
        }else{
            echo "Lỗi {$sql}" .$conn->error;
        }
    }else{
        echo "Yêu cầu nhập đầy đủ các thông tin!";
    }
}
// header("location: add_user.php");
// header("location: login_user.php");
?>

<br>
<br>
<a href="add_user.php"> Trở lại trang đăng ký</a>;
<br>
<br>
<a href="login_user.php"> Đi Đăng Nhập Thôi</a>;
