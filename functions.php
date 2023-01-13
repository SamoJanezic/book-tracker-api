<?php
include "test.php";

function myCalculator($num01, $oper, $num02) {
  $sum;
  switch ($oper) {
    case "add":
      $sum = $num01 + $num02;
      break;
    case "sub":
      $sum = $num01 - $num02;
      break;
    default:
      $sum = "There was an error";
      break;
  }
  return $sum;
}

$all = [$_GET["num01"], $_GET["oper"], $_GET["num02"]];


echo "Value: " . myCalculator($all[0], $all[1], $all[2]);
