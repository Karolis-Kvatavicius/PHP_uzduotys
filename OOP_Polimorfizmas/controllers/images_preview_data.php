<?php

require "../models/classes.php";
require "db_connection.php";

$sql = "SELECT link FROM images WHERE straipsnio_id=".$_GET['article_id'];
$records = mysqli_query($link, $sql);

$images = [];
while ($record = $records->fetch_array(MYSQLI_ASSOC)) {
    $images[] = $record["link"];
}