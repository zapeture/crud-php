<?php

// intergers are nubers without any decimals  -2147483648 and 2147483647
// floats are numbers with decimals 

// CHECKING NUMBER TYPE
// is_int()
// is_integer() - alias of is_int()
// is_long() - alias of is_int()

$x = 5878;
var_dump(is_int($x));
echo "<br>";
$x = 5.878;
var_dump(is_int($x));
echo "<br>";
// CHECKING IF IT IS A FLOAT
$x = 9999999999999999999999999999999999999999999999999999999999999999;
var_dump($x);
echo "<br>";
// php nan is "not a number"

$x = acos(8);
var_dump($x);
echo "<br>";
// CHECK IF NUMBER IS A NUMERICAL STRING

$j = 9798;
var_dump(is_numeric($j));
echo "<br>";
$j = "DOJ";
var_dump(is_numeric($j));
echo "<br>";
// CASTING

$p = 876.3438;
$int_cast = (int)$p;  // casting a float to int
echo $int_cast;
echo "<br>";  

$p = "876.3438";
$int_cast = (int)$p;  // casting a string to int
echo $int_cast;
echo "<br>";

?>