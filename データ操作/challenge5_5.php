<!DOCTYPE html>
<html>
 <head>
   <meta charaset = "UTF-8">
   <title>PHPとHTMLの入力ホーム</title>
 </head>
  <body>

<?php

session_start();

   if (empty($_POST["user"])&&
       empty($_POST["sex"])&&
       empty($_POST["txt"])) {

         echo "エラーです";

       } else {

         $name = $_POST["user"];
         $sex  = $_POST["sex"];
         $free = $_POST["txt"];

         $_SESSION["name"] = $name;
         $_SESSION["sex"]  = $sex;
         $_SESSION["free"] = $free;

         echo "OK!";
       } ?>

         <form action="challenge5_5.php" method="post">

           名前:<input type="text" name="user" value="<?php if ( !empty($_SESSION['name']) ) {

                 echo $_SESSION['name'];

               } ?>"> <br><br>

        性別:男<input type="radio" name="sex" value="男" <?php if ( !empty($_SESSION["sex"]) ) {

                if ( $_SESSION["sex"] == "男" ) {

                  echo "checked";
                }
          } ?> >

            女:<input type="radio" name="sex" value="女" <?php if ( !empty($_SESSION["sex"]) ) {

                 if ( ($_SESSION["sex"]) == "女" ) {

                  echo "checked";
                }
          } ?> > <br><br>

            free:<textarea name = "txt"> <?php if ( !empty($_SESSION["free"]) ) {

                  echo $_SESSION["free"];
            } ?> </textarea> <br>

              <input type="submit" name="submit" value="go">

         </form>

 </body>
</html>
