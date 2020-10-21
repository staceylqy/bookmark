<?php

try {

    $dbh = new PDO('mysql:dbname=bookmark;charset=utf8;host=localhost','root','root');

    $stmt = $dbh->prepare('SELECT * FROM gs_bm_table WHERE id = :id');

    $stmt->execute(array(':id' => $_GET["id"]));

    $result = 0;

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

} catch (Exception $e) {
          echo 'エラーが発生しました。:' . $e->getMessage();
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>編集</title>
    <style>div{padding:10px; }</style>
    </head>
<body>
    <div class ="title" style="background-color: #463333; height:80px;margin-bottom:20px;margin-left:10px;color:white;">
        <h1 class="home_title">書類の管理画面</h1>
    </div>

    <div class="contact-form">
        <h2>編集</h2>
        <form action="update.php" method="post" style="border:1px solid #463333;width:23%;margin-bottom:20px;padding-left:10px;padding-bottom:10px;">
                <input type="hidden" name="id" value="<?php if (!empty($result['id'])) echo(htmlspecialchars($result['id'], ENT_QUOTES, 'UTF-8'));?>">
            <p>
                <label>書籍名：</label>
                <input type="text" name="name" value="<?php if (!empty($result['name'])) echo(htmlspecialchars($result['name'], ENT_QUOTES, 'UTF-8'));?>">
            </p>
            <p>
                <label>書籍分類:</label>
                <select name = "category"　value="<?php if (!empty($result['category'])) echo(htmlspecialchars($result['category'], ENT_QUOTES, 'UTF-8'));?>" >
                <?php 
                $types = array('文学', '科学', '漫画', '語学', '仕事', 'その他');
                ?>
                <option value = '未選択'>選択してください</option>
                <?php
                foreach($types as $type){
                    echo "<option value='$type'>$type</option>";
                }
                ?>
                </select>

            </p>
            <p>
                <label>書籍URL：</label>
                <input type="text" name="url" value="<?php if (!empty($result['url'])) echo(htmlspecialchars($result['url'], ENT_QUOTES, 'UTF-8'));?>">
            </p>
            
            <p>
                <label>書籍コメント:</label>
                <input type="text" name="comment" value="<?php if (!empty($result['comment'])) echo(htmlspecialchars($result['comment'], ENT_QUOTES, 'UTF-8'));?>">
            </p>
            <input type="submit" value="編集する" style="border:1px solid #463333;background-color: #835858; color:white;cursor:pointer;">

        </form>
    </div>
        <a href="index.php">データ一覧へ</a>
</body>
</html>