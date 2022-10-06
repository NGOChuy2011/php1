<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý bài viết</title>
    <link href="./style.css" media="screen" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.0.min.js"></script>

</head>
<?php
include('connection.php');
// require './connection.php';
global $conn;
$result = mysqli_query($conn, "SELECT * FROM posts");
if (isset($_POST['addpost'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $status = $_POST['status'];
    $author = $_POST['author'];
    $db = mysqli_connect("localhost", "root", "", "user");

    if ($title != '' && $description != '' && $status != '' && $author != '') {
        $sql = 'INSERT INTO `posts` SET `title` = "' . $title . '", `description` = "' . $description . '", `image` = "' . $image . '", `status` = "' . $status . '", `author` = "' . $author . '"';
        $result = mysqli_query($db, $sql);
        if (mysqli_num_rows($result) > 0) {
            echo 'Thêm thành công';
            header("location: listposts.php");
        } else {
            echo 'lỗi';
        }
    } else {
        echo 'Dữ liệu không hợp lệ';
    }
}
?>


<body>
    <?php
    include "connection.php";
    $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 4;
    $current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($current_page - 1) * $item_per_page;
    $result = mysqli_query($conn, "SELECT * FROM `posts` ORDER BY `id` ASC LIMIT " . $item_per_page . "  OFFSET " . $offset);
    $totalRecords = mysqli_query($conn, "SELECT * FROM `posts`");
    $totalRecords = $totalRecords->num_rows;
    $totalPages = ceil($totalRecords / $item_per_page);
    // var_dump($totalRecords); exit;
    ?>
    <div id="wapper">
        <div id="header">
            <h1>Quản lý bài viết</h1>
        </div>
        <div id="content">
            <?php
            if (isset($_GET['id'])) {
                $datarow = array();
                $id = (int)$_GET['id'];
                // $sql = "SELECT * FROM `posts` WHERE `id` = '$id'";
                if (isset($_POST['updated'])) {
                    $title = $_POST['title'];
                    $description = $_POST['description'];
                    $image = $_POST['image'];
                    $status = $_POST['status'];
                    $author = $_POST['author'];
                    $sql = 'UPDATE `posts` SET `title` = "' . $title . '", `description` = "' . $description . '", `status` = "' . $status . '", `author` = "' . $author . '" WHERE `id` = "' . $id . '" ';
                    if (mysqli_query($conn, $sql)) {
                        echo "UPDATEDATA THÀNH CÔNG";
                    } else {
                        echo "Có Lỗi Update";
                    }
                }
                $sql = "select * from posts where id='$id'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result)) {
                    while ($row = mysqli_fetch_array($result)) {
                        $datarow['id'] = $row['id'];
                        $datarow['title'] = $row['title'];
                        $datarow['description'] = $row['description'];
                        $datarow['image'] = $row['image'];
                        $datarow['status'] = $row['status'];
                        $datarow['author'] = $row['author'];
                    }
                }
            }
            ?>

            <form action="" method="POST">
                <table id="form_add">
                    <tr>
                        <td>Title</td>
                        <td><input type="text" value="<?php if (isset($datarow['title'])) {
                                                            echo $datarow['title'];
                                                        } ?>" name="title"> </td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td><textarea name="description"><?php if (isset($datarow['description'])) {
                                                                echo $datarow['description'];
                                                            } ?> </textarea></td>
                    </tr>
                    <tr>
                        <td>Image</td>
                        <td><input type="file" value="<?php if (isset($datarow['image'])) {
                                                            echo $datarow['image'];
                                                        } ?>" name="image"> </td>
                    </tr>
                    <tr>
                        <td>Status </td>
                        <td><input type="text" value="<?php if (isset($datarow['status'])) {
                                                            echo $datarow['status'];
                                                        } ?>" name="status"> </td>
                    </tr>
                    <tr>
                        <td>Author </td>
                        <td><input type="text" value="<?php if (isset($datarow['author'])) {
                                                            echo $datarow['author'];
                                                        } ?>" name="author"> </td>
                    </tr>
                    <tr>
                        <td><input style="width: 100px;" type="submit" name="addpost" value="Created_at"></td>
                    </tr>
                    <tr>
                        <td><input style="width: 100px;" type="submit" name="updated" value="updated_at"></td>
                    </tr>
                </table>
            </form>

            <?php
            // $result = mysqli_query($conn, "SELECT * FROM posts");
            // if (mysqli_num_rows($result)) {
            ?>

            <table id="listposts" border="1px" style="border-collapse: collapse;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Author</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <?php while ($row = mysqli_fetch_array($result)) : ?>
                    <tbody>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['title'] ?></td>
                            <td><?= $row['description'] ?></td>
                            <td><?= $row['image'] ?></td>
                            <td><?= $row['status'] ?></td>
                            <td><?= $row['author'] ?></td>
                            <td><a id="btn_edit_posts" href="?id= <?= $row['id'] ?>">Edit</a></td>
                            <td><a id="btn_del_posts" href="php_del_posts.php?id= <?= $row['id']; ?>">Delete</a></td>
                        </tr>
                    <?php endwhile ?>
                    </tbody>
            </table>
            <?php
            // } else {
            //     echo 'khong ton tai bai viet';
            // }
            ?>
            <?php
            include "pagination.php";
            ?>
        </div>
    </div>
</body>
<!-- <script type="text/javascript">
        $(document).ready(function() {
            $('#btn_del_posts').click(function() {
                alert('Đã xoá thành công');
            });

        });
    </script> -->

</html>