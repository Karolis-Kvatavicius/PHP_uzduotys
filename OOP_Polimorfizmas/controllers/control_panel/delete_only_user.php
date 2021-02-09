<?php

require "../db_connection.php";
require "../../models/vartotojai.php";

$sql = "SET foreign_key_checks = 0;";
$sql .= "DELETE FROM vartotojai WHERE id=".$_GET['id'].";";
$sql .= "SET foreign_key_checks = 1;";

$records = mysqli_multi_query($link, $sql);

header('location: ../../views/control_panel.php');