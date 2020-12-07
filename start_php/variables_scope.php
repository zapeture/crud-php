<?php 
$z = 20;  // GLOBAL SCOPE DECLERATION
$v = 4;
function myTest(){
  // global $z , $v; 
  // $v = $z * $v;
  //echo $z; // LOCAL SCOPE DECLERATION

  $GLOBALS['v'] = $GLOBALS['z'] * $GLOBALS['v'];

};

myTest();
echo "<p>The value of the variable is: $v </p>";

?>