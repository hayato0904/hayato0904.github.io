<?php
//データベース接続
$dsn = 'mysql:dbname=kakemachi;host=localhost';
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
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="/css/search.css">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>ユーザー詳細情報画面</title>
    </head>
    <body>
    <h1>テスト用表示画面</h1>
    <?php foreach($aryList as $item){
        //検索対象：webエンジニア
        //山田太郎
        //自己紹介：私はWebエンジニアです

        if($item['work_experience']>=$C&&$item['work_experience']<$D){  
            if($item['my_age']>=$A&&$item['my_age']<=$B){                    
                if($E==0)
    //    echo htmlspecialchars($item['work_experience'],ENT_QUOTES,'UTF-8') == '3年'; 
    //    echo htmlspecialchars($item['work_experience'],ENT_QUOTES,'UTF-8'); 

    //    htmlspecialchars($item['work_experience'],ENT_QUOTES,'UTF-8') // 3年

        // 一行下のコメントの変数$itemでデータベースからlanguage_htmlから取得している。
        // echo $item['language_html'];       
        // langauge_htmlの値がある場合の人のみ取得する。　そのため、下記はnullじゃないものを取得している。
        $result = true;        
        if($E !== 0){
            $result = $item[$E] != null; // エラー文 Notice: Undefined index: language_java in C:\xampp\htdocs\index.php on line 154
        }

        $keywordResult = true;
        if(strpos($item['target'],$keyword) === false){　//含まれていない場合、if文の中を実行する。
            //自己紹介のなかに$keywordが含まれてない場合
            $keywordResult = false;
        }
        if($result && $keywordResult){ //左で表示するかどうか決めている。
            ?>
                        <table border="1" width="80%" bordercolor="#green" bgcolor="#F5F5F5">
             <tr bgcolor="deepskyblue">
                 <td>ユーザ名</td>
             </tr>
             <tr>
                 <td><?php echo htmlspecialchars($item['user_name'],ENT_QUOTES,'UTF-8'); ?></td>
             </tr>
             <tr bgcolor="deepskyblue">
                 <td>希望する活動場所</td>
             </tr>
             <tr>
                 <td><?php echo htmlspecialchars($item['place'],ENT_QUOTES,'UTF-8'); ?></td>  
             </tr> 
             <tr bgcolor="deepskyblue">
                 <td>使用できるプログラミング言語</td>
             </tr>
             <tr>
                 <td>
                     <?php echo htmlspecialchars($item['language_html'].' ',ENT_QUOTES,'UTF-8'); ?>
                     <?php echo htmlspecialchars($item['language_css'].' ',ENT_QUOTES,'UTF-8'); ?>
                     <?php echo htmlspecialchars($item['language_php'].' ',ENT_QUOTES,'UTF-8'); ?>
                     <?php echo htmlspecialchars($item['language_javasprict'].' ',ENT_QUOTES,'UTF-8'); ?>
                     <?php echo htmlspecialchars($item['language_ruby'].' ',ENT_QUOTES,'UTF-8'); ?>
                     <?php echo htmlspecialchars($item['language_python'].' ',ENT_QUOTES,'UTF-8'); ?>
                     <!-- <?php echo htmlspecialchars($item['language_java'].' ',ENT_QUOTES,'UTF-8'); ?>
                     <?php echo htmlspecialchars($item['language_go'].' ',ENT_QUOTES,'UTF-8'); ?>
                     <?php echo htmlspecialchars($item['language_sql'].' ',ENT_QUOTES,'UTF-8'); ?>
                     <?php echo htmlspecialchars($item['language_c'].' ',ENT_QUOTES,'UTF-8'); ?>
                     <?php echo htmlspecialchars($item['language_c++'].' ',ENT_QUOTES,'UTF-8'); ?> -->
                 </td>
             </tr> 
             <tr bgcolor="deepskyblue">
                 <td>実務経験歴</td>
             </tr>
             <tr>
                 <td><?php echo htmlspecialchars($item['work_experience'],ENT_QUOTES,'UTF-8'); ?></td>  
             </tr> 
             <tr bgcolor="deepskyblue">
                 <td>自分の年齢</td>
             </tr>
             <tr>
                 <td><?php echo htmlspecialchars($item['my_age'],ENT_QUOTES,'UTF-8'); ?></td>  
             </tr> 
             <tr bgcolor="deepskyblue">
                 <td>相手の希望年齢</td>
             </tr>
             <tr>
                 <td>
                     <?php echo htmlspecialchars($item['you_hope_age_dont_worry'].' ',ENT_QUOTES,'UTF-8'); ?>
                     <?php echo htmlspecialchars($item['you_hope_age_10s'].' ',ENT_QUOTES,'UTF-8'); ?>
                     <?php echo htmlspecialchars($item['you_hope_age_early20s'].' ',ENT_QUOTES,'UTF-8'); ?>
                     <?php echo htmlspecialchars($item['you_hope_age_late20s'].' ',ENT_QUOTES,'UTF-8'); ?>
                     <?php echo htmlspecialchars($item['you_hope_age_early30s'].' ',ENT_QUOTES,'UTF-8'); ?>
                     <?php echo htmlspecialchars($item['you_hope_age_late30s'].' ',ENT_QUOTES,'UTF-8'); ?>
                     <?php echo htmlspecialchars($item['you_hope_age_40s'].' ',ENT_QUOTES,'UTF-8'); ?>
                 </td>  
             </tr> 
             <tr bgcolor="deepskyblue">
                 <td>目標</td>
             </tr>
             <tr>
                 <td><?php echo htmlspecialchars($item['target'],ENT_QUOTES,'UTF-8'); ?></td>  
             </tr>
             <tr bgcolor="deepskyblue">
                 <td>自己紹介</td>
             </tr>
             <tr>
                 <td><?php echo htmlspecialchars($item['self_introduction'],ENT_QUOTES,'UTF-8'); ?></td>  
             </tr>
             <tr bgcolor="deepskyblue">
                 <td>Twitter</td>
             </tr>
             <tr>
                 <td><?php echo htmlspecialchars($item['twitter'],ENT_QUOTES,'UTF-8'); ?></td>  
             </tr>
             <br>
             </br>
             </table>
             <?php } 
            //  else{ echo "htmlではない";}
            //  //　下の行は、langauge_cssを取得するために書く。htmlのelse文の後に書くことにより、if文を分けられる。
            //  if($item['language_css'] != null){
            //     echo 'cssは取得できています。';}
            //       //　下記はlangauge_javasprictの取得を行う。
            //       if($item['language_javasprict'] != null){
            //         echo 'cssは取得できています。';}
        }
    }
}      
?> 
    <div class="form-item">■ 名前</div>
    <?php echo $_POST['name']; ?>
    </body>
    </html>