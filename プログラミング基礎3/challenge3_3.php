<?php

function check($number1,$number2 = 5,$type = false) {
    $ans1 = $number1 * $number2;
    $ans2 = $ans1 * $ans1;

    if ($type == false) {
       echo $ans1;
    }else {

      echo $ans2;

      echo "<br>";
    }
}
check(5,8,true);;
