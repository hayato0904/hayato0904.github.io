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

<?php

if (isset($_POST['experience'])){
    //echo $_POST['experience'];
    $experience=$_POST['experience'];
    //echo $experience;
    $C=0;
    $D=0;
    if($experience==0){
        $C=$C+0;
        $D=$D+1;
    }
    if($experience==1){
        $C=$C+1;
        $D=$D+2;
    }
    if($experience==2){
        $C=$C+2;
        $D=$D+3;
    }
    if($experience==3){
        $C=$C+3;
        $D=$D+4;
    }
    if($experience==4){
        $C=$C+4;
        $D=$D+5;
    }
    if($experience==5){
        $C=$C+5;
        $D=$D+101;
    }
}else{
    $C=-100;
    $D=100;
}

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

echo $_POST['language'];
echo gettype($language);

if (isset($_POST['language'])){
    $language=$_POST['language'];
    echo $language;
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
        $E='language_java';
    }
    if($language==6){
        $E='language_go';
    }
    if($language==7){
        $E='language_sql';
    }
    if($language==8){
        $E='language_php';
    }
    if($language==9){
        $E='language_c';
    }
    if($language==10){
        $E='language_c++';
    }
}else{
    $E=0;
} ?>



​
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="/css/search.css">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>ユーザー詳細情報画面</title>
    </head>
    <body>
        <h1>テスト用表示画面</h1>
        <?php foreach($aryList as $aryList){
            if($aryList['work_experience']>=$C&&$aryList['work_experience']<$D){
                if($aryList['my_age']>=$A&&$aryList['my_age']<=$B){
                    if($E==0){
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
                    </br>
                    </table>
                    <?php }
                    }
                    }
                    } ?>
                    <div class="form-item">■ 名前</div>
                    <?php echo $_POST['name']; ?>
                </body>
                </html>