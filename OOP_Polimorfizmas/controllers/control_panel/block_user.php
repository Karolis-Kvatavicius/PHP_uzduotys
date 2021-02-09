<?php

require "../db_connection.php";
require "../../models/vartotojai.php";

$sql = "UPDATE vartotojai SET statusas='Uzblokuotas' WHERE id=".$_GET['id'];

$records = mysqli_query($link, $sql);

header('location: ../../views/control_panel.php');