<?php
if ($_COOKIE['role'] == 'administratorius') {
    require 'db_connection.php';

    $sql = 'DELETE FROM articles WHERE id='.$_GET['id'].';';

    mysqli_query($link, $sql);

    header('Location: ../views/view.php');
}
