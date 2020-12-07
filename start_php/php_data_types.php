<?php
// string
// integer
// float (aka double)
// Boolean
// Array
// Object
// NULL
// Resource

// string
$string = "Zapeture";
echo $string; 
echo "<br>";
//integer
$s = 7;
echo $s;
echo "<br>";
//float
$float = 34.6493999999987479;
echo $float;
echo "<br>";
//Boolean
$isRed = true;
$isRed = !false;
echo "<br>";
//Array
$cities = array("Warsaw","Gydinia","Berlin","Hamburg");
var_dump($cities);
echo "<br>";
echo "<br>";
// Class
class Car{

  public $color;
  public $model;
  public function __construct($color,$model)
  {
    $this-> color = $color;
    $this-> model = $model;
  }
  public function message(){
    return "My car is a ". $this->color . "" .$this->model."!";
  } 
}

$myCar = new Car ("blue  ","Volvo");
echo $myCar -> message();
echo "<br>";
echo "<br>";
$myCar = new Car ("red  ","Toyota");
echo $myCar -> message();
echo "<br>";
echo "<br>";
//NULL
$d = "Hello World";
$t = null;

var_dump($t);

?>