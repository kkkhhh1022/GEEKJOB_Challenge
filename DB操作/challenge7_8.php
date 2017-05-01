<?php
/*以下の課題を、PHPからのPDOを用いて実現してください。
検索用のフォームを用意し、名前の部分一致で検索＆表示する処理を構築してください。
同じページにリダイレクトするPOST処理と、POSTに値が入っているかの条件分岐を活用すれば、
一つの.phpで完了できますので、チャレンジしてみてください*/

if (isset($_POST['key_word'])) {
     $key = $_POST['key_word'];
}

$pdo = new PDO('mysql:host=localhost;dbname=challenge_db;charset=utf8','kitagawa','19881022');

try {
     $pdo = new PDO('mysql:host=localhost;dbname=challenge_db;charset=utf8','kitagawa','19881022');
     echo "接続しました<br>";
} catch(PDOEception $Exception) {
      die('接続に失敗しました:'.$Exception -> getMessage().'<br>');
}

echo "--------------------------------<br>";

if (!empty($key)) {
     if ($key=='松'||$key=='岡'||$key=='修'||$key=='造') {
         $sql = "select * from profiles where name = '松岡 修造'";
     } elseif ($key =='鈴'||$key=='木'||$key=='茂') {
         $sql = "select * from profiles where name = '鈴木 茂'";
     } elseif ($key =='佐'||$key=='藤'||$key=='清') {
         $sql = "select * from profiles where name = '佐藤 清'";
     } else {
         echo "該当しません";
   }
} else {
    echo "データを受け取れませんでした";
}

$query = $pdo->prepare($sql);

$query->execute();

$result = $query->fetchall(PDO::FETCH_ASSOC);
foreach($result as $arr_num => $arr) {
  foreach($arr as $key => $value) {
    echo "[$key] : $value<br>";
  }
  echo "-------------------------------<br>";
}

$pdo =null;

?>

<!DOCTYPE html>

<html>
   <head>
       <meta charset = "utf-8">
       <title>challenge7_8</title>
   </head>
   <body>
        <form action ="challenge7_8.php" method = "post">
            <input type = 'text' name = 'key_word' maxlength ='1' placeholder = '漢字１文字で入力' required>
            <input type  = "submit" name = "search" value = "検索">
        </form>
   </body>
</html>
