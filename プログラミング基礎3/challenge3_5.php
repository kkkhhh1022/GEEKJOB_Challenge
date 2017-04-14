<?php

function return_data() {

  return array(1,"kitagawa",1022,"神奈川");
}
$data = return_data();
  echo $data[1].$data[2].$data[3];
