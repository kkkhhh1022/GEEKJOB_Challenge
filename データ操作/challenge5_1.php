<!DOCTYPE html>
<html lang="ja">
 <meta charset="UTF-8">
 <head>
   <title>PHP/データ操作</title>
  </head>
  <body>
   <form action="kadai5_1.php" method="POST">
       <h3>名前</h3>
       <input type="text" name="name"><br>
       <h3>性別</h3>
       男<input type="radio" name="sex" value="男">
       女<input type="radio" name="sex" value="女"> <br>
       <h3>趣味</h3>
       <textarea type="text" name="hobby" cols="100" rows="10"></textarea><br>
       <input type="submit" name="send">
   </form>
  </body>
</html>
