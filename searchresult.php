<?php
include('libs/config.php');
// To Do WHEREを使って動かしたい
// To Do ラジオボタンで単一選択する。　→　チェックボックスで複数選択する。
//データベース接続
$dsn = 'mysql:dbname=kakemachi;host=localhost';
$user = 'root';
$password = 'Ha09041208!';
$dbh = new PDO($dsn, $user, $password);
$sql = "SELECT * FROM user WHERE 1 = 1";
$place = "";
$language = "";

if ($_POST['place'] === '未選択') {
    $sql = "SELECT * FROM user WHERE 1 = 1";
} else if ($_POST['place']) {
    $sql .= " AND place = '" . $_POST['place'] . "'";/*ここは"SELECT * FROM user WHERE 1 = 1"に続く、はずだがWHERE 1 = 1がなくなってuserのあとに「;」がついている。
    「;」がつくと無条件になる。*/
}

if (isset($_POST['language'])) {
    $list =
        [
            '0' => 'html',
            '1' => 'css',
            '2' => 'javascript',
            '3' => 'ruby',
            '4' => 'python',
            '5' => 'Java',
            '6' => 'Go',
            '7' => 'SQL',
            '8' => 'PHP',
            '9' => 'C',
            '10' => 'C++',
        ];
    //チェックをしたものが配列として入ってくる。
    $langs = $_POST['language'];
    foreach ($langs as $lang) {
        $sql .= " AND language_" . $list[$lang] . " = '" . $list[$lang] . "'";
    }
}
//実務経験歴
if (isset($_POST['experience'])) {
    $list =
        [
            '0' => '未経験',
            '1' => '1年',
            '2' => '2年',
            '3' => '3年',
            '4' => '4年',
            '5' => '5年以上',
        ];
    $experiences = $_POST['experience'];
    foreach ($experiences as $experience) {
        $sql1 .= " work_experience = '" . $list[$experience] . "'";
        $sql .= " AND work_experience = '" . $list[$experience] . "' ";
    }
}
//相手の年齢
if (isset($_POST['age'])) {
    $list =
        [
            '0' => 'こだわらない',
            '1' => '10代',
            '2' => '20代前半',
            '3' => '20代後半',
            '4' => '30代前半',
            '5' => '30代後半',
            '6' => '40代以上',
        ];
    //チェックをしたものが配列として入ってくる。
    $ages = $_POST['age'];
    foreach ($ages as $age) {
        $sql .= " AND hopeage_" . $list[$age] . " = '" . $list[$age] . "'";
    }
}

$keyword = null;
if (isset($_POST['text1'])) {
    // echo $_POST['text1'];
    $keyword = $_POST['text1'];
    // echo $keyword;
}

echo $sql;
$sth = $dbh->query($sql);
$aryList = $sth->fetchAll(PDO::FETCH_ASSOC);
?>

<html>

<head>
</head>

