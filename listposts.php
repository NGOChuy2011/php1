<?php
require './connection.php';
include "connection.php";
global $conn;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Posts</title>
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
</head>

<body>
    <?php
    include "connection.php";
    $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:4;
    $current_page = !empty($_GET['page'])?$_GET['page']:1;
    $offset = ($current_page - 1) * $item_per_page;
    $result = mysqli_query($conn, "SELECT * FROM `posts` ORDER BY `id` ASC LIMIT ".$item_per_page."  OFFSET ".$offset);
    $totalRecords = mysqli_query($conn, "SELECT * FROM `posts`");
    $totalRecords = $totalRecords->num_rows;
    $totalPages = ceil($totalRecords / $item_per_page);
    // var_dump($totalRecords); exit;
    ?>
    <div id="wapper">
        <div id="header">
            <h1>List Posts</h1>
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
                    <?php while ($row = mysqli_fetch_array($result)) {?>
                        <tbody>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['title'] ?></td>
                                <td><?= $row['description'] ?></td>
                                <td><?= $row['image'] ?></td>
                                <td><?= $row['status'] ?></td>
                                <td><?= $row['author'] ?></td>
                                <td><a id="btn_edit_posts" href="index.php?id= <?= $row['id'] ?>">Edit</a></td>
                                <td><a id="btn_del_posts" href="php_del_posts.php?id= <?= $row['id']; ?>">Delete</a></td>
                            </tr>
                        <?php  ?>
                        
                        </tbody>
                    <?php } ?>
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

    <?php

    ?>
</body>

</html>