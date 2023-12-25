<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>年齢計算</title>
    <style>
      a.link-style{
        display:inline-block;
        padding:10px 20px;
        background-color:#4CAF50;
        color:white; /*文字の色*/
        text-decoration: none;
        border-radius:5px; /*角の丸み*/
      }
     
    </style>
  </head>
  <body>

    <?php
    //try-catch文でデータベース連携時の障害対策に備える
    try{
      //check.phpで受け取ったデータを取得して代入
      $user_name=$_POST['name'];
      $user_pass=$_POST['pass'];
      //危険な文字があればより安全な文字列に変換する
      $user_name=htmlspecialchars($user_name,ENT_QUOTES,'UTF-8');
      $user_pass=htmlspecialchars($user_pass,ENT_QUOTES,'UTF-8');
      //データベースに接続
      $dsn='mysql:dbname=date;host=localhost;charset=utf8mb4';
      $user='root';
      $password='root';
      $dbh=new PDO($dsn,$user,$password);
      $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

      $sql='INSERT INTO user(name,password) VALUES(?,?)';
      $stmt=$dbh->prepare($sql); //sqlの起動準備
      $data[]=$user_name;
      $data[]=$user_pass;
      $stmt->execute($data); //sql実行

      $dbh=null; //データベースから切断

      print $user_name;
      print 'さんを追加しました。<br/>';
    }
    catch(Exception $e){
      print $e->getMessage();
      exit();
    }

    session_start();
    $_SESSION['login'] = 1;
    $_SESSION['user_name'] = $user_name; //ログイン時にユーザー名を表示するための材料
    print '<a href="index.php" class="link-style">早速年齢計算へ</a>';
?>


  </body>
</html>