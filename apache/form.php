<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" charset="utf-8"/>
  <title>form</title>
</head>
<body>
  <?php if (isset($_GET['name']) && strlen($_GET['name']) > 0):?>
    <p>
      <?php
      $comment = $_GET['name'];
      echo htmlspecialchars($comment, ENT_QUOTES, 'utf-8'); ?>さんこんにちは
    </p>
  <?php endif;?>

  <form action="form.php" method="get">
    <p>
      名前を入力してください:
      <input type="text" name="name"  />
      <input type="submit" value="送信" />
    </p>
  </form>

</body>
</html>
