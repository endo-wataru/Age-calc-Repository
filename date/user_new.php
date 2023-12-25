<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <!-- レスポンシブ対応(どのOSでも適正化して表示する)-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>年齢計算</title>
    <style>
      .container{
        max-width:300px;
        margin:0 auto;
        border:10px solid green; /* borderは枠線の太さ solidは枠線の色 */
        border-radius:20px; /* borderの角を丸くする */
        padding:10px;
      }
      label{
        display:block;
        margin-bottom:5px;
      }
      input{
        width:100%;
        margin-bottom:10px;
      }  
      .newlogin{
        display:inline-block;
        padding:10px 20px;
        border:0 0 0 20;
        background-color:#4CAF50;
        color:white; /*文字の色*/
        text-decoration: none;
        border-radius:5px; /*角の丸み*/
      }
      .sinki-style{
        text-align:center;
      }
    </style>
  </head>
  <body>
    <div class="container">
    <form action="user_new_check.php" method="post">
      <h4 class="sinki-style">新規登録画面</h4>
      <label for="name">名前:</label>
      <input type="text" name="name" id="name"><br/>
      
      <label for="pass">パスワード:</label>
      <input type="password" name="pass" id="pass"><br/>
      ※確認のため、再度パスワードを<br/>入力してください。<br/><br/>
        <input type="password" name="pass2" id="pass2"><br/>
     
     <!-- <label for="pass2">※確認のため、もう一度パスワードを<br/>入力してください。</label> -->
     <!-- <input type="password" name="pass2" id="pass2"><br/><br/> -->
      <input type="submit" value="送信">
    </form>
    </div>
  </body>
</html>