<?php

require "../models/classes.php";

$link = mysqli_connect("localhost", "root", "student", "articles");

if (mysqli_error($link) != "") {
    $errors = mysqli_error($link);
}

$sql = 'SELECT id, author, shortContent, content, publishDate, type, addDate, title, preview, 
(SELECT GROUP_CONCAT(link SEPARATOR \'***\') FROM images WHERE straipsnio_id='.$_GET['article_id'].') AS images 
FROM articles WHERE id= '.$_GET['article_id'].';';

$records = mysqli_query($link, $sql);

while ($record = $records->fetch_array(MYSQLI_ASSOC)) {
    $article = new $record['type']($record);
}