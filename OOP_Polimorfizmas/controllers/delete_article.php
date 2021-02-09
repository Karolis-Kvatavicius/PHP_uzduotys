<?php
if ($_COOKIE['role'] == 'Administratorius') {
    require 'db_connection.php';

    $sql = 'DELETE FROM articles WHERE id='.$_GET['id'].';';

    mysqli_query($link, $sql);

    if(isset($_GET['user'])) {
        header('Location: ../views/user_articles.php?id='.$_GET['user']);
        exit();
    }
    header('Location: ../views/view.php');
}
