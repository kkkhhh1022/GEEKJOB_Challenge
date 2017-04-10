<?php

$param1 = $_GET['param1'];    //雑貨、生鮮食品、その他が入ります
$param2 = $_GET['param2'];    //値段が入ります
$param3 = $_GET['param3'];    //個数が入ります

echo $param1;

$ans = $param2 / $param3;
$total = $param2 * $param3;

echo $ans;
echo $total;

if ($total < 3000) {
  $point4 = $total * 1.04;
  echo '$point4'."です";
}
elseif ($total < 5000) {
  $point5 = $total * 1.05;
  echo '$point5'."です";
} else {

}
?>
