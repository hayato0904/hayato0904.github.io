<?php
include('libs/config.php');
session_start();

$id = $_SESSION['id'];
$sql = "SELECT * FROM user WHERE logininfo_id = {$id}";


if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
  $sql = "UPDATE user";
  $sql .=  " SET category = '" . isset($_POST['category']) ? $_POST['category'] : '' . "'";
  $sql .=     ", language_html = '" . isset($_POST['language_html']) ? 'html' : '' . "'";
  $sql .=     ", language_css = '" .isset($_POST['language_css']) ? 'css' : '' . "'";
  $sql .=     ", language_javascript = '" .isset($_POST['javascript']) ? 'javascript' : '' . "'";
  $sql .=     ", language_ruby = '" .isset($_POST['language_ruby']) ? 'ruby' : '' . "'";
  $sql .=     ", language_python = '" .isset($_POST['language_python']) ? 'python' : '' . "'";
  $sql .=     ", language_Java = '" .isset($_POST['language_Java']) ? 'Java' : '' . "'";
  $sql .=     ", language_Go = '" .isset($_POST['language_Go']) ? 'Go' : '' . "'";
  $sql .=     ", language_SQL = '" .isset($_POST['language_SQL']) ? 'SQL' : '' . "'";
  $sql .=     ", language_PHP = '" .isset($_POST['language_PHP']) ? 'PHP' : '' . "'";
  $sql .=     ", language_C = '" .isset($_POST['language_C']) ? 'C' : '' . "'";
  $sql .=     ", language_C++ = '" .isset($_POST['language_C++']) ? 'C++' : '' . "'";
  $sql .=     ", work_experience = '" .isset($_POST)['work_experience']) ? '未経験' : '' . "'";
  $sql .=" WHERE id = {$id}";
}
$sql .= " AND language_" . $list[$lang] . " = '" . $list[$lang] . "'";
$sql .= " AND work_experience = '" . $list[$experience] . "' ";
?>

array(4) { ["category"]=> string(9) "未選択" ["language_html"]=> string(1) "0" ["experience"]=> string(1) "2" ["text1"]=> string(0) "" }




<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="<?=APPLICATION_PATH?>/css/profile.css">
  <meta http-equiv="content-type" charset="utf-8">
  <title>エンジニアマッチングサイト</title>
</head>

<body>

  <!--画面遷移-->
  <div class="header">
    <div class="header-logo">Kakemachi</div>
    <div class="header-logo"><a href='<?=APPLICATION_PATH?>/signup.php'><img src="https://illalet.com/wp-content/uploads/2018/10/16_2_294.png" height="60px" width="60px"></a></div>
  </div>
  <!-- 下記一行はform属性に enctype　属性を使用している。下記の指定がないとフォームからファイル送信ができない。 -->
  <form method="post" action="" enctype="multipart/form-data">
    <!-- 上記一行はform属性に enctype　属性を使用している。下記の指定がないとフォームからファイル送信ができない。 -->
    <div class="element_wrap">
      <label>画像ファイルの添付</label>
      <input type="file" name="attachment_file">
    </div>
    <!-- 下記1行は画像の送信ボタンである。form内に入れないと動かないと考えている。 -->
    <input type="submit" name="btn_confirm" value="入力内容を確認する">
  </form>
  <!-- 上記一行は formで囲った。 -->


  <div class="main">
    <h1 style="text-align: center;">自分のプロフィール</h1>
    <!-- <h1 style="background-color: #09b944;">画像登録＆更新</h1>
      
        <img src="https://www.pakutaso.com/shared/img/thumb/0I9A5582ISUMI.jpg"　width="200" height="200">
          <div class="faile">
            　 <button onclick="return confirm('ファイル選択画面に移動します。')">ファイルを選択</button>
           <button onclick="return confirm('指定されている画像を削除します。よろしいでしょうか？')">削除</button>
          </div>  -->

    　<h1 style="background-color: #09b944;">活動場所</h1>
    <?php
    //下記一行はファイルのアップロード先を「images/test/」とすることとしている。
    define("FILE_DIR", "images/test/");

    // ファイルのアップロード
    if (!empty($_FILES['attachment_file']['tmp_name'])) {

      $upload_res = move_uploaded_file($_FILES['attachment_file']['tmp_name'], FILE_DIR . $_FILES['attachment_file']['name']);

      if ($upload_res !== true) {
        $error[] = 'ファイルのアップロードに失敗しました。';
      } else {
        $clean['attachment_file'] = $_FILES['attachment_file']['name'];
      }
    }
    //上記はファイルのアップロード
    ?>

    <!-- 画像表示する処理 -->
    <?php if (!empty($clean['attachment_file'])) : ?>
      <div class="element_wrap">
        <label>画像ファイルの添付</label>
        <p><img src="<?php echo FILE_DIR . $clean['attachment_file']; ?>"></p>
      </div>
    <?php endif; ?>

    <?php if (!empty($clean['attachment_file'])) : ?>
      <input type="hidden" name="attachment_file" value="<?php echo $clean['attachment_file']; ?>">
    <?php endif; ?>
    <!-- 画像表示する処理する -->

    <form action="profile.php" method="POST">

    <?php
    $types = array('北海道', '青森', '秋田', '岩手', '山形', '宮城', '福島', '茨城', '栃木', '群馬', '埼玉', '千葉', '東京', '神奈川', '新潟', '長野', '山梨', '静岡', '富山', '岐阜', '愛知', '石川', '福井', '滋賀', '三重', '京都', '奈良', '大阪', '和歌山', '兵庫', '鳥取', '岡山', '島根', '広島', '山口', '香川', '徳島', '愛媛', '高知', '福岡', '佐賀', '大分', '熊本', '宮崎', '鹿児島', '長崎', '沖縄');
    ?>
    <select name="category">
      <option value="未選択">選択してください</option>
      <?php
      foreach ($types as $type) {
        echo "<option value='{$type}'>{$type}</option>";
      }
      ?>
    </select>
    <h1 style="background-color: #09b944;">使用できるプログラミング言語</h1>


    <input type="checkbox" name="language_html" value="0" <?= $row['language_html'] == 'html' ? ' checked' : '' ?>>
    <label>HTML</label>

    <input type="checkbox" name="language_css" value="1">
    <label>CSS</label>

    <input type="checkbox" name="language" value="2">
    <label>JavaScript</label>

    <input type="checkbox" name="language" value="3">
    <label>Ruby</label>

    <input type="checkbox" name="language" value="4">
    <label>Python</label>

    <input type="checkbox" name="language" value="5">
    <label>Java</label>

    <input type="checkbox" name="language" value="6">
    <label>Go</label>

    <input type="checkbox" name="language" value="7">
    <label>SQL</label>

    <input type="checkbox" name="language" value="8">
    <label>PHP</label>

    <input type="checkbox" name="language" value="9">
    <label>C言語</label>

    <input type="checkbox" name="language" value="10">
    <label>C++</label>



    <!-- 送信ボタンがあった場所 -->

    <h1 style="background-color: #09b944;">実務経験歴</h1>

    <input type="checkbox" name="experience" value="0">
    <label>未経験</label>

    <input type="checkbox" name="experience" value="1">
    <label>1年目</label>

    <input type="checkbox" name="experience" value="2">
    <label>2年目</label>

    <input type="checkbox" name="experience" value="3">
    <label>3年目</label>

    <input type="checkbox" name="experience" value="4">
    <label>4年目</label>

    <input type="checkbox" name="experience" value="5">
    <label>5年以上</label>


    <h1 style="background-color: #09b944;">相手の年齢</h1>

    <input type="checkbox" name="check" value="0">
    <label>こだわらない</label>

    <input type="checkbox" name="check" value="1">
    <label>10代</label>

    <input type="checkbox" name="check" value="2">
    <label>20代前半</label>

    <input type="checkbox" name="check" value="3">
    <label>20代後半</label>

    <input type="checkbox" name="check" value="4">
    <label>30代前半</label>

    <input type="checkbox" name="check" value="5">
    <label>30代後半</label>

    <input type="checkbox" name="check" value="6">
    <label>40代以上</label>

    <h1 style="background-color: #09b944;">自己紹介</h1>

    <textarea name="text1" cols="40" rows="5" id="text1" type="text"></textarea>
    
    <h1 style="background-color: #09b944;">Twitter ID</h1>
    <input name="text1" id="text1" type="text">

    <h1 style="background-color: #09b944;">更新ボタン</h1>
    <input type="submit" value="更新">

    </form>

  </div>
</body>

</html>