<?php
 try {
   $pdo_object = new PDO('mysql:host=localhost;dbname=challenge_db;charset=utf8','kitagawa','19881022');

   echo "接続しました";
 } catch (PDOException $Exception) {
         die('接続エラー:'.$Exception->getMessage());
 }
