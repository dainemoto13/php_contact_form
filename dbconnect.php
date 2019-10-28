<!-- DBへ接続ファイル -->

<?php

$host = "localhost";
$dbname = "contact_form";
$charset = "utf8mb4";
$user = 'root';
$password='';
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
// PDO PHPでデータベースを操作するクラス
$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

//例外の可能性の処理try 例外が発生した場合の処理catch
try {
  $dbh = new PDO($dsn, $user, $password, $options);
}catch(\PDOException $e) {
  throw new \PDOException($e->getMessage(), (int)$e->getCode());
}