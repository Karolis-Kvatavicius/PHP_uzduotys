<?php
require "../autoloader.php";

ArrayValueConverter::setArray(["a" => 1, "b" => "Karolis", "c" => "nebeprisikiškiakopūsteliaudavome", "d" => 4, "e" => 5]);
// ArrayValueConverter::setArray([1, "Karolis", "nebeprisikiškiakopūsteliaudavome", 4, 5]);
echo ArrayValueConverter::valueToDec();
echo "<br>";
echo ArrayValueConverter::valueToOct();
echo "<br>";
echo ArrayValueConverter::valueToHex();
echo "<br>";
echo ArrayValueConverter::valueToBin();
echo "<br>";
// CONVERT BACK TO ORIGINAL VALUE
echo ArrayValueConverter::decToString();
echo "<br>";
echo "<br>";
echo ArrayValueConverter::valueToDec(true);
echo "<br>";
echo ArrayValueConverter::valueToOct(true);
echo "<br>";
echo ArrayValueConverter::valueToHex(true);
echo "<br>";
echo ArrayValueConverter::valueToBin(true);
echo "<br>";
// CONVERT BACK TO ORIGINAL VALUE
echo ArrayValueConverter::decToString(true);