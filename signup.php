<?php
//サブミットボタンをクリックしたときにフォームに入力された値を受け取る部分。
//　''で囲まれたusernameとpasswordはフォームの中のnameと一致している。
if(isset($_POST['signin'])) {
	$username = $_POST['username'];
  $password = $_POST['password'];
  try{
    $db = new PDO('mysql:host=localhost; dbname=login'); // 切り取った　，'ユーザー名','パスワード'
    $sql = 'insert into login table(username,password) values(?,?)';
    $stmt = $db->prepare($sql);
    $stmt->execute(array($username,$password));
    $stmt = null;
    $db = null;
    header('Location: http://localhost/　　/');
    exit;
  }catch (PDOException $e){
    echo $e->getMessage();
    exit;
  }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>新規登録画面</title>
</head>
<body>
	<h1>新規登録画面</h1>
		<form action="" method="POST">
			UserName<input type="text" name="username" value=""><br>
			Password<input type="password" name="password" value=""><br>
			<input type="submit" name="signup" value="新規登録">
    </form>
</body>
</html>