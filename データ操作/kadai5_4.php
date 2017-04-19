<?php

var_dump($_FILES);
echo "<br>";
$file_name = 'upload.txt';
move_uploaded_file($_FILES['userfile'] ['tmp_name'], "$file_name");
$upload_get = file_get_contents("$file_name");
echo 'アップされたファイルの中身'."$upload_get";
