<?php
// db_connect.phpの読み込み
require_once("db_connect.php");
require_once("function.php");

// ログインしていなければ、login.phpにリダイレクト
check_user_logged_in();

// PDOのインスタンスを取得
$pdo = db_connect();

try {
    // SQL文の準備
    $sql = "SELECT * FROM books";
    // プリペアドステートメントの作成
    $stmt = $pdo->prepare($sql);
   
    // 実行
    $stmt->execute();
} catch (PDOException $e) {
    // エラーメッセージの出力
    echo 'Error: ' . $e->getMessage();
    // 終了
    die();
}
?>
<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">     
    <link rel="stylesheet"  href="css/style.css">
    <title>メイン</title>
</head>
<body>
    <h2>在庫一覧画面</h2>
    <div class="main_top">
    <a class="main_btn" href="create_post.php">新規登録</a><br />
    <a class="main_btn2" href="logout.php">ログアウト</a><br />
    </div>
    <table>
        <tr>
            <th>タイトル</th>
            <th>発売日</th>
            <th>在庫数</th>
            <th></th>
        </tr>
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['Stock']; ?></td>
                <td> <a class="main_btn3" href="delete_post.php?id=<?php echo $row['id'] ?>">削除</a></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>