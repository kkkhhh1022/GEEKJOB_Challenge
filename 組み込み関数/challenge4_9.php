<?php

$fp = fopen('syoukai.txt','r');
$file_txt = fgets($fp);
fclose($fp);

echo $file_txt;
