<?php
include('libs/config.php');
//サブミットボタンをクリックしたときにフォームに入力された値を受け取る部分。
//　''で囲まれたusernameとpasswordはフォームの中のnameと一致している。
//submitボタンのnameが「signup」になっている。
//下記一分はエラーメッセージを初期化している。エラーメッセージは空だと証明している。
$errorMessage = '';
if (isset($_POST['signup'])) {
  $mailaddress = $_POST['mailaddress'];
  $passwords = $_POST['password'];
  $password2 = $_POST["password2"];
  //データベース接続の処理
  //headerで新規登録した後に、index.phpに画面遷移する。
  //strlen関数で中の値の数を数えている。
  //変数の上書を防ぐためにifの後にelse ifを入力している。
  if (strlen($mailaddress) <= 0 || strlen($passwords) <= 0 || strlen($password2) <= 0) {
    $errorMessage = '正しく入力してください。';
  } else if ($passwords != $password2) {
    $errorMessage = '一致しないパスワードを入力しています。';
  } else {
    try {
      $dsn = 'mysql:dbname=kakemachi;host=localhost';
      $user = 'root';
      $password = 'Ha09041208!';
      $db = new PDO($dsn, $user, $password);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = 'insert into logininfo (id,mailaddress,password) values(?,?,?)';
      $stmt = $db->prepare($sql);
      $id = NULL;
      $flg = $stmt->execute(array($id, $mailaddress, $passwords));
      $stmt = null;
      $db = null;
      header('Location: /signup1.php');
      exit;
    } catch (PDOException $e) {
      echo $e->getMessage();
      exit;
    }
  }
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <link rel="stylesheet" type="text/css" href="<?=APPLICATION_PATH?>/css/signup.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>新規登録画面</title>
</head>

<body>
  <div class="ErrorMessage"><?php echo ($errorMessage); ?></div>

  <div class="header">
    <div class="header-logo">Kakemachi</div>
  </div>

  <div class="main">
    <h1>新規登録画面</h1>
    <form action="signup.php" method="POST">
      <h1 style="background-color: #09B944;">新規登録するメールアドレス</h1>
      <input type="email" name="mailaddress" placeholder="新規登録するメールアドレス" value=""><br>
      <h1 style="background-color: #09B944;">新規登録するパスワード</h1>
      <input type="password" name="password" placeholder="新規登録するパスワード" value=""><br>

      <h1 style="background-color: #09B944;">パスワード(確認用)</h1>
      <input type="password" name="password2" placeholder="再度パスワードを入力" value=""><br>

      <h1 style="background-color: #09B944;">新規登録ボタン</h1>
      <input type="submit" name="signup" onclick="return confirm('記入された内容で新規登録します。')" value="新規登録">
      <!-- <p><button onclick="return confirm('記入された内容を送信します。よろしいでしょうか？')">新規登録</button></p> -->
    </form>
  </div>
</body>

</html>