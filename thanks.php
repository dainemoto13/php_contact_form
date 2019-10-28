<?php
  // 途中からのアクセス防止 index.htmlへリダイヤル
  if($_SERVER['REQUEST_METHOD'] === 'GET') {
    header('Location: index.html');
  }

  $nickname = $_POST['nickname'];
  $date = $_POST['date'];
  $content = $_POST['content'];

  require_once('function.php');
  // DB使用コード
  require_once('dbconnect.php');
  //prepare()実行したいSQL文を記述 ???←変更
  $stmt = $dbh->prepare('INSERT INTO surveys (nickname, date,  content)VALUES(?,?,?)');
  //execute()???置き換えたい値をおく
  $stmt->execute([$nickname,$date,$content]);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>送信完了</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/customstyle.css">
</head>
<body class = bg-warning>
  <div class = "center">
  <h1>コメントありがとうございました！</h1>
  <h2>これからもコメントお願いします！</h2>
  <p><?php echo $nickname; ?></p>
  <p><?php echo $date; ?></p>
  <p><?php echo $content; ?></p>
  <form method = "POST" action="view.php">
    <input type="hidden" name="nickname" value="<?php echo "ニックネーム" . h($nickname); ?>">
    <input type="hidden" name="date" value="<?php echo  "投稿日:"  . h($date); ?>">
    <input type="hidden" name="content" value="<?php echo 'MCU映画コメント:' . h($content); ?>">

    <?php if ($nickname != '' && $date !='' && $content !=''):?>
      <button type="submit">みんなの投稿を見てみよう！！</button>
    <?php endif; ?>
    </div>
  </form>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>