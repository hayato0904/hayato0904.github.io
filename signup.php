<?php
//サブミットボタンをクリックしたときにフォームに入力された値を受け取る部分。
//　''で囲まれたusernameとpasswordはフォームの中のnameと一致している。
if(isset($_POST['signup'])) {
	$mailaddress = $_POST['mailaddress'];
  $password = $_POST['password'];
  try{
    $dsn = 'mysql:dbname=kakemachi;host=localhost';
    $user = 'root';
    $password = 'Ha09041208!';
    $db = new PDO($dsn,$user,$password);
    $sql = 'insert into logininfo (mailaddress,password) values(?,?)';
    $stmt = $db->prepare($sql);
    $stmt->execute(array($mailaddress,$password));
    $stmt = null;
    $db = null;
    header('Location: http://localhost/index.php');
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
		<form action="signup.php" method="POST"> 
			mailaddress<input type="email" name="mailaddress" value=""><br>
			Password<input type="password" name="password" value=""><br>
			<input type="submit" name="signup" value="新規登録">
    </form>
</body>
</html>