<?php

// db_connect.phpの読み込みFILL_IN
require_once("db_connect.php");

// POSTで送られていれば処理実行
if (isset($_POST["signUp"])) {
    // titleとcontentの入力チェック
    if (empty($_POST["name"])) {
        echo '名前が未入力です。';
    } elseif (empty($_POST["password"])){
        echo 'パスワードが未入力です。';
    }
}

// nameとpassword両方送られてきたら処理実行
if (!empty($_POST["name"]) && !empty($_POST["password"])) {
    $name = $_POST["name"];
    $password = $_POST["password"];
    $hash = password_hash($password,PASSWORD_DEFAULT);

// PDOのインスタンスを取得FILL_IN
    $pdo = db_connect();

    try {
        // SQL文の準備
        $sql = "INSERT INTO users (name, password) VALUES (:name,:password)";
        // プリペアドステートメントの準備
        $stmt = $pdo->prepare($sql);
        // タイトルをバインド
        $stmt->bindParam(':name', $name);
        // 本文をバインド
        $stmt->bindValue(':password', $hash);
        // 実行
        $stmt->execute();
        // main.phpにリダイレクト
        header("Location: login.php");

    } catch (PDOException $e) {
        // エラーメッセージの出力
        echo 'Error: ' . $e->getMessage();
        // 終了
        die();
}
}
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet"  href="css/style.css">
</head>
<body>
    <div class="page">
    <h2>ユーザー登録画面</h2>
    <form method="POST" action="">
        <br>
        <input class="form" type="text" name="name" id="name" placeholder="ユーザー名">
        <br>
        <br>
        <input class="form" type="password" name="password" id="password" placeholder="パスワード"><br>
        <input class="submit" type="submit" value="新規登録" id="signUp" name="signUp">
    </form>
    </div>
</body>
</html>