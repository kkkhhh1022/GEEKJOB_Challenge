<?php

$num = 3;

function test() {

    global $num  ;
    static $local = 0;
    $local ++;

    echo $local." 回目の計算です。";

    echo $num *= 2;

    echo "<br>";
}

      while($i < 20) {

        test();
        $i++;
      }
