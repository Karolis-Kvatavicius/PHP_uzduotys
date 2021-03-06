<?php

require "../models/classes.php";
require "db_connection.php";

$sql = 'SELECT id, pavadinimas FROM temos';

mysqli_begin_transaction($link);
$records = mysqli_query($link, $sql);
mysqli_commit($link);

$temos = [];
while ($record = $records->fetch_array(MYSQLI_ASSOC)) {
    $straipsnio_temos[] = $record;
}

// get article types
$article_classes = file_get_contents("../models/classes.php");
preg_match_all("/class (\w+) /i", $article_classes, $matches);

if (isset($_POST['submit'])) {

    unset($_POST['submit']);
    $author = $_POST['author'];
    $short_content = $_POST['short_content'];
    $content = $_POST['content'];
    $type = $_POST['type'];
    $title = $_POST['title'];
    $preview = $_POST['preview'];
    $temos = array_slice($_POST, 10, NULL, true);

    $searchFor = "/^additional_image/";
    $additional_images = array_filter($_POST, function ($key) use ($searchFor) {
        return preg_match($searchFor, $key);
    }, ARRAY_FILTER_USE_KEY);

    $queries = [];
    mysqli_begin_transaction($link);

    $sql = "INSERT INTO articles(author, shortContent, content, type, title, preview) 
            VALUES('$author', '$short_content', '$content', '$type', '$title', '$preview');";
    $queries['insert_article'][] = mysqli_query($link, $sql);
    echo mysqli_error($link);

    $straipsnio_id = mysqli_insert_id($link);
    foreach ($additional_images as $image) {
        if ($image != "") {
            $sql = "INSERT INTO images(straipsnio_id, link) VALUES('$straipsnio_id', '$image');";
            $queries['additional_images'][] = mysqli_query($link, $sql);
            echo mysqli_error($link);
        }
    }

    foreach ($temos as $tema) {
        $sql = "INSERT INTO straipsniai_temos(straipsnio_id, temos_id) VALUES('$straipsnio_id', '$tema');";
        $queries['temos'][] = mysqli_query($link, $sql);
        echo mysqli_error($link);
    }

    $commit = true;
    foreach ($queries as $key => $query) {
        if (in_array(false, $query, true)) {
            // print_r($queries);
            mysqli_rollback($link);
            echo "<p>Insert error</p>";
            $commit = false;
            break;
        }
    }

    if ($commit) {
        mysqli_commit($link);
    }
}
