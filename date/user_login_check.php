<?php
//try-catch文でデータベース接続障害対策をする
try {
    //フォーム画面からname属性の値を受け取り変数に代入
    $user_name = $_POST['name'];
    $user_pass = $_POST['pass'];
    //危険な文字があればより安全な文字へ変換する
    $user_name = htmlspecialchars($user_name, ENT_QUOTES, 'UTF-8');
    $user_pass = htmlspecialchars($user_pass, ENT_QUOTES, 'UTF-8');

    //DSN,ユーザー名,パスワードでデータベース接続
    $dsn = 'mysql:dbname=date;host=localhost;charset=utf8mb4';
    $user = 'root';
    $password = 'root';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //sql文でユーザー名に一致する行を取得
    $sql = 'SELECT name, password FROM user WHERE name=?';
    $stmt = $dbh->prepare($sql); //sqlを実行する準備
    $data = [$user_name];
    $stmt->execute($data);
    //データベースから取得した結果
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($rec === false) {
        print 'ユーザー名かパスワードが間違っています。<br/>';
        print '<a href="user_login.php">戻る</a>';
    } else {
        // パスワードが正しいかどうかを確認
        if (password_verify($user_pass, $rec['password'])) {
            // ログイン成功なら
            session_start();
            $_SESSION['login'] = 1;
            $_SESSION['user_name'] = $user_name; //ログイン時にユーザー名を表示するための材料
            header('Location: index.php');
            exit();
        } else {
            // パスワードが間違っている場合
            print 'パスワードが間違っています。<br/>';
            print '<a href="user_login.php">戻る</a>';
        }
    }
} catch (Exception $e) {
    print 'エラーメッセージ:' . $e->getMessage();
}
