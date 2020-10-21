<?php

try {
    $dbh = new PDO('mysql:dbname=bookmark;charset=utf8;host=localhost','root','root');

    $stmt = $dbh->prepare('DELETE FROM gs_bm_table WHERE id = :id');

    $stmt->execute(array(':id' => $_GET["id"]));

    echo "削除しました。";

} catch (Exception $e) {
          echo 'エラーが発生しました。:' . $e->getMessage();
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>削除完了</title>
  
  </head>
  <body>   
  
    </head>
     
  <p>
      <a href="index.php">投稿一覧へ</a>
  </p> 
  </body>
</html>