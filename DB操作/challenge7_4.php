<?php
 try {
   $pdo = new PDO('mysql:host=localhost;dbname=challenge_db;charset=utf8','kitagawa','19881022');

   echo "接続しました";
 } catch (PDOException $Exception) {
         die('接続エラー:'.$Exception->getMessage());
 }

echo "<br><br>";

$sql = "select * from profiles where profilesID=4";

$query = $pdo->prepare($sql);

$query->execute();

$result = $query->fetchall(PDO::FETCH_ASSOC);
foreach($result as $arr_num => $arr) {
  foreach($arr as $key => $value) {
    echo "[$key] : $value<br>";
  }
}

$pdo = null;
