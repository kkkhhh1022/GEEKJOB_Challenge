<?php
 try {
   $pdo = new PDO('mysql:host=localhost;dbname=challenge_db;charset=utf8','kitagawa','19881022');

   echo "接続しました";
 } catch (PDOException $Exception) {
         die('接続エラー:'.$Exception->getMessage());
 }

echo "<br><br>";

/*以下の課題を、PHPからのPDOを用いて実現してください。
profileID=1のnameを「松岡 修造」に、ageを48に、birthdayを1967-11-06に
更新してください*/

$sql = "update profiles set name ='松岡 修造' ,age = 48, birthday ='1967-11-06'where profilesID = 1";
// $sql = "update profiles set age =48 where profilesID = 1";
// $sql = "update profiles set birthday ='1967-11-06' where profilesID = 1";

$query = $pdo->prepare($sql);

$query->execute();

echo "レコードを更新しました!";

$result = $query->fetchall(PDO::FETCH_ASSOC);
foreach($result as $arr_num => $arr) {
  foreach($arr as $key => $value) {
    echo "[$key] : $value<br>";
  }
}

$pdo =null;
