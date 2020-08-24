<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>MariaDBへの接続テスト</title>
</head>
<body>
<?php
$dsn = 'mysql:dbname=user;host=localhost';
$user = 'root';
$password = 'Ha09041208!';
try{
    $dbh = new PDO($dsn, $user, $password);
    $sql = 'select * from user';
    foreach ($dbh->query($sql) as $row) {
        print($row['id'].',');
        print($row['user_name'].',');
        print($row['place'].',');
        print($row['language_html'].',');
        print($row['language_css'].',');
        print($row['language_javasprict'].',');
        print($row['language_ruby'].',');
        print($row['language_python'].',');
        print($row['language_java'].',');
        print($row['language_go'].',');
        print($row['language_sql'].',');
        print($row['language_c'].',');
        print($row['language_c++'].',');
        print($row['work_experience'].',');
        print($row['my_age'].',');
        print($row['you_hope_age_dont_worry'].',');
        print($row['you_hope_age_10s'].',');
        print($row['you_hope_age_early20s'].',');
        print($row['you_hope_age_late20s'].',');
        print($row['you_hope_age_early30s'].',');
        print($row['you_hope_age_late30s'].',');
        print($row['you_hope_age_40s'].',');
        print($row['target'].',');
        print($row['self_introduction'].',');
        print($row['twitter'].',');
        print('<br />');
    }
}catch (PDOException $e){
    print('Error:'.$e->getMessage());
    die();
}
$dbh = null;
?>