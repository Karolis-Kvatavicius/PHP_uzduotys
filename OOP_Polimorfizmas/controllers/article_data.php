<?php

require "../models/classes.php";

$link = mysqli_connect("localhost", "root", "student", "articles");

if (mysqli_error($link) != "") {
    $errors = mysqli_error($link);
}

$sql = 'SELECT id, author, shortContent, content, publishDate, type, addDate, title, preview, 
(SELECT GROUP_CONCAT(link SEPARATOR \'***\') FROM images WHERE straipsnio_id='.$_GET['article_id'].')  AS images, 
(SELECT GROUP_CONCAT(pavadinimas SEPARATOR \'***\') FROM temos
 JOIN straipsniai_temos ON temos_id=temos.id
 JOIN articles ON straipsnio_id=articles.id WHERE articles.id='.$_GET['article_id'].')  AS temos
FROM articles WHERE id= '.$_GET['article_id'].';';

$records = mysqli_query($link, $sql);

while ($record = $records->fetch_array(MYSQLI_ASSOC)) {
    $article = new $record['type']($record);
}