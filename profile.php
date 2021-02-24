<!DOCTYPE html>
<html>
 <head>
  <link rel="stylesheet" type="text/css" href="http://kakemachi.net./css/profile.css">
  <meta http-equiv="content-type" charset="utf-8">
  <title>エンジニアマッチングサイト</title>
 </head>
<body>

  <!--画面遷移-->
  <div class="header">
        <div class="header-logo">Kakemachi</div>
        <div class="header-logo"><a href='http://kakemachi.net./signup.php'><img src="https://illalet.com/wp-content/uploads/2018/10/16_2_294.png" height="60px" width="60px"></a></div>
    </div>

     


      
  <div class="main">
  <h1 style="text-align: center;">自分のプロフィール</h1>
      <h1 style="background-color: #09b944;">画像登録＆更新</h1>
      
        <img src="https://www.pakutaso.com/shared/img/thumb/0I9A5582ISUMI.jpg"　width="200" height="200">
          <div class="faile">
            　 <button onclick="return confirm('ファイル選択画面に移動します。')">ファイルを選択</button>
           <button onclick="return confirm('指定されている画像を削除します。よろしいでしょうか？')">削除</button>
          </div> 

          　<h1 style="background-color: #09b944;">活動場所</h1>
        <?php 
          $types = array('北海道','青森','秋田','岩手','山形','宮城','福島','茨城','栃木','群馬','埼玉','千葉','東京','神奈川','新潟','長野','山梨','静岡','富山','岐阜','愛知','石川','福井','滋賀','三重','京都','奈良','大阪','和歌山','兵庫','鳥取','岡山','島根','広島','山口','香川','徳島','愛媛','高知','福岡','佐賀','大分','熊本','宮崎','鹿児島','長崎','沖縄');
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
       

        <input type="checkbox" name="language" value="0">
        <label>HTML</label>

        <input type="checkbox" name="language" value="1">
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
        <!-- <form name="form"> -->
            <textarea name="text1" cols="40" rows="5" id="text1" type="text"></textarea>
        <!-- </form> -->
        <h1 style="background-color: #09b944;">Twitter ID</h1>
        <input name="text1" id="text1" type="text">

        <h1 style="background-color: #09b944;">更新ボタン</h1>
        <input type="submit" value="更新">
        </div>




           <!-- <div class="contents">
            <h1 id="tera">
            <h1 style="background-color: black;">ユーザー名</h1>
            <input placeholder="ユーザー名を入力してください。">
            <h1 style="background-color: black;">希望する活動場所(複数回答可)</h1>
            <input placeholder="希望する活動場所を入力してください。(複数回答可)">
            <h1 style="background-color: black;">使用できるプログラミング言語 複数回答可</h1>
            <input type="checkbox" id="check1">
        　　<label for="check1">HTML</label>
        　　<input type="checkbox" id="check1">
        　　<label for="check1">CSS</label>
        　　<input type="checkbox" id="check1">
        　　<label for="check1">JavaScript</label>
        　　<input type="checkbox" id="check1">
        　　<label for="check1">Ruby</label>
        　　<input type="checkbox" id="check1">
        　　<label for="check1">Python</label>
        　　<input type="checkbox" id="check1">
        　　<label for="check1">Java</label>
        　　<input type="checkbox" id="check1">
        　　<label for="check1">Go</label>
            <input type="checkbox" id="check1">
            <label for="check1">SQL</label>
            <input type="checkbox" id="check1">
            <label for="check1">PHP</label>
            <input type="checkbox" id="check1">
            <label for="check1">C言語</label>
            <input type="checkbox" id="check1">
            <label for="check1">C++</label>
            <h1 style="background-color: black;">実務経験歴</h1>
            <input placeholder="実務経験歴を入力してください。">
            <h1 style="background-color: black;">自分の年齢</h1>
            <input placeholder="自分の年齢を入力してください。">
            <h1 style="background-color: black;">相手の希望年齢</h1>
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
            <h1 style="background-color: black;">目標</h1>
            <input placeholder="自分の目標を入力してください。">
            <h1 style="background-color: black;">自己紹介</h1>
            <input placeholder="自己紹介を入力してください。">
            <h1 style="background-color: black;">Twitter</h1>
            <input placeholder="自分のTwitterのリンクを入力してください。">
            <h1 style="background-color:black;">更新</h1>
            <p><button onclick="return confirm('記入された内容を更新します。よろしいでしょうか？')">更新</button></p>
          </form>
          </div> -->
          　　　　　
        
  <!-- </div> -->
  <!-- <script src="profile.js">
    console.log('Hello World');
  </script> -->
</body>
</html>  