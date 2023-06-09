<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <link rel='stylesheet' href='style.css' />
    <title>全データ表示（カンマ区切り）</title>
  </head>
  <body>
<table border=“1”>
<tr>
<th>科目名</th>
<th>教科書名</th>
<th>出版社</th>
<th>値段</th>
</tr>
<?php
require '_database_conf.php';                                                              # 接続
$sql = 'SELECT * FROM kyouzai';                           # SQL文                                   # 準備
$prepare->execute();   
$prepare = $db->prepare($sql);                                                   # 実行
$result = $prepare->fetchAll(PDO::FETCH_ASSOC); # 結果の取得

foreach ($result as $row) {
  $科目名 = h($row['科目名']);
  $教科書名 = h($row['教科書名']);
  $出版社 = h($row['出版社']);
  $値段 = h($row['値段']);
  echo "{$科目名}, {$教科書}, {$出版社}, {$値段}<br/>";
}

?>
</table>
  </body>
</html>
