<?php
  require_once('function.php');
  require_once('dbconnect.php');

  $nickname = '';
  $results = '';
  if(isset($_GET['nickname'])) {
    $nickname = $_GET['nickname'];

    // SELECT テーブルからレコードを取得する場合
    // LIKE "%" カラムの値に検索文字を含むレコードを表示
    $stmt = $dbh->prepare('SELECT * FROM surveys WHERE nickname like ?');
    //execute()?置き換えたい値をおく
    $stmt->execute(["%$nickname%"]);
    // 全ての結果行を含む配列を返す
    $results = $stmt->fetchAll();
  }


  // var_dump($results);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="/../php_contact_form5/css/sample.css">
</head>
<body>
<form action="" method="GET">
  <input type="text" name="nickname">
  <!-- 送信ボタンとして使いたくなかったらtype="button"にしておく -->
  <button >検索</button>
</form>

<!-- //画面に表示する -->
<!-- is_array 変数が配列かどうかを検索する -->
<?php if(is_array($results)):?>
<!-- count — 変数に含まれるすべての要素、 あるいはオブジェクトに含まれる何かの数を数える -->
  <?php if(count($results) !== 0):?>

    <?php foreach ($results as $result): ?>
    <div class="label">
    <span class="small-label">
    <?php echo h($result['nickname']);?>
    </span>
    <img src="<?php echo "/php_contact_form5/img/".$result['id'].".jpg";?>">
    <p><?php echo  "投稿日:" . h($result['date']);?></p>
    <p><?php echo h($result['content']);?></p>
    </div>
  <?php endforeach; ?>

  <?php else:?>
  <p>「<?php echo $nickname?>」の検索結果はありませんでした。</p>
  <?php endif;?>

<?php else:?>
  <p>検索してください。</p>
<?php endif;?>

<form method = "POST" action="view.php">
    <input type="hidden" name="nickname" value="<?php echo h($nickname); ?>">
    <input type="hidden" name="date" value="<?php echo h($date); ?>">
    <input type="hidden" name="content" value="<?php echo h($content); ?>">

      <button type="submit">戻る</button>
</form>
</body>
</html>