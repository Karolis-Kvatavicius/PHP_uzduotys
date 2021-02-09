<?php

require "db_connection.php";
require "../models/vartotojai.php";

$sql = "SELECT id, username, vardas, pavarde, role, statusas FROM vartotojai;";

$records = mysqli_query($link, $sql);

$vartotojai = [];
while ($record = $records->fetch_array(MYSQLI_ASSOC)) {
    if($record['username'] != $_COOKIE['vartotojas']) {
        $vartotojai[] = new $record['role']($record);
    }
}