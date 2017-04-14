<?php
  $stamp1 = mktime(0,0,0,1,1,2015);
  $stamp2 = mktime(23,59,59,12,31,2015);
  $sum = $stamp1 - $stamp2;
  echo $sum;
