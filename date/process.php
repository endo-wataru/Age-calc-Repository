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
    //フォームが送信された時の処理
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      //フォームから生年月日を取得
      $birthDate = $_POST["birthdate"];

      //現在の日付を取得
      $currentDate = date("Y-m-d");

      //生年月日から年齢を計算
      //date_create($birthDate)で生年月日のオブジェクトを取得
      //date_create($currentDate)で現在の日付を表すオブジェクトを取得
      //date_diff()で二つのオブジェクトの差を計算する
      //計算結果で得られたDateIntervalオブジェクトのyプロパティにアクセスし経過年数を取得
      //$ageに得られた値を代入
      $age = date_diff(date_create($birthDate), date_create($currentDate))->y;

      //結果を表示
      echo '<div class="container">';
      echo "<p>生年月日: $birthDate</p>";
      echo "<p>年齢: $age 歳</p><br/>";
      echo '<div class="back-style">';
      echo '<a href="index.php">戻る</a>';
      echo "</div>";
      echo "</div>";
    }
    ?>
    <!DOCTYPE>
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
           .container{
            text-align:center;
            padding:20px;
            background-color:white;
           } 
          .login-style a,.logout-style a, back-style{
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
        </style>
      </head>
      <body>

      </body>
    </html>