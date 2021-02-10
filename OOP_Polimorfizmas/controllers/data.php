<?php

require "../models/classes.php";
require "db_connection.php";

$sql = 'SELECT id, author, shortContent, content, publishDate, type, addDate, title, preview FROM articles ORDER BY type, publishDate DESC;';
$records = mysqli_query($link, $sql);

$articles = [];
while ($record = $records->fetch_array(MYSQLI_ASSOC)) {
    $sql = "SELECT COUNT(id) AS komentaru_skaicius FROM komentarai WHERE straipsnio_id=".$record['id'];
    $record['komentaru_skaicius'] = mysqli_fetch_assoc(mysqli_query($link, $sql))["komentaru_skaicius"];
    $articles[] = new $record['type']($record);
}
