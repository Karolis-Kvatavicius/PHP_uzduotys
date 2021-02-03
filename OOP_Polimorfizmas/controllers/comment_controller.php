<?php

require 'db_connection.php';

$sql = "INSERT INTO komentarai (turinys, straipsnio_id, vartotojo_vardas) VALUES('".$_POST['comment']."', '".$_POST['straipsnio_id']."', '".$_COOKIE['vartotojas']."');";

mysqli_query($link, $sql);

header('Location: ../views/view.php');