<?php
function getDbHandle()
{
    $dsn = "mysql:host=mysql10093.xserver.jp;dbname=xs616244_kakemachi;charset=utf8";
    $user = "xs616244_hayato";
    $password = "Ha09041208";
    return new PDO($dsn,$user,$password);
}
// newとはプログラムはメモリの中でしか動かない。newとやるとプログラムをメモリを当てはめる。
// returnはnewを返している。番地を返している。
//
//function 関数名( ){
     //処理
//}
//関数でまとめるときは、functionを使って次のように定義することができる。
//getDbHandleの中に{}のなかの処理を入れている。これは他のファイルで使いまわし出来るようにdatabase.phpに入れている。
//関数とは値を演算したり条件分で判断したりデータを登録したりなど特定の動作をまとめて入れておく箱のようなイメージ。
//PHPでは関数は大きく分けて2つあります。
// ・組み込み関数
// PHPで提供している関数（配列を結合するarray_merge関数や文字列検索を行うstrposなど）。
// ・ユーザー定義関数
// ユーザーが独自に処理を記述した関数。
// この記事では主に後者のユーザー定義関数について解説していきます。
// ユーザー定義関数はfunctionを指定することで、使用することができます。