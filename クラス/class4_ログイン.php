<?php
    // var_dump($_SESSION);
    session_start();
    const PASSWORD = "1022";
    const INPUT = 'http://localhost/class4_商品一覧.php';
    $userId = (int)$_POST['userId'];
    $pass = PASSWORD;
    $chkpass=null;
    if(empty($_POST['password'])){
        $chkpass=null;
    }else{
        $chkpass=$_POST['password'];
    }
    $pdo_object = new PDO('mysql:host=localhost;dbname=challenge_db;charset=utf8','kitagawa','19881022');
    $sql = "SELECT userId FROM user WHERE userId=$userId";
    $query = $pdo_object->prepare($sql);
    $query->execute();
    $result = $query->fetchall(PDO::FETCH_ASSOC);
    $arr = $result[0];
 ?>

 <!DOCTYPE html>
 <html lang="ja">
 <head>
 <meta charset="UTF-8">
       <title></title>
 </head>
 <body>
     <h1>ログイン画面</h1>

     <?php
    //  var_dump($userId);
    //  var_dump($arr["userId"]);
     if($pass!==$chkpass || $userId != (int)$arr["userId"]){
         if($chkpass!==null){
             echo 'IDかパスワードが異なります。もう一度IDとパスワードを入力してください<br>';
         }else{
             echo 'IDとパスワードを入力してください<br>';
         }
         ?>
         <form action="class4_ログイン.php" method="POST">
             ID:<input type="text" name="userId"><br>
             PASS:<input type="password" name="password"><br>
             <input type="submit" name="btnSubmit" value="ログイン">
         </form>
     <?php
     }else{
         echo 'ログインに成功しました。三秒後に移動します';
         echo '<meta http-equiv="refresh" content="3;URL='.INPUT.'">';
         $_SESSION['last_access']=mktime();
     }
     ?>
 </body>
 </html>
