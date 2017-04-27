<?php
 try {
   $pdo_object = new PDO('mysql:host=localhost;dbname=challenge_db;charset=utf8','kitagawa','19881022');

   echo "接続しました<br>";
 } catch (PDOException $Exception) {
         die('接続エラー:'.$Exception->getMessage());
 }

 // SQL文を格納した文字列を定義
 $sql = "insert into profiles(profilesID,name,tell,age,birthday) values (:profilesID,name,tell,age,birthday)";
 // 実行とその結果を受け入れる変数を用意
 $query = $pdo_object->prepare($sql);
 // 実数値は bindValue などを用いて中身を入れ替える（セキュリティ向上のため）
 $query -> bindValue(':profilesID',7);
 $query -> bindValue(':name','山田 太郎');
 $query -> bindValue(':tell','090-1111-2222');
 $query -> bindValue(':age',30);
 $query -> bindValue(':birthday','1999-05-23');
 // SQLを実行
 $query -> execute();

 echo "データを追加しました<br>";
