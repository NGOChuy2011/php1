<?php
    // $conn  = new mysqli('localhost','root','','user') or die('Kết Nối thất bại') ;
    
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Form tạo user</title>
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
</head>

<body>
    <div class="register-wrap">
        <div class="register-form" id="dang-ky-ngay">
            <h3>Đăng ký <br>USER</h3>
            <form action="reg.php" method="post" id="add_user">
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Username: " id="txtusername">
                </div>
                <div class="form-group">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Pass: "></input>
                </div>
                <div class="form-group">
                    <input id="birth" name="birth" class="form-control" placeholder="Birth: "></input>
                </div>
                <div class="form-group">
                    <input id="address" name="address" class="form-control" placeholder="Address: "></input>
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email: " id="txtemail">
                </div>
                <div class="form-group">
                    <input type="numble" name="phone" class="form-control" placeholder="Phone: " id="txtphone">
                </div>

                <div class="btn-register-wrap">
                    <button type="submit" class="btn-regsiter-now" id="dangky" name="btn_reg">Đăng ký ngay</button>
                </div>
            </form>
        </div>  
    </div>

</body>
    <!-- <script type="text/javascript">
        $(document).ready(function() {
            $('#dangky').click(function() {
                alert('Đã đăng ký thành công');
            });

        });
    </script> -->
</html>