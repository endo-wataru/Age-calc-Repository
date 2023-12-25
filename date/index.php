<?php
session_start();
session_regenerate_id(true);

if(isset($_SESSION['login']) && $_SESSION['login'] == 1){
  //ログイン中の処理
print '<div class="logout-style">';
print '<span class="user-name">'.$_SESSION['user_name'].'さんログイン中</span><br/>';
print '<a href="user_logout.php">ログアウト</a>';
print '</div>';
}
else{
  //ログアウト中の処理
  print '<div class="login-style">';
  print '<a href="user_login.php">ログイン</a>';
  print '</div>';
}
?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>年齢計算</title>
    <style>
      body{
        margin:0;
        padding:0;
        border:30px solid green; /* solidで枠線の色を指定 */
        border-radius:40px; /* borderの角を丸くする */
      }
      .login{
        text-align:right;
      }
      .login a{
        text-decoration:none; /* リンクの下線を消す */
      }
      .container{
        text-align:center;
        padding:20px;
        background-color:white;
      } 
      footer{
        text-align:center;
      }
      .kaigo1{
        margin-right:20px;
      }
      .kaigo2{
        margin-left:20px;
      }
      .kaigo1,.kaigo2{
        text-align:right;
        display: inline-block;
        padding: 8px 16px; /* 上下左右の余白を指定 */
        background-color: #4CAF50; /* ボタンの背景色 */
        color: white; /* ボタンのテキスト色 */
        border: none;
        border-radius: 5px; /* ボタンの角を丸くする */
        text-align: center;
        text-decoration: none;
        font-size: 16px;
        cursor: pointer;
      }
      .login-style a,.logout-style a{
       text-align:right;
       display: inline-block;
       padding: 8px 16px; /* 上下左右の余白を指定 */
       background-color: #4CAF50; /* ボタンの背景色 */
       color: white; /* ボタンのテキスト色 */
       border: none;
       border-radius: 5px; /* ボタンの角を丸くする */
       text-align: center;
       text-decoration: none;
       font-size: 16px;
       cursor: pointer;
      }
      .user-name{
        font-family: "Helvetica Neue", Arial, sans-serif;
      }
      </style>
  </head>
  <body>
    <!-- <header>
       <div class="login">
      <a href="user_login.php">ログイン</a>
    </div> 
    </header> -->
    <div class="container">
    <h1>~年齢計算アプリ~</h1>
    <h2>カレンダーマークを押して生まれた日付を選択してね</h2>
<!-- 年齢計算フォーム -->
<form  class="container" method="post" action="process.php">
<br/><br/><br/>
  <label for="birthdate">生年月日:</label>
  <!-- type="date"は日付を入力できる欄を表示する requiredで日付の範囲指定 -->
  <input type="date" id="birthdate" name="birthdate" required min="1907-01-01" max="<?php echo date('Y-m-d'); ?>">
  <input type="submit" value="計算">
</form>
    </div>
<br/><br/><br/>
<footer>
  <h3>各リンクはこちら</h3>
  <a href="https://www.tyojyu.or.jp/net/kaigo-seido/kaigo-hoken/shougai-jiritsu.html"  target="_blank" class="kaigo1">日常生活自立度</a>
  <a href="https://kaigo.benesse-style-care.co.jp/article/knowledge" target="_blank" class="kaigo2">介護基礎知識</a>
</footer>

  </body>
</html>