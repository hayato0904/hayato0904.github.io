<?php
 
//データベース接続
$dsn = 'mysql:dbname=user;host=localhost';
$user = 'root';
$password = 'Ha09041208!';
$dbh = new PDO($dsn,$user,$password);
 
$sql = "SELECT * FROM user";
 
$result = $dbh -> query($sql);
 
//クエリー失敗
if(!$result) {
	echo $dbh->error;
	exit();
}
 
//レコード件数
$row_cnt = $result->rowCount();
 
///連想配列で取得
$sth = $dbh -> query($sql);
$aryList = $sth -> fetchAll(PDO::FETCH_ASSOC);
?>
​
​
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="/css/search.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>ユーザー詳細情報画面</title>
  </head>
  <body>
    <h1>テスト用表示画面</h1>
    <?php 
    $food = $_POST['food'];
    ?>
    <?php 
    foreach($aryList as $aryList){
    ?> 
    <table border="1" width="80%" bordercolor="#green" bgcolor="#f5f5f5">
        <tr bgcolor="deepskyblue">
         <td>ユーザ名</td>
        </tr>
        <tr>
         <td><?php echo htmlspecialchars($aryList['user_name'],ENT_QUOTES,'UTF-8'); ?></td>
        </tr>
        <tr bgcolor="deepskyblue">
            <td>希望する活動場所</td>
        </tr>
        <tr>
            <td><?php echo htmlspecialchars($aryList['place'],ENT_QUOTES,'UTF-8'); ?></td>  
        </tr> 
        <tr bgcolor="deepskyblue">
            <td>使用できるプログラミング言語</td>
        </tr>
        <tr>
            <td>
            <?php echo htmlspecialchars($aryList['language_html'].' ',ENT_QUOTES,'UTF-8'); ?>
            <?php echo htmlspecialchars($aryList['language_css'].' ',ENT_QUOTES,'UTF-8'); ?>
            <?php echo htmlspecialchars($aryList['language_php'].' ',ENT_QUOTES,'UTF-8'); ?>
            <?php echo htmlspecialchars($aryList['language_javasprict'].' ',ENT_QUOTES,'UTF-8'); ?>
            <?php echo htmlspecialchars($aryList['language_ruby'].' ',ENT_QUOTES,'UTF-8'); ?>
            <?php echo htmlspecialchars($aryList['language_python'].' ',ENT_QUOTES,'UTF-8'); ?>
            <?php echo htmlspecialchars($aryList['language_java'].' ',ENT_QUOTES,'UTF-8'); ?>
            <?php echo htmlspecialchars($aryList['language_go'].' ',ENT_QUOTES,'UTF-8'); ?>
            <?php echo htmlspecialchars($aryList['language_sql'].' ',ENT_QUOTES,'UTF-8'); ?>
            <?php echo htmlspecialchars($aryList['language_c'].' ',ENT_QUOTES,'UTF-8'); ?>
            <?php echo htmlspecialchars($aryList['language_c++'].' ',ENT_QUOTES,'UTF-8'); ?>
            </td>
        </tr> 
        <tr bgcolor="deepskyblue">
            <td>実務経験歴</td>
        </tr>
        <tr>
            <td><?php echo htmlspecialchars($aryList['work_experience'],ENT_QUOTES,'UTF-8'); ?></td>  
        </tr> 
        <tr bgcolor="deepskyblue">
            <td>自分の年齢</td>
        </tr>
        <tr>
            <td><?php echo htmlspecialchars($aryList['my_age'],ENT_QUOTES,'UTF-8'); ?></td>  
        </tr> 
        <tr bgcolor="deepskyblue">
            <td>相手の希望年齢</td>
        </tr>
        <tr>
            <td>
                <?php echo htmlspecialchars($aryList['you_hope_age_dont_worry'].' ',ENT_QUOTES,'UTF-8'); ?>
                <?php echo htmlspecialchars($aryList['you_hope_age_10s'].' ',ENT_QUOTES,'UTF-8'); ?>
                <?php echo htmlspecialchars($aryList['you_hope_age_early20s'].' ',ENT_QUOTES,'UTF-8'); ?>
                <?php echo htmlspecialchars($aryList['you_hope_age_late20s'].' ',ENT_QUOTES,'UTF-8'); ?>
                <?php echo htmlspecialchars($aryList['you_hope_age_early30s'].' ',ENT_QUOTES,'UTF-8'); ?>
                <?php echo htmlspecialchars($aryList['you_hope_age_late30s'].' ',ENT_QUOTES,'UTF-8'); ?>
                <?php echo htmlspecialchars($aryList['you_hope_age_40s'].' ',ENT_QUOTES,'UTF-8'); ?>
            </td>  
        </tr> 
        <tr bgcolor="deepskyblue">
            <td>目標</td>
        </tr>
        <tr>
            <td><?php echo htmlspecialchars($aryList['target'],ENT_QUOTES,'UTF-8'); ?></td>  
        </tr>
        <tr bgcolor="deepskyblue">
            <td>自己紹介</td>
        </tr>
        <tr>
            <td><?php echo htmlspecialchars($aryList['self_introduction'],ENT_QUOTES,'UTF-8'); ?></td>  
        </tr>
        <tr bgcolor="deepskyblue">
            <td>Twitter</td>
        </tr>
        <tr>
            <td><?php echo htmlspecialchars($aryList['twitter'],ENT_QUOTES,'UTF-8'); ?></td>  
        </tr>
    <br>
    </table>
    <?php 
    } 
    ?>
    
    
</table>
  </body>
</html>
