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
      <form method="post" action="index.php">
        <div class="form-item">活動場所（複数回答可）</div>
        <input type="text" name="name">
    
        <h1 style="background-color: black;">使用できるプログラミング言語</h1>

        <input type="checkbox" name="language" value="0">
        <label>HTML</label>

        <input type="checkbox" name="language" value="1">
        <label>CSS</label>

        <input type="checkbox" name="language" value="2">
        <label>JaVaScript</label>

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

        

<input type="submit" value="送信">
        
        <h1 style="background-color: black;">実務経験歴</h1>

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


        <h1 style="background-color: black;">相手の年齢</h1>

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

        <h1 style="background-color: black;">その他</h1>
        <input type="checkbox" name="check1">
        <label for="check1">プロフィール画像がある</label>
        <h1 style="background-color: black;">気になるワード</h1>
        <form name="form">
            <input name="text1" id="text1" type="text">
        </form>
      　<button type="button" onclick="location.href='http://localhost/index.php'">検索</button>

          <p>現在、全205件中205件がヒット！</p>
    </>

    <div class="form-item">年齢</div>
    <select name="age">
      <option value="未選択">選択してください</option>
      <!-- for文を用いて6歳から100歳までをoptionで選べるようにしましょう -->
      <?php 
      for ($i = 6; $i <= 100; $i++) {            
      echo "<option value='{$i}'>{$i}</option>";            
      } ?>
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