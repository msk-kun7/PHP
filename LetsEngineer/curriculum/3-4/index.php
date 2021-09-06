<?php
// 作成したdb_connect.phpを読み込む
require_once("getData.php");
$a = new getData();
$user = $a->getUserData();
$post = $a->getPostData();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <div class='logo'>
            <img src="yi_logo.png">
        </div>
        <div class='name_date'>
            <div class='name_tag'>
                ようこそ<?php echo $user['last_name'].$user['first_name']?>さん
            </div>
            <div class='date_tag'>
                最終ログイン日：<?php echo $user['last_login']?>
            </div>
        </div>
    </header>
    <table>
        <tr>
            <th>記事ID</th>
            <th>タイトル</th>
            <th>カテゴリ</th>
            <th>本文</th>
            <th>投稿日</th>
        </tr> 
        <?php while ($row = $post->fetch(PDO::FETCH_ASSOC)) : ?>
        <tr>
            <td> 
                <?php echo $row['id'] ?> 
            </td>
            <td>
                <?php echo $row['title'] ?>
            </td>
            <td>
                <?php if($row['category_no'] == 1) {
                    echo '食事';
                }elseif($row['category_no'] == 2) {
                    echo '旅行';
                }else{
                    echo 'その他';
                }
                ?>

            </td>
            <td>
                <?php echo $row['comment'] ?>
            </td>
            <td>
                <?php echo $row['created'] ?>
            </td>
        </tr>
       <?php endwhile ?>
    </table>
    <footer>Y&I group.inc</footer>
</body>
</html>