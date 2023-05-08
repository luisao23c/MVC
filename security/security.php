<?php
class Example
{
  public $var = 123;
}

$e = new Example();
$e->var = 456;

var_dump(get_class_vars("Example"));
/*
array(1) {
  ["var"]=>
  int(123)
}
*/

var_dump(get_object_vars($e));
/*
array(1) {
  ["var"]=>
  int(456)
}
*/
?>
