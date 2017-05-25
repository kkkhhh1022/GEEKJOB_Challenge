<?php require_once '../common/defineUtil.php';
 require_once '../common/scriptUtil.php';
 session_start();
$name = $_SESSION['name'];
$year = $_SESSION['year'];
$month = $_SESSION['month'];
$day = $_SESSION['day'];
$type = $_SESSION['type'];
$tell = $_SESSION['tell'];
$comment = $_SESSION['comment'];
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>登録画面</title>
</head>
<body>
    <form action="<?php echo INSERT_CONFIRM ?>" method="POST">
    名前:
    <input type="text" name="name" value="<?php echo $name ?>">
    <br><br>

    生年月日:
    <select name="year" >
        <option value="---">---</option>

        <?php
        for($i=1950; $i<=2010; $i++){ ?>
        <option value="<?php echo $i;?>" <?php  if($i == $year){echo 'selected';} ?>><?php echo $i ;?></option>
        <?php } ?>
    </select>年
    <select name="month">
        <option value="--">--</option>
        <?php
        for($i = 1; $i<=12; $i++){?>
        <option value="<?php echo $i;?>" <?php  if($i == $month){echo 'selected';} ?>><?php echo $i;?></option>
        <?php } ;?>
    </select>月
    <select name="day">
        <option value="--">--</option>
        <?php
        for($i = 1; $i<=31; $i++){ ?>
        <option value="<?php echo $i; ?>" <?php  if($i == $day){echo 'selected';} ?>><?php echo $i;?></option>
        <?php } ?>
    </select>日
    <br><br>

    種別:
    <br>
    <input type="radio" name="type" value="エンジニア"<?= $type == "エンジニア" ? ' checked' : ''?>>エンジニア<br>
    <input type="radio" name="type" value="営業"<?= $type == "営業" ? ' checked' : ''?>>営業<br>
    <input type="radio" name="type" value="その他"<?= $type == "その他" ? ' checked' : ''?>>その他<br>
    <br>
    電話番号:
    <input type="text" name="tell" value="<?php echo $tell ?>">
    <br><br>

    自己紹介文
    <br>
    <textarea name="comment" rows=10 cols=50 style="resize:none" wrap="hard"><?php echo $comment ?></textarea><br><br>

    <input type="submit" name="btnSubmit" value="確認画面へ">

    </form>

    <!-- 1.トップページへ戻るリンクの作成 -->
    <?php echo return_top(); ?>


</body>
</html>