<body>

    <h1>検索結果</h1>
    <?php foreach ($aryList as $item) : ?>

        <table border="1" width="80%" bordercolor="#green" bgcolor="#F5F5F5">
            <tr bgcolor="deepskyblue">
                <td>プロフィール画像</td>
            </tr>
            <tr>
                <td> <?php if (!empty($clean['attachment_file'])) : ?>
                        <div class="element_wrap">
                            <label>画像ファイルの添付</label>
                            <p><img src="<?php echo FILE_DIR . $clean['attachment_file']; ?>"></p>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($clean['attachment_file'])) : ?>
                        <input type="hidden" name="attachment_file" value="<?php echo $clean['attachment_file']; ?>">
                    <?php endif; ?>
                </td>
            </tr>
            <tr bgcolor="deepskyblue">
                <td>ユーザ名</td>
            </tr>
            <tr>
                <td><?php echo htmlspecialchars($item['user_name'], ENT_QUOTES, 'UTF-8'); ?></td>
            </tr>
            <tr bgcolor="deepskyblue">
                <td>希望する活動場所</td>
            </tr>
            <tr>
                <td><?php echo htmlspecialchars($item['place'], ENT_QUOTES, 'UTF-8'); ?></td>
            </tr>
            <tr bgcolor="deepskyblue">
                <td>使用できるプログラミング言語</td>
            </tr>
            <tr>
                <td>
                    <?php echo htmlspecialchars($item['language_html'] . ' ', ENT_QUOTES, 'UTF-8'); ?>
                    <?php echo htmlspecialchars($item['language_css'] . ' ', ENT_QUOTES, 'UTF-8'); ?>
                    <?php echo htmlspecialchars($item['language_php'] . ' ', ENT_QUOTES, 'UTF-8'); ?>
                    <?php echo htmlspecialchars($item['language_javascript'] . ' ', ENT_QUOTES, 'UTF-8'); ?>
                    <?php echo htmlspecialchars($item['language_ruby'] . ' ', ENT_QUOTES, 'UTF-8'); ?>
                    <?php echo htmlspecialchars($item['language_python'] . ' ', ENT_QUOTES, 'UTF-8'); ?>
                    <?php echo htmlspecialchars($item['language_Java'] . ' ', ENT_QUOTES, 'UTF-8'); ?>
                    <?php echo htmlspecialchars($item['language_Go'] . ' ', ENT_QUOTES, 'UTF-8'); ?>
                    <?php echo htmlspecialchars($item['language_SQL'] . ' ', ENT_QUOTES, 'UTF-8'); ?>
                    <?php echo htmlspecialchars($item['language_C'] . ' ', ENT_QUOTES, 'UTF-8'); ?>
                    <?php echo htmlspecialchars($item['language_C++'] . ' ', ENT_QUOTES, 'UTF-8'); ?>
                </td>
            </tr>
            <tr bgcolor="deepskyblue">
                <td>実務経験歴</td>
            </tr>
            <tr>
                <td>
                    <?php echo htmlspecialchars($item['work_experience'], ENT_QUOTES, 'UTF-8'); ?>
                </td>
            </tr>
            <tr bgcolor="deepskyblue">
                <td>自分の年齢</td>
            </tr>
            <tr>
                <td>
                    <?php echo htmlspecialchars($item['my_age'], ENT_QUOTES, 'UTF-8'); ?>
                </td>
            </tr>
            <tr bgcolor="deepskyblue">
                <td>相手の希望年齢</td>
            </tr>
            <tr>
                <td>
                    <?php echo htmlspecialchars($item['hopeage_こだわらない'] . ' ', ENT_QUOTES, 'UTF-8'); ?>
                    <?php echo htmlspecialchars($item['hopeage_10代'] . ' ', ENT_QUOTES, 'UTF-8'); ?>
                    <?php echo htmlspecialchars($item['hopeage_20代前半'] . ' ', ENT_QUOTES, 'UTF-8'); ?>
                    <?php echo htmlspecialchars($item['hopeage_20代後半'] . ' ', ENT_QUOTES, 'UTF-8'); ?>
                    <?php echo htmlspecialchars($item['hopeage_30代前半'] . ' ', ENT_QUOTES, 'UTF-8'); ?>
                    <?php echo htmlspecialchars($item['hopeage_30代後半'] . ' ', ENT_QUOTES, 'UTF-8'); ?>
                    <?php echo htmlspecialchars($item['hopeage_40代以上'] . ' ', ENT_QUOTES, 'UTF-8'); ?>
                </td>
            </tr>
            <tr bgcolor="deepskyblue">
                <td>目標</td>
            </tr>
            <tr>
                <td>
                    <?php echo htmlspecialchars($item['target'], ENT_QUOTES, 'UTF-8'); ?>
                </td>
            </tr>
            <tr bgcolor="deepskyblue">
                <td>自己紹介</td>
            </tr>
            <tr>
                <td>
                    <?php echo htmlspecialchars($item['self_introduction'], ENT_QUOTES, 'UTF-8'); ?>
                </td>
            </tr>
            <tr bgcolor="deepskyblue">
                <td>Twitter</td>
            </tr>
            <tr>
                <td>
                    <?php echo htmlspecialchars($item['twitter'], ENT_QUOTES, 'UTF-8'); ?>
                </td>
            </tr>
            <br>
            </br>
        </table>
    <?php endforeach; ?>

    </table>
