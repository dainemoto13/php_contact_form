<?php
    require_once('function.php');
    require_once('dbconnect.php');

    $stmt = $dbh->prepare('SELECT * FROM surveys ORDER BY id DESC');
    $stmt->execute();
    $results = $stmt->fetchAll();
    // var_dump($results);

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>一覧</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="/../php_contact_form5/css/sample.css">
</head>
<body>
<div class = i>
  <h1 class = "center">MCU大好きみんなのコメント</h1>
  <form method = "POST" action="search.php">
    <input type="hidden" name="nickname" value="<?php echo h($nickname); ?>">
    <input type="hidden" name="date" value="<?php echo h($date); ?>">
    <input type="hidden" name="content" value="<?php echo h($content); ?>">
    <button type="submit">MCU大好き仲間の投稿を探してみよう！→</button>
  </form>
</div>
  <div class="label">
</div>
  <div class="contents">
  <?php
  foreach($results as $result):?>
  <div class="label">
    <span class="small-label">
    <?php echo h($result['nickname']);?>
    </span>
    <img src="<?php echo "/php_contact_form5/img/".$result['id'].".jpg";?>">
    <p><?php echo "投稿日:" . h($result['date']);?></p>
    <p><?php echo h($result['content']);?></p>
    </div>
  <?php endforeach; ?>
  </div>
    <button type="button" onclick="history.back()">戻る</button>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>