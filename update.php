<?php

try {
    $dbh = new PDO('mysql:dbname=bookmark;charset=utf8;host=localhost','root','root');

    $stmt = $dbh->prepare('UPDATE gs_bm_table SET name = :name, url = :url, category = :category, comment = :comment WHERE id = :id');

    $stmt->execute(array(':name' => $_POST['name'], ':category' => $_POST['category'], ':url' => $_POST['url'], ':comment' => $_POST['comment'], ':id' => $_POST['id']));

    echo "情報を更新しました。";

} catch (Exception $e) {
          echo 'エラーが発生しました。:' . $e->getMessage();
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>更新完了</title>
  </head>

  <body>   
         
  <p>
      <a href="index.php">投稿一覧へ</a>
  </p> 
  <?php
    
?>
  </body>
</html>