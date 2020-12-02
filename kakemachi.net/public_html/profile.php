<?php
//SETTIONでlogin.phpの情報をログインした情報を保持し続けている。
session_start();
if (isset($_SESSION['EMAIL'])) {
    //$_SESSION['EMAIL'];　<- ログインしているユーザーのメールアドレスを使うことが出来る。
    
    try {
        //データベースに接続する
        $dsn = 'mysql:dbname=kakemachi;host=localhost';
        $user = 'root';
        $password = 'Ha09041208!';
        $dbh = new PDO($dsn,$user,$password);
        //ログインしているユーザーのメールアドレスでユーザーの情報を取得する
        // 　完了　1. logininfo・user テーブルを外部キーでつなぐ
        //　完了 2. 外部結合で、loginfoとuserテーブルを結合してmailaddressで検索して、該当するユーザーのuserテーブルの情報を取得するQueryを考える
        // 完了　3. 2のQueryと下のprepare()とexecute()メソッドを使ってuserテーブルの情報を$resultに代入する
        // 4. 取得した結果$resultを使ってhtml上に情報を表示する
        //*は全てのフィールドと解釈する。
        // select user.* from user・・・usersテーブルのすべてのフィールド
        // select * from users ・・・全てのフィールド
        // ex.２つのテーブルを結合した場合。
        // select user.* from users,syouhin  
        // ・・・この場合はusersテーブルのすべてのフィールドしか表示されません
       // select * from users,syouhin  
       // ・・・この場合はusersテーブルととsyouhinテーブルのすべてのフィールドが表示される。
       //つまり下記はuserテーブルとlogininfoテーブルを結合しているのでuserテーブルだけselectしている。
       //なぜ全てのフィールドが表示されるといけないのか？それが分からない。
        $stmt = $dbh->prepare('select user.* from user LEFT OUTER JOIN logininfo ON user.logininfo_id = logininfo.id  where mailaddress = ?');
        $stmt->execute([$_SESSION['EMAIL']]);
        $item = $stmt->fetch(PDO::FETCH_ASSOC);
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
    <td>
        <?php echo htmlspecialchars($item['work_experience'],ENT_QUOTES,'UTF-8'); ?>
    </td>  
</tr> 
<tr bgcolor="deepskyblue">
    <td>自分の年齢</td>
</tr>
<tr>
    <td>
        <?php echo htmlspecialchars($item['my_age'],ENT_QUOTES,'UTF-8'); ?>
    </td>  
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
    <td>
        <?php echo htmlspecialchars($item['target'],ENT_QUOTES,'UTF-8'); ?>
    </td>  
</tr>
<tr bgcolor="deepskyblue">
    <td>自己紹介</td>
</tr>
<tr>
    <td>
        <?php echo htmlspecialchars($item['self_introduction'],ENT_QUOTES,'UTF-8'); ?>
    </td>  
    </tr>
<tr bgcolor="deepskyblue">
    <td>Twitter</td>
</tr>
<tr>
    <td>
        <?php echo htmlspecialchars($item['twitter'],ENT_QUOTES,'UTF-8'); ?>
    </td>  
</tr>
<br>
</br>
</table>
<?php
    } catch (\Exception $e) {
        echo $e->getMessage();
    }    
}
?>



<!DOCTYPE html>
<html>
 <head>
  <link rel="stylesheet" type="text/css" href="/css/profile.css">
  <title>駆け出しエンジニアマッチングサイト</title>
 </head>
<body>
<h1>新規登録画面</h1>
		<form action="" method="POST">
			UserName<input type="text" name="username" value=""><br>
			Password<input type="password" name="password" value=""><br>
			<input type="submit" name="signup" value="新規登録">
    </form>

  <div class="header">
    <div class="header-logo">駆け出しエンジニアとマッチング</div>
  </div>

  <div class="main">
    <div class="copy-container">
      <h1>自分のプロフィール</h1>
    </div>

    <div class="contents">
        <h1 style="background-color: black;">画像登録＆更新</h1>
        <h2>※登録済みのユーザーのみ変更可能</h2>
        <img src="https://www.pakutaso.com/shared/img/thumb/0I9A5582ISUMI.jpg"　width="200" height="400">
          <h2>プロフィール画像</h2>
          <div class="faile">
            　 <button onclick="return confirm('ファイル選択画面に移動します。')">ファイルを選択</button>
           <button onclick="return confirm('指定されている画像を削除します。よろしいでしょうか？')">削除</button>
          </div> 
          <button onclick="return confirm('指定されている画像を更新します。よろしいでしょうか？')">更新</button>

           <div class="contents">
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
          </div>        
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
                <td>自分の年齢</td>
            </tr>
            <tr>
                <td>23歳</td>
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
            </tr>
            </table>
        </div>
  </div>
  <script src="profile.js">
    console.log('Hello World');
  </script>
</body>
</html>  