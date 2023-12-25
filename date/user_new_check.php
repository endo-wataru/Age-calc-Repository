<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>年齢計算</title>
  </head>
  <body>
    <?php
    //フォーム画面からデータを受け取り変数に代入します
    $user_name=$_POST['name'];
    $user_pass=$_POST['pass'];
    $user_pass2=$_POST['pass2'];
    //危険な文字があればより安全な文字に変換し代入します
    $user_name=htmlspecialchars($user_name,ENT_QUOTES,'UTF-8');
    $user_pass=htmlspecialchars($user_pass,ENT_QUOTES,'UTF-8');
    $user_pass2=htmlspecialchars($user_pass2,ENT_QUOTES,'UTF-8');
    //もし、ユーザー名が入力されなかったら
    if($user_name==''){
      print 'ユーザー名が入力されていません。<br/>';
    }
    else{
      //ユーザー名を表示します
      print 'ユーザー名';
      print $user_name;
      print '<br/>';
    }
    //もし、パスワードが入力されなかったら
    if($user_pass==''){
      print 'パスワードが入力されていません。<br/>';
    }

    if($user_pass!=$user_pass2){
      print 'パスワードが一致しません。<br/>';
    }
    //もし、３つの条件のいずれかを満たさない場合
    if($user_name=='' || $user_pass=='' || $user_pass!=$user_pass2){
      print '<form>';
      print '<input type="button" onclick="history.back()" value="戻る">';
      print '</form>';
    }
    else{
      //データベースに登録するときにハッシュ(暗号)化する
      $user_pass=password_hash($user_pass,PASSWORD_DEFAULT);
      
      print '<form method="post" action="user_new_done.php">';
      print '<input type="hidden" name="name" value="'.$user_name.'">';
      print '<input type="hidden" name="pass" value="'.$user_pass.'">';
      print '<br/>';
      print '<input type="button" onclick="history.back()" value="戻る">';
      print '<input type="submit" value="OK">';
      print '</form>';

    }

    ?>




    
  </body>
</html>