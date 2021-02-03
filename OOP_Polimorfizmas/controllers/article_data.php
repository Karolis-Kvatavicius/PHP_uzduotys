<?php

require "../models/classes.php";
require "db_connection.php";

$sql = 'SELECT id, author, shortContent, content, publishDate, type, addDate, title, preview, 
(SELECT GROUP_CONCAT(link SEPARATOR \'***\') FROM images WHERE straipsnio_id='.$_GET['article_id'].')  AS images, 
(SELECT GROUP_CONCAT(pavadinimas SEPARATOR \'***\') FROM temos
 JOIN straipsniai_temos ON temos_id=temos.id
 JOIN articles ON straipsnio_id=articles.id WHERE articles.id='.$_GET['article_id'].')  AS temos,
(SELECT GROUP_CONCAT(CONCAT_WS(\';\', id, turinys, straipsnio_id, vartotojo_vardas) SEPARATOR \'***\') 
FROM komentarai WHERE straipsnio_id='.$_GET['article_id'].') AS komentarai
FROM articles WHERE id= '.$_GET['article_id'].';';

$records = mysqli_query($link, $sql);

while ($record = $records->fetch_array(MYSQLI_ASSOC)) {
    $article = new $record['type']($record);
}