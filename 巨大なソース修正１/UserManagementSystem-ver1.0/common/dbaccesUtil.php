<?php

//DBへの接続用を行う。成功ならPDOオブジェクトを、失敗なら中断、メッセージの表示を行う
function connect2MySQL(){
    try{
        $pdo = new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8','kitagawa','19881022');
        return $pdo;
    } catch (PDOException $e) {
        die('接続に失敗しました。次記のエラーにより処理を中断します:'.$e->getMessage());
    }
}

function insertMysql($name,$birthday,$tell,$type,$comment) {
  $insert_db = connect2MySQL();
  date_default_timezone_set('Asia/Tokyo');

  $insert_sql = "INSERT INTO user_t(name,birthday,tell,type,comment,newDate)"
          . "VALUES(:name,:birthday,:tell,:type,:comment,:newDate)";

  $insert_query = $insert_db->prepare($insert_sql);


  $insert_query->bindValue(':name',$name);
  $insert_query->bindValue(':birthday',$birthday);
  $insert_query->bindValue(':tell',$tell);
  $insert_query->bindValue(':type',$type);
  $insert_query->bindValue(':comment',$comment);
  $insert_query->bindValue(':newDate',date('Y-m-d H:i:s'));

  $insert_query->execute();

  $insert_db=null;

}
