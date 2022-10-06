<?php
    // require './connect.php';
    include "connect.php";
    global $conn;
    $result = mysqli_query($conn,"SELECT * FROM user");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page_My_Account</title>
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
</head>
<body id="page-top">
    <div class="page-admin">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width= 100% cellspacing= "0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Birth</th>
                        <th>address</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Info</th>
                        <!-- <th>Insert</th> -->
                        <th>Delete</th>
                    </tr>
                </thead>

                <tbody>
                <?php while($row=mysqli_fetch_assoc($result)):?>
                    <tr>
                        <td><?=$row['id']?></td>
                        <td><?=$row['username']?></td>
                        <td><?=$row['password']?></td>
                        <td><?=$row['birth']?></td>
                        <td><?=$row['address']?></td>
                        <td><?=$row['email']?></td>
                        <td><?=$row['phone']?></td>
                        <td><a href="info.php?id=" ></a>Info</td>
                        <!-- <td><a id="btn_insert" href="add_user.php?id= <?=$row['id'];?>" >Add user</a></td> -->
                        <td><a id="btn_del" href="php_delete_user.php?id= <?=$row['id'];?>" >Delete</a></td>
                    </tr>
                    <?php endwhile ?>
                </tbody>
            </table>
            <div>
                <button><a class="btn_add_user" id="btn_insert" href="add_user.php" >Add user</a></button>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
        $(document).ready(function() {
            $('#btn_del').click(function() {
                alert('Đã xoá thành công');
            });

        });
</script>
</html>