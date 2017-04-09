<!DOCTYPE html>
<meta charset="utf-8" lang="ja" />
<html>
<head>
    <title>掲示板</title>
</head>
<body>
<h1>掲示板</h1>

<form action="sql.php" method="post">
    <?php if (count($errors) > 0):?>
        <ul class = "error_list">
            <?php foreach ($errors as $error):?>
                <li>
                    <?php echo mysqli_real_escape_string($link, $error);?>
                </li>
            <?php endforeach;?>
        </ul>
    <?php endif;?>
    <label for="searchTerm"></label>
    名前：<input id = "searchTerm" type="text" name="name"  size="30" maxlength="20"/><br />
    ひとこと：<input id = "searchTerm" type="text" name="comment" size="30" maxlength="20" /><br />
    <input type="submit" name="submit" value="送信" />
</form>

<?php
//投稿の結果
?>

<?php if (count($posts) > 0):?>
    <ul>
        <?php foreach ($posts as $post): ?>
            <li>
                <?php echo mysqli_real_escape_string($link, $post['name']);?>:
                <?php echo mysqli_real_escape_string($link, $post['comment']);?>
                -  <?php echo mysqli_real_escape_string($link, $post['created_at']);?>
            </li>
        <?php endforeach;?>
    </ul>
<?php endif;?>

<?php

mysqli_close($link);
?>
</body>
</html>