</body>

</html>

<!-- 
//クエリー失敗
if(!$sth) {
    echo $dbh->error;
    exit();
}
//レコード件数

$row_cnt = $sth->rowCount();
///連想配列で取得
?> -->

<?php
//　実務経験歴
if (isset($_POST['experience'])) {
    //echo $_POST['experience'];
    $experience = $_POST['experience'];
    //echo $experience;
    $C = 0;
    $D = 0;
    if ($experience == 0) {
        $C = $C + 0;
        $D = $D + 1;
    }
    if ($experience == 1) {
        $C = $C + 1;
        $D = $D + 2;
    }
    if ($experience == 2) {
        $C = $C + 2;
        $D = $D + 3;
    }
    if ($experience == 3) {
        $C = $C + 3;
        $D = $D + 4;
    }
    if ($experience == 4) {
        $C = $C + 4;
        $D = $D + 5;
    }
    if ($experience == 5) {
        $C = $C + 5;
        $D = $D + 101;
    }
} else {
    $C = -100;
    $D = 100;
}
//　相手の年齢
if (isset($_POST['check'])) {
    //echo $_POST['check'];
    $check = $_POST['check'];
    //echo $check;
    $A = 0;
    $B = 0;
    if ($check == 0) {
        $A = $A + 0;
        $B = $B + 100;
    }
    if ($check == 1) {
        $A = $A + 10;
        $B = $B + 19;
    }
    if ($check == 2) {
        $A = $A + 20;
        $B = $B + 25;
    }
    if ($check == 3) {
        $A = $A + 26;
        $B = $B + 29;
    }
    if ($check == 4) {
        $A = $A + 30;
        $B = $B + 35;
    }
    if ($check == 5) {
        $A = $A + 36;
        $B = $B + 39;
    }
    if ($check == 6) {
        $A = $A + 40;
        $B = $B + 100;
    }
} else {
    $A = -100;
    $B = 100;
}
//　103,104行目を削除
//echo $_POST['language'];
//echo gettype($_POST['language']);
if (isset($_POST['language'])) {
    $language = $_POST['language'];
    //echo $language;
    if ($language == 0) {
        $E = 'language_html';
    }
    if ($language == 1) {
        $E = 'language_css';
    }
    if ($language == 2) {
        $E = 'language_javasprict';
    }
    if ($language == 3) {
        $E = 'language_ruby';
    }
    if ($language == 4) {
        $E = 'language_python';
    }
    if ($language == 5) {
        $E = 'language_Java';
    }
    if ($language == 6) {
        $E = 'language_Go';
    }
    if ($language == 7) {
        $E = 'language_SQL';
    }
    if ($language == 8) {
        $E = 'language_php';
    }
    if ($language == 9) {
        $E = 'language_C';
    }
    if ($language == 10) {
        $E = 'language_C++';
    }
    // echo $E;
} else {
    $E = 0;
}

//気になるワード
//気になるワードをnullとする。そして
$keyword = null;
if (isset($_POST['text1'])) {
    // echo $_POST['text1'];
    $keyword = $_POST['text1'];
    // echo $keyword;
}

//活動場所
$spot = null;
if (isset($_POST['category'])) {
    // echo $_POST['category'];
    $spot = $_POST['category'];
    // echo $spot;
}

?>


<html>

<head>
    <link rel="stylesheet" type="text/css" href="/css/search.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>ユーザー詳細情報画面</title>
</head>

<body>