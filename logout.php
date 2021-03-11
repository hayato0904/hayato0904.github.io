<?php
include('libs/config.php');
//ToDo リンクではなく、ボタン発火でログアウトするようにする。
require_once('libs/database.php');
//DBに接続している処理。
require_once('libs/functions.php');
session_start();
// SETTIONをスタートしている。
$id = $_SESSION['id'];
$dbh = getDbHandle();
//関数を持ってきている。
$stmt = $dbh->prepare("UPDATE logininfo SET login_flg = '0' where id = ?");
//logininfoテーブルのlogin_flgカラムの値を0にしている。ボタンを押すとき。
$stmt->execute(array($id));
unset($_SESSION['id']);
unset($_SESSION['EMAIL']);
redirect('index.php');
// <!-- 8行目　executeについて調べる。　なぜarrayを使うのかはわからなかった。
// 9行目　unsetについて調べる。　SETTION　ID，EMAILについて調べる。 -->
// <!-- 7行目　prepareについても調べる。 -->
//phpの途次タグの後に文字列があるとhtmlのゴミデータとして文字化けの元となったりする。
