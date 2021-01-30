<?php

require "../models/classes.php";

$link = mysqli_connect("localhost", "root", "student", "articles");

if (mysqli_error($link) != "") {
    $errors = mysqli_error($link);
}

$sql = "SELECT link FROM images WHERE straipsnio_id=".$_GET['article_id'];
$records = mysqli_query($link, $sql);

$images = [];
while ($record = $records->fetch_array(MYSQLI_ASSOC)) {
    $images[] = $record["link"];
}