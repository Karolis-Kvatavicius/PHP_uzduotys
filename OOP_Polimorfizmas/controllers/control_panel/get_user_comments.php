<?php
$sql = "SELECT komentarai.id,  komentarai.turinys, komentarai.vartotojo_vardas
FROM komentarai JOIN vartotojai ON komentarai.vartotojo_vardas=vartotojai.username WHERE vartotojai.id=".$_GET['id'].";";

$records = mysqli_query($link, $sql);