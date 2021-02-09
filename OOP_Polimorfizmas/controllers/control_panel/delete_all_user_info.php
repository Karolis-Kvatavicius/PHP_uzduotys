<?php

require "../db_connection.php";
require "../../models/vartotojai.php";

$errors = [];
mysqli_begin_transaction($link);

$sql = "SELECT username FROM vartotojai WHERE id=".$_GET['id'].";";
$result = mysqli_fetch_assoc(mysqli_query($link, $sql));

if($result === NULL) {
    mysqli_rollback($link);
    $klaida = 'Deletion ERRORs';
    header('location: ../../views/control_panel.php?error='.$klaida);
    exit();
}

$sql = "SET foreign_key_checks = 0;";
$sql .= "DELETE FROM vartotojai WHERE id=".$_GET['id'].";";
$sql .= "SET foreign_key_checks = 1;";
mysqli_multi_query($link, $sql);
while($error = mysqli_next_result($link)) {
    $errors[] = $error;
    echo mysqli_error($link).'<br>';
}

$sql = "DELETE FROM articles WHERE author='".$result['username']."';";
$errors[] = mysqli_query($link, $sql);
echo mysqli_error($link).'<br>';

$sql = "DELETE FROM komentarai WHERE vartotojo_vardas='".$result['username']."';";
$errors[] = mysqli_query($link, $sql);
echo mysqli_error($link).'<br>';

if (in_array(false, $errors, true)) {
    mysqli_rollback($link);
    $klaida = 'Deletion error';
    echo '<pre>';
    print_r($errors);
    echo '</pre>';
    header('location: ../../views/control_panel.php?error='.$klaida);
} else {
    mysqli_commit($link);
    header('location: ../../views/control_panel.php');
}