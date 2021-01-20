<?php
require "autoloader.php";

$amphibiousCar = new AmphibiousMercedes();
echo "<pre>";
print_r($amphibiousCar);
echo "</pre>";
echo $amphibiousCar->countSailTime(100);