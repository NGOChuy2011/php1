<?php
// $conn  = new mysqli('localhost','root','','user') or die('Kết Nối thất bại') ;

include "connect.php";
global $conn;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Form đăng nhập user</title>
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
    
</head>

<body>
    <div class="login-wrap">
        <div class="login-form" id="dang-ky-ngay">
            <?php
            // $username = $_POST['username'];
            // $password = $_POST['password'];
            // $result = mysqli_query($conn,"SELECT * FROM user where username='$username' add password='$password'");
            // $row=mysqli_fetch_assoc($result);
            // // var_dump($row);
            // // die;
            // if($row){
            //     header("Location: page.php");
            // }else{
            //     echo "Tên đăng nhập hoặc mật khẩu không đúng!";
            // }
            ?>
            <h3>Đăng Nhập <br></h3>
            <form action="page.php" method="post" id="login_user">
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Username: " id="txtusername">
                </div>
                <div class="form-group">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Pass: "></input>
                </div>

                <div class="btn-login-wrap">
                    <button type="submit" class="btn-login-now" id="dangnhap" name="btn_login"  style=" margin: 10px auto;">Đăng Nhập</button>
                </div>
                <div class="btn-register-wrap">
                    <button type="submit" class="btn-regsiter-now" id="dangky" name="" style=" margin: 10px auto;"> <a style="text-decoration: none; color: #ffffff;" href="add_user.php"> Đăng ký ngay</a></button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>