<?php

function my_profile() {
  echo "私の名前は北川大公です。<br/>";
  echo "誕生日は1988/10/22です。<br/>";
  echo "趣味はギターです。<br/>";

  return true;
}

$name = my_profile ();
  if ($name == true) {
    echo "正しく表示されました";
  }
  else {
    echo "正しく表示できませんでした";
  }
