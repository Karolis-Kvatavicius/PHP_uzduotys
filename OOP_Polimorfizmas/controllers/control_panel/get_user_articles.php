<?php
$sql = "SELECT * FROM articles WHERE author=(SELECT username FROM vartotojai WHERE id=".$_GET['id'].");";

$records = mysqli_query($link, $sql);

$articles = [];
while ($record = $records->fetch_array(MYSQLI_ASSOC)) {
    $articles[] = new $record['type']($record);
}