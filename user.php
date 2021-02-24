<?php
// To Do WHERE
//データベース接続
// define('DB_USERNAME', 'xs616244_hayato');
// define('DB_PASSWORD', 'Ha09041208');
// define('DSN', 'mysql:host=mysql10093.xserver.jp; dbname=xs616244_kakemachi; charset=utf8');

//$dsn = 'mysql:host=mysql000.db.sakura.ne.jp;dbname=example_php;charset=utf8';

//下記3行ははデバックしているであろうコード
// if (isset($_POST['experience'])){
//     //echo $_POST['experience'];
//     $experience=$_POST['experience'];
// echo $keyword;
 
$dsn = "mysql:host=mysql10093.xserver.jp;dbname=xs616244_kakemachi;charset=utf8";
$user = "xs616244_hayato";
$password = "Ha09041208";
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
<?php
//　実務経験歴
if (isset($_POST['experience'])){
    //echo $_POST['experience'];
    $experience=$_POST['experience'];
    //echo $experience;
    $C=0;
    $D=0;
    $targetexperiecnce = null;
    if($experience==0){
        $targetexperiecnce = '未経験';
    }
    if($experience==1){
        $targetexperiecnce = '1年目';
    }
    if($experience==2){
        $targetexperiecnce = '2年目';
    }
    if($experience==3){
        $targetexperiecnce = '3年目';
    }
    if($experience==4){
        $targetexperiecnce = '4年目';
    }
    if($experience==5){
        $targetexperiecnce = '5年以上';
    }
}else{
    $C=-100;
    $D=100;
}
//　相手の年齢
if(isset($_POST['check'])){
    //echo $_POST['check'];
    $check=$_POST['check'];
    //echo $check;
    $A=0;
    $B=0;
    if($check==0){
        $A=$A+0;
        $B=$B+100;
    }
    if($check==1){
        $A=$A+10;
        $B=$B+19;
    }
    if($check==2){
        $A=$A+20;
        $B=$B+25;
    }
    if($check==3){
        $A=$A+26;
        $B=$B+29;
    }
    if($check==4){
        $A=$A+30;
        $B=$B+35;
    }
    if($check==5){
        $A=$A+36;
        $B=$B+39;
    }
    if($check==6){
        $A=$A+40;
        $B=$B+100;
    }
}else{
    $A=-100;
    $B=100;
}
//　103,104行目を削除
//echo $_POST['language'];
//echo gettype($_POST['language']);
if (isset($_POST['language'])){
    $language=$_POST['language'];
    //echo $language;
    if($language==0){
        $E='language_html';
    }
    if($language==1){
        $E='language_css';
    }
    if($language==2){
        $E='language_javasprict';
    }
    if($language==3){
        $E='language_ruby';
    }
    if($language==4){
        $E='language_python';
    }
    if($language==5){
        $E='language_Java';
    }
    if($language==6){
        $E='language_Go';
    }
    if($language==7){
        $E='language_SQL';
    }
    if($language==8){
        $E='language_php';
    }
    if($language==9){
        $E='language_C';
    }
    if($language==10){
        $E='language_C++';
    }
    // echo $E;
}else{
    $E=0;
} ?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="/css/search.css">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>ユーザー詳細情報画面</title>
    </head>
    <body>
    <h1>ユーザー詳細情報画面</h1>
    <?php foreach($aryList as $item){
        
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

        if($result){
            // if else($item[$E == 0]){}
            // echo 'htmlは表示されています。';
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
                     <?php echo htmlspecialchars($item['language_Java'].' ',ENT_QUOTES,'UTF-8'); ?>
                     <?php echo htmlspecialchars($item['language_Go'].' ',ENT_QUOTES,'UTF-8'); ?>
                     <?php echo htmlspecialchars($item['language_SQL'].' ',ENT_QUOTES,'UTF-8'); ?>
                     <?php echo htmlspecialchars($item['language_C'].' ',ENT_QUOTES,'UTF-8'); ?>
                     <?php echo htmlspecialchars($item['language_C++'].' ',ENT_QUOTES,'UTF-8'); ?>
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
        ?> 
    </body>
    </html>