<!DOCTYPE html>
<html>
 <head>
  <link rel="stylesheet" type="text/css" href="/css/search.css">
  <title>エンジニアマッチングサイト</title>
 </head>
<body>

　　 <div class="main">
    <div class="contact-form">
      <div class="form-title">検索画面</div>
      <form method="post" action="sent.php">
        <div class="form-item">活動場所（複数回答可）</div>
        <input type="text" name="name">
    
        <div class="form-item">使用できるプログラミング言語（複数選択化）</div>
        <?php 
          $types = array('HTML', 'CSS', 'JavaScript', 'Ruby', 'Python', 'Java','Go','SQL','PHP','C言語','C++');
         ?>
        <!-- この下にselectタグを書いていきましょう -->
        <select name="category">
  <option value="未選択">選択してください</option>
  <?php
    foreach ($types as $type) {
      echo "<option value='{$type}'>{$type}</option>";
    }
  ?>
</select>

<input type="submit" value="送信">
        
        <h1 style="background-color: black;">実務経験歴</h1>
        <input type ="text">
        <h1 style="background-color: black;">相手の年齢</h1>
        <input type="checkbox" id="check1">
        <label for="check1">こだわらない</label>
        <input type="checkbox" id="check1">
        <label for="check1">10代</label>
        <input type="checkbox" id="check1">
        <label for="check1">20代前半</label>
        <input type="checkbox" id="check1">
        <label for="check1">20代後半</label>
        <input type="checkbox" id="check1">
        <label for="check1">30代前半</label>
        <input type="checkbox" id="check1">
        <label for="check1">30代後半</label>
        <input type="checkbox" id="check1">
        <label for="check1">40代以上</label>
        <h1 style="background-color: black;">その他</h1>
        <input type="checkbox" id="check1">
        <label for="check1">プロフィール画像がある</label>
        <h1 style="background-color: black;">気になるワード</h1>
        <form name="form">
            <input name="text1" id="text1" type="text">
        </form>
      　<button type="button" onclick="location.href='http://localhost/index.php'">検索</button>

          <p>現在、全205件中205件がヒット！</p>
    </div>

    <div class="form-item">年齢</div>
    <select name="age">
      <option value="未選択">選択してください</option>
      <!-- for文を用いて6歳から100歳までをoptionで選べるようにしましょう -->
      <?php 
      for ($i = 6; $i <= 100; $i++) {            
      echo "<option value='{$i}'>{$i}</option>";            
} 
   ?>
 </select>


    <div class="contentsunder">
        <p id="rank1"><img src="https://www.pakutaso.com/shared/img/thumb/0I9A5582ISUMI.jpg"　width="200" height="400"></p>
        <h2>プロフィール画像</h2>
  <table border="1" width="80%" bordercolor="#green" bgcolor="#f5f5f5">
      <tr bgcolor="deepskyblue">
          <td>ユーザー名</td>
      </tr>
      <tr>
          <td>山内まりあ</td>
      </tr>
      <tr bgcolor="deepskyblue">
          <td>希望する活動場所</td>
      </tr>
      <tr>
          <td>東京</td>
      </tr>
      <tr bgcolor="deepskyblue">
          <td>使用できるプログラミング言語</td>
      </tr>
      <tr>
          <td>PHP</td>
      </tr>
      <tr bgcolor="deepskyblue" >
          <td>実務経験歴</td>
      </tr>
      <tr>
          <td>3年</td>
      </tr>
      <tr bgcolor="deepskyblue" >
          <td>自分の年齢</td>
      </tr>
      <tr>
          <td>21歳</td>
      </tr>
      <tr bgcolor="deepskyblue" >
          <td>相手の希望年齢</td>
      </tr>
      <tr>
          <td>20代前半 20代後半</td>
      </tr>
      <tr bgcolor="deepskyblue" >
          <td>目標</td>
      </tr>
      <tr>
          <td>プロジェクトマネージャーになること</td>
      </tr>
      <tr bgcolor="deepskyblue" >
          <td>自己紹介</td>
      </tr>
      <tr>
          <td>元気が取り柄です！よろしくお願いします。</td>
      </tr>
      <tr bgcolor="deepskyblue">
          <td>Twitter</td>
      </tr>
      <tr>
          <td></td>
      </tr>
      </table>
        <div class="contact-form">
          <input type="submit" value="お気に入り芸人解除">
        </div>
    </div>
  </div>
  <script>
    function check() {
        var getText = document.form.text1.value;
        if (getText.length <= 10) {
            alert("送信しました。");
        } else {
            alert("気になるメッセージを10文字以内で入力してください。");
        }
    }
</script>
</body>
</html> 