<?php
    date_default_timezone_set('Asia/Tokyo');
    const REDIRECT = "class4_セッション.php";
    function logout_s(){
        session_unset();
        if (isset($_COOKIE['PHPSESSID'])) {
            setcookie('PHPSESSID', '', time() - 1800, '/');
        }
        session_destroy();
    }
    function session_chk(){
        $period_time = 180;
        session_start();
        if(!empty($_SESSION['last_access'])){
            if((mktime() - $_SESSION['last_access']) > $period_time){
                echo '<meta http-equiv="refresh" content="0;URL='.REDIRECT.'?mode=timeout">';
                logout_s();
                exit;
            }else{
                $_SESSION['last_access']=mktime();
            }
        }else{
            echo '<meta http-equiv="refresh" content="0;URL='.REDIRECT.'">';
            exit;
        }
    }
    session_chk();
    if (empty($_POST['id'])) {
        $id = null;
    } elseif (isset($_POST['id'])) {
        $id = (int)$_POST['id'];
    }
    if (empty($_POST['name'])) {
        $name = null;
    } elseif (isset($_POST['name'])) {
        $name = $_POST['name'];
    }
    if (empty($_POST['kakaku'])) {
        $kakaku = null;
    } elseif (isset($_POST['kakaku'])) {
        $kakaku = (int)$_POST['kakaku'];
    }
    if (empty($_POST['zaiko'])) {
        $zaiko = null;
    } elseif (isset($_POST['zaiko'])) {
        $zaiko = (int)$_POST['zaiko'];
    }
    // $excess_or_deficiency = $residue - $regular_stock;
// var_dump($id);

      if (isset($id)) {
        $pdo_object = new PDO('mysql:host=localhost;dbname=challenge_db;charset=utf8','kitagawa','19881022');
        $sql = "SELECT id FROM syohin where id=$id";
        $query = $pdo_object->prepare($sql);
        $query->execute();
        $arr_zaiko = $query->fetchall(PDO::FETCH_ASSOC);
        $arr = $arr_zaiko[0];
        // var_dump($arr["id"]);
        if ($id == (int)$arr["id"]) {
            echo "そのIDは使えません。";
        }  else {
            $sql = "INSERT INTO syohin(id,name,kakaku,zaiko) VALUES($id,'$name',$kakaku,$zaiko)";
            $query = $pdo_object->prepare($sql);
            $query->execute();
            echo "登録しました。";
        }
    }
    $pdo_object = null;
?>

 <!DOCTYPE html>
 <html>
     <head>
         <meta charset="utf-8">
         <title>商品登録画面</title>
     </head>
     <body>
         <h2>商品登録</h2>
         <form action="class4_商品登録.php" method="post">
            <br>
            商品ID:<input type="number" name='id' required><br>
            商品名:<input type="text" name="name" required><br>
            価格:<input type="number" name='kakaku' required><br>
            在庫数:<input type="number" name='zaiko' required><br>
            <input type="submit" name="submit" value="登録">
            <br><br>
            <a href="http://localhost/class4_商品一覧.php/">商品一覧</a><br>
            <a href="http://localhost/class4_ログアウト.php/">ログアウト</a>
         </form>
     </body>
 </html>
