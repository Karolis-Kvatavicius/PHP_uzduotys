<?php

require "../db_connection.php";
require "../../models/vartotojai.php";

$statusValue = "Uzblokuotas";
if(isset($_GET['unblock']) && $_GET['unblock'] == "aktyvus") {
    $statusValue = ucfirst($_GET['unblock']);
}

$sql = "UPDATE vartotojai SET statusas='$statusValue' WHERE id=".$_GET['id'];

$records = mysqli_query($link, $sql);

header('location: ../../views/control_panel.php');