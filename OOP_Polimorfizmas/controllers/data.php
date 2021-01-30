<?php

require "../models/classes.php";

$link = mysqli_connect("localhost", "root", "student", "articles");

if (mysqli_error($link) != "") {
    $errors = mysqli_error($link);
}

$sql = 'SELECT id, author, shortContent, content, publishDate, type, addDate, title, preview FROM articles ORDER BY type, publishDate DESC;';

$records = mysqli_query($link, $sql);

$articles = [];
while ($record = $records->fetch_array(MYSQLI_ASSOC)) {
    $articles[] = new $record['type']($record);
}
