<?php
/*以下の課題を、PHPからのPDOを用いて実現してください。
フォームからデータを挿入できる処理を構築してください。*/

    if (isset($_POST['profilesID'])) {
         $id = $_POST['profilesID'];
    }
    if (isset($_POST['name'])) {
         $name = $_POST['name'];
    }
    if (isset($_POST['tell'])) {
         $tell = $_POST['tell'];
    }
    if (isset($_POST['age'])) {
         $age = $_POST['age'];
    }
    if (isset($_POST['birthday'])) {
         $birthday = $_POST['birthday'];
    }

    if (isset($id)||isset($name)||isset($tell)||isset($age)||isset($birthday)) {
      $pdo = new PDO('mysql:host=localhost;dbname=challenge_db;charset=utf8','kitagawa','19881022');

      try {
        $pdo = new PDO('mysql:host=localhost;dbname=challenge_db;charset=utf8','kitagawa','19881022');
        echo "接続しました<br>";
   } catch(PDOEception $Exception) {
         die('接続に失敗しました:'.$Exception -> getMessage().'<br>');

      }

       echo "--------------------------------<br>";

       $sql = "insert into profiles(profilesID,name,tell,age,birthday) value (:profilesID,:name,:tell,:age,:birthday)";

       $query = $pdo -> prepare($sql);

       $query -> bindValue(':profilesID',$id);
       $query -> bindValue(':name',$name);
       $query -> bindValue(':tell',$tell);
       $query -> bindValue(':age',$age);
       $query -> bindValue(':birthday',$birthday);

       $query -> execute();
       echo "データを追加しました<br>";

       $pdo = null;
    }
 ?>

 <!DOCTYPE html>
 <html>
     <head>
         <mate charset = "utf-8">
         <title>challenge7_9</title>
     </head>
     <body>
         <h2>データの追加</h2>
         <form action = "challenge7_9.php" method = "post">
            ID : <input type = 'text' name = 'profilesID' placeholder = '(例)1' required>
            名前 : <input type = 'text' name = 'name' placeholder = '(例)山田 太郎' >
            電話番号 : <input type = 'text' name = 'tell' placeholder = '(例)0120-1111-2222'>
            年齢 : <input type = 'text' name = 'age' placeholder = '(例)47'>
            誕生日 : <input type = 'text' name = 'birthday' placeholder = '(例)1970-01-01'>
            <input type = "submit" name = "serch" value = "追加">
         </form>
      </body>
  </html>
