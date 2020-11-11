<?php
//To Do ログアウトの処理。
//下記1文はもしmailaddressに値がある場合、if文の処理を行うコードである。signup.phpから送信されている。
if (isset($_POST['mailaddress'])) {
  session_start();
  //DB内でPOSTされたメールアドレスを検索する処理。
  try {
    $dsn = 'mysql:dbname=kakemachi;host=localhost';
    $user = 'root';
    $password = 'Ha09041208!';
    $dbh = new PDO($dsn,$user,$password);
    $stmt = $dbh->prepare('select * from logininfo where mailaddress = ?');
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
    // $_SESSIONで保存している。それにより他の画面でも確認出来る。おそらく、$rowはデータベースで接続したlogin.phpでしか見れないから。
    //遷移する
    echo 'ログインしました';
  } else {
    echo 'パスワードが間違っています。';
    return false;
  }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="/css/profile.css">
        <title>駆け出しエンジニアマッチングサイト</title>
    </head>
    <body>
      <div class ="login"> 
      <!-- form　actionで送信する画面を決めて、method=POSTで受け渡しの処理をしている。 -->
      <!-- login.phpのPOSTにformを渡す。 -->
        <form action='login.php' method='POST'>
              <h1 style="background-color: black;">ログイン</h1>
              <p>ログインするメールアドレス</p>
              <!-- input typeは書式の形。おそらく、emailだとメールの形になっていないとはじかれる。 -->
              <!-- nameはPOSTされる際に入力する値。 -->
              <input type="email" name="mailaddress" placeholder="登録済みのメールアドレス">
              <p>ログインするパスワード</p>
              <input type ="password" name="password" placeholder="登録済みのパスワード">
              <p><button type='submit'>ログイン</button></p>
              <p><button onclick="return confirm('ログアウトします。')">ログアウト</button></p>
        </form>
        </div>
    </body>
</html>  