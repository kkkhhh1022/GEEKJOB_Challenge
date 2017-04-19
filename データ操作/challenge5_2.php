<?php

date_default_timezone_set('Asia/Tokyo');

$access_time = date('Y年m月d日');
setcookie('LastLoginDate',$access_time);

$lastDate = $_COOKIE['LastLoginDate'];

echo '前回のログイン日は、'.$lastDate.'です！';
