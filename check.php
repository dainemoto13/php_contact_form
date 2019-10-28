<?php
  // 途中からのアクセス防止 dindex.htmlへリダイヤル
  if($_SERVER['REQUEST_METHOD'] === 'GET') {
    header('Location: index.html');
  }
  //
  $nickname = $_POST['nickname'];
  $date = $_POST['date'];
  $content = $_POST['content'];

  if($nickname == '') {
    $nickname_result = 'ニックネームが入力されていません';
  }else{
    $nickname_result = 'ニックネーム' . $nickname . 'さん';
  }

  if($date == '' ) {
    $date_result = '投稿日が入力されていません。';
  }else{
    $date_result = '投稿日:' . $date;
  }

  if($content == '') {
    $content_result = '映画コメントが入力されていません。';
  }else{
    $content_result = 'MCU映画コメント:' . $content;
  }

  // XSSの読み込みファイル
  require_once('function.php');
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>入力内容確認</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/customstyle.css">
</head>
<body class = bg-warning>
  <div class="center">
    <h1>入力コメント確認</h1>
    <!-- echo+h関数でXSSを適用させる -->
    <p><?php echo h($nickname_result); ?></p>
    <p><?php echo h($date_result); ?></p>
    <p><?php echo h($content_result); ?></p>

  <!-- thanks.phpにformで受け渡しをする -->
  <form method = "POST" action="thanks.php">
    <input type="hidden" name="nickname" value="<?php echo h($nickname); ?>">
    <input type="hidden" name="date" value="<?php echo h($date); ?>">
    <input type="hidden" name="content" value="<?php echo h($content); ?>">
    <button type="button" onclick="history.back()">戻る</button>

    <?php if ($nickname != '' && $date !='' && $content !=''):?>
      <button type="submit">OK</button>
    <?php endif; ?>
  </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>