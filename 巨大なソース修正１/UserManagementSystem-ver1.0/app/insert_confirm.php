<?php require_once '../common/defineUtil.php';
session_start();
$_SESSION['name'] = $_POST['name'];
// $_SESSION['birthday'] = $post_birthday;
$_SESSION['year'] = $_POST['year'];
$_SESSION['month'] = $_POST['month'];
$_SESSION['day'] = $_POST['day'];
$_SESSION['type'] = $_POST['type'];
$_SESSION['tell'] = $_POST['tell'];
$_SESSION['comment'] = $_POST['comment'];
require_once '../common/scriptUtil.php';
?>

<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
      <title>登録確認画面</title>
</head>
  <body>
    <?php

    // 2.生年月日の入力がされていない時にも正しく判定されるように作成
    if(!empty($_POST['name']) && $_POST['year'] != "---" && $_POST['month'] != "--" && $_POST['day'] != "--" &&!empty($_POST['type'])
            && !empty($_POST['tell']) && !empty($_POST['comment'])){

        $post_name = $_POST['name'];
        //date型にするために1桁の月日を2桁にフォーマットしてから格納
        $post_birthday = $_POST['year'].'-'.sprintf('%02d',$_POST['month']).'-'.sprintf('%02d',$_POST['day']);
        $post_type = $_POST['type'];
        $post_tell = $_POST['tell'];
        $post_comment = $_POST['comment'];
        $_SESSION['birthday'] = $post_birthday;

        //セッション情報に格納
    ?>

        <h1>登録確認画面</h1><br>
        名前:<?php echo $post_name;?><br>
        生年月日:<?php echo $post_birthday;?><br>
        種別:<?php echo $post_type?><br>
        電話番号:<?php echo $post_tell;?><br>
        自己紹介:<?php echo $post_comment;?><br>

        上記の内容で登録します。よろしいですか？

        <form action="<?php echo INSERT_RESULT ?>" method="POST">
          <input type="submit" name="yes" value="はい">
          <input type="hidden" name="check" value="check">
        </form>
        <form action="<?php echo INSERT ?>" method="POST">
            <input type="submit" name="no" value="登録画面に戻る">
        </form>



    <?php } else { ?>
      <!-- 3.項目が不完全なのかをわかるように作成 -->
        <h1>入力項目が不完全です</h1><br>
        <?php
         if($_POST['name'] == "") {
          echo "名前が未入力です。<br>";
        }; ?>
        <?php if( $_POST['year'] == "---" || $_POST['month'] == "--" || $_POST['day'] == "--") {
          echo "生年月日が未入力です。<br>";
        }; ?>
        <?php if($_POST['type'] == "") {
          echo "種別が未入力です。<br>";
        }; ?>
        <?php if($_POST['tell'] == "") {
          echo "電話番号が未入力です。<br>";
        }; ?>
        <?php if($_POST['comment'] == "") {
          echo "自己紹介が未入力です。<br>";
        }; ?>

        再度入力を行ってください
        <form action="<?php echo INSERT ?>" method="POST">
            <input type="submit" name="no" value="登録画面に戻る">
        </form>
    <?php } ?>

    <!-- 1.トップページへ戻るリンクの作成 -->
    <?php echo return_top(); ?>


</body>
</html>
