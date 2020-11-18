<?php
//サブミットボタンをクリックしたときにフォームに入力された値を受け取る部分。
//　''で囲まれたusernameとpasswordはフォームの中のnameと一致している。
//submitボタンのnameが「signup」になっている。
if(isset($_POST['signup'])) {
	$mailaddress = $_POST['mailaddress'];
  $password = $_POST['password'];
  //データベース接続の処理
  //headerで新規登録した後に、index.phpに画面遷移する。
  try{
    $dsn = 'mysql:dbname=kakemachi;host=localhost';
    $user = 'root';
    $password = 'Ha09041208!';
    $db = new PDO($dsn,$user,$password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'insert into logininfo (id,mailaddress,password) values(?,?,?)';
    $stmt = $db->prepare($sql);
    $id = NULL;
    $flg = $stmt->execute(array($id,$mailaddress,$password));
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