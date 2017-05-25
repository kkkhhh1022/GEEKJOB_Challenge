<?php
    function logout_s(){
        session_unset();
        if (isset($_COOKIE['PHPSESSID'])) {
            setcookie('PHPSESSID', '', time() - 1800, '/');
        }
        session_destroy();
    }
    logout_s();
    // var_dump($_SESSION);
 ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>ログアウト</title>
    </head>
    <body>
        <p>ログアウトしました。</p>
        <br><br>
        <a href="http://localhost/class4_ログイン.php/">ログイン画面へ戻る</a>
    </body>
</html>
