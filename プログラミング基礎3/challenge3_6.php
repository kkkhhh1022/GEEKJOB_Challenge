<?php

function info($id) {
  $kitagawa = array(123,hiroki,1022,"神奈川");
  $kazuki = array(567,kazuki,0711,"東京");
  $takasi = array(987,takasi,1211,"千葉");

  if ($id == 123) {
    return $kitagawa;
  }
  elseif($id == 567) {
    return $kazuki;
  }
  elseif($id == 987) {
    return $takasi;
  }
}

$name = info(987);

echo $name[1].$name[2].$name[3];
