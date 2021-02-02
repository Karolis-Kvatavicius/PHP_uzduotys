<?php

require "../models/classes.php";
require "db_connection.php";

$sql = 'SELECT id, author, shortContent, content, publishDate, type, addDate, title, preview FROM articles ORDER BY type, publishDate DESC;';

$records = mysqli_query($link, $sql);

$articles = [];
while ($record = $records->fetch_array(MYSQLI_ASSOC)) {
    $articles[] = new $record['type']($record);
}
