<?php 

define("name","fortune",true);
echo name;
// PHP 7 CONSTANT ARRAYS

define("cars",["Mazda", "BMW","Toyota"]);
echo cars[2];

// CONSTANTS ARE GLOBAL

define("HELLO","fortune");

function myFunction()

{
  echo HELLO;
}

myFunction();

?>