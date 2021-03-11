<?php
include('libs/config.php');
require_once('libs/database.php');
//To Do ログアウトの処理。
//下記1文はもしmailaddressに値がある場合、if文の処理を行うコードである。signup.phpから送信されている。
if (isset($_POST['mailaddress'])) {
  session_start();
  //DB内でPOSTされたメールアドレスを検索する処理。
  try {
    $dbh = getDbHandle();
    $stmt = $dbh->prepare('select * from logininfo where mailaddress = ?');
    // SQLインジェクション対策
    $stmt->execute([$_POST['mailaddress']]); //emailの内容を一行上に送信している。その結果を$rowに詰めている。
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
  } catch (\Exception $e) {
    echo $e->getMessage();
  }
  //mailaddressがDB内に存在しているか確認。$rowはデータベースの情報。
  if (!isset($row['mailaddress'])) {
    echo 'メールアドレスが間違っています。';
    return false;
  }
  //パスワード確認後sessionにメールアドレスを渡す。$_POSTで送信された内容と、$rowでもともとDBにある情報が正しいか確認している。
  if ($_POST['password'] === $row['password']) {
    session_regenerate_id(true); //session_idを新しく生成し、置き換える
    $_SESSION['EMAIL'] = $row['mailaddress'];
    $_SESSION['id'] = $row['id'];
    // $_SESSIONで保存している。それにより他の画面でも確認出来る。おそらく、$rowはデータベースで接続したlogin.phpでしか見れないから。
    $dbh = getDbHandle();
    $stmt = $dbh->prepare("UPDATE logininfo SET login_flg = '1' where id = ?");
    $stmt->execute(array($row['id']));
    //遷移する
    header('Location: /index.php');
    exit;
    echo 'ログインしました';
  } else {
    echo 'パスワードが間違っています。';
    return false;
  }
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <link rel="stylesheet" type="text/css" href="<?=APPLICATION_PATH?>/css/signup.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ログイン画面</title>
</head>

<body>

  <div class="header">
    <div class="header-logo">Kakemachi</div>
  </div>


  <div class="main">
    <h1>新規登録画面</h1>
    <form action="signup1.php" method="POST">
      <h1 style="background-color: #09B944;">ログインするメールアドレス</h1>
      <input type="email" name="mailaddress" placeholder="登録済みのメールアドレス">
      <h1 style="background-color: #09B944;">ログインするパスワード</h1>
      <input type="password" name="password" placeholder="登録済みのパスワード">
      <h1 style="background-color: #09B944;">ログインボタン</h1>
      <p><button type='submit'>ログイン</button></p>
      <!-- <p><button onclick="return confirm('記入された内容を送信します。よろしいでしょうか？')">新規登録</button></p> -->
    </form>
  </div>
</body>

</html>