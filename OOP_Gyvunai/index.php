<?php
require "../autoloader.php";

$liutas = new Liutas(500);
$kiskis = new Kiskis(3);
$zole = new Zole(1);
$tunas = new Tunas(2);
$ryklys = new Ryklys(100);

$kiskis->valgo($zole);
echo "<br>";

$liutas->valgo($kiskis);
echo "<br>";

$tunas->valgo($zole);
echo "<br>";

$tunas->valgo($ryklys);
echo "<br>";

$liutas->valgo($ryklys);
echo "<br>";

$ryklys->valgo($tunas);