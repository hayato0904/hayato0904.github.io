<?php
include('libs/config.php');
session_start();
$is_login = isset($_SESSION['id']) ? true : false;
var_dump($_SESSION);
?>

<!DOCTYPE html>
<html>

<head>
  <!-- 下記一行はスマホ版のサイズに合わせるコード。 -->
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
  <link rel="stylesheet" type="text/css" href="<?=APPLICATION_PATH?>/css/index.css">
  <!-- 一行下のコードは動かなかったら削除する。 -->
  <meta http-equiv="content-type" charset="utf-8">
  <title>エンジニアマッチングサイト</title>
</head>

<body>

  <!--画面遷移-->
  <div class="header">
    <div class="header-logo">Kakemachi</div>
    <div class="header-logo"><a href='<?=APPLICATION_PATH?>/signup.php'><img src="https://illalet.com/wp-content/uploads/2018/10/16_2_294.png" height="60px" width="60px"></a></div>
    <?php if ($is_login) : ?>
      <div class="header-logo"><a href='<?=APPLICATION_PATH?>/profile.php'><img src="https://illalet.com/wp-content/uploads/2018/10/16_2_278.png" height="60px" width="60px"></a></div>
      <div class="header-logo"><a href='<?=APPLICATION_PATH?>/logout.php'><img src="https://cdn3.iconfinder.com/data/icons/round-icons-vol-2/512/Logout_exit-512.png" height="60px" width="60px"></a></div>
    <?php else : ?>
      <div class="header-logo"><a href='<?=APPLICATION_PATH?>/signup1.php'><img src="https://illalet.com/wp-content/uploads/illust/16_2_338.png" height="60px" width="60px"></a></div>
    <?php endif; ?>
  </div>

  <div class="main">
    <p>Kakemachiは駆け出しエンジニア同士を繋ぐマッチングサービスです。<br>様々なエンジニアのニーズにお応えできるサービスになっています。</br></p>
    <form method="post" action="searchresult.php">
      　<h1 style="background-color: #09b944;">活動場所</h1>
      <?php
      $types = array('北海道', '青森', '秋田', '岩手', '山形', '宮城', '福島', '茨城', '栃木', '群馬', '埼玉', '千葉', '東京', '神奈川', '新潟', '長野', '山梨', '静岡', '富山', '岐阜', '愛知', '石川', '福井', '滋賀', '三重', '京都', '奈良', '大阪', '和歌山', '兵庫', '鳥取', '岡山', '島根', '広島', '山口', '香川', '徳島', '愛媛', '高知', '福岡', '佐賀', '大分', '熊本', '宮崎', '鹿児島', '長崎', '沖縄');
      ?>
      <select name="place">
        <option value="未選択">全指定</option>
        <?php
        foreach ($types as $type) {
          echo "<option value='{$type}'>{$type}</option>";
        }
        ?>
      </select>
      <h1 style="background-color: #09b944;">使用できるプログラミング言語</h1>


      <input type="checkbox" name="language[]" value="0">
      <label>HTML</label>

      <input type="checkbox" name="language[]" value="1">
      <label>CSS</label>

      <input type="checkbox" name="language[]" value="2">
      <label>JavaScript</label>

      <input type="checkbox" name="language[]" value="3">
      <label>Ruby</label>

      <input type="checkbox" name="language[]" value="4">
      <label>Python</label>

      <input type="checkbox" name="language[]" value="5">
      <label>Java</label>

      <input type="checkbox" name="language[]" value="6">
      <label>Go</label>

      <input type="checkbox" name="language[]" value="7">
      <label>SQL</label>

      <input type="checkbox" name="language[]" value="8">
      <label>PHP</label>

      <input type="checkbox" name="language[]" value="9">
      <label>C言語</label>

      <input type="checkbox" name="language[]" value="10">
      <label>C++</label>



      <!-- 送信ボタンがあった場所 -->

      <h1 style="background-color: #09b944;">実務経験歴</h1>

      <input type="radio" name="experience[]" value="0">
      <label>未経験</label>

      <input type="radio" name="experience[]" value="1">
      <label>1年目</label>

      <input type="radio" name="experience[]" value="2">
      <label>2年目</label>

      <input type="radio" name="experience[]" value="3">
      <label>3年目</label>

      <input type="radio" name="experience[]" value="4">
      <label>4年目</label>

      <input type="radio" name="experience[]" value="5">
      <label>5年以上</label>


      <h1 style="background-color: #09b944;">相手の年齢</h1>

      <input type="radio" name="age[]" value="1">
      <label>10代</label>

      <input type="radio" name="age[]" value="2">
      <label>20代前半</label>

      <input type="radio" name="age[]" value="3">
      <label>20代後半</label>

      <input type="radio" name="age[]" value="4">
      <label>30代前半</label>

      <input type="radio" name="age[]" value="5">
      <label>30代後半</label>

      <input type="radio" name="age[]" value="6">
      <label>40代以上</label>

      <h1 style="background-color: #09b944;">気になるワード</h1>
      <!-- <form name="form"> -->
      <input name="text1" id="text1" type="text">
      <!-- </form> -->
      <h1 style="background-color: #09b944;">検索ボタン</h1>
      <input type="submit" value="検索">
    </form>
</body>

</html>