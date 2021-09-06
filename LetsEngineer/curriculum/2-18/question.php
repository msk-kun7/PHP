<?php
//POST送信で送られてきた名前を受け取って変数を作成
$my_name = $_POST['my_name'];
//①画像を参考に問題文の選択肢の配列を作成してください。
$port_namber = array("80","22","20","21");
$web_page = array("PHP","Python","JAVA","HTML");
$command = array("join","select","insert","update");
//② ①で作成した、配列から正解の選択肢の変数を作成してください

$answer1 = $port_namber[0];
$answer2 = $web_page[3];
$answer3 = $command[1];

?>
<link rel="stylesheet" href="style.css">
<form action="answer.php" method="post">
<input type='hidden' name='answer1' value='<?php echo $answer1;?>'>
<input type='hidden' name='answer2' value='<?php echo $answer2;?>'>
<input type='hidden' name='answer3' value='<?php echo $answer3;?>'>
<input type='hidden' name='my_name' value='<?php echo $my_name;?>'>
<p>お疲れ様です<?php echo $my_name;?>さん</p>
<!--フォームの作成 通信はPOST通信で-->

<h2>①ネットワークのポート番号は何番？</h2>
<!--③ 問題のradioボタンを「foreach」を使って作成する-->
<div class = "radio_namber">
<?php foreach ($port_namber as $value) {?>
    <input type="radio" name="question1" value="<?php echo $value; ?>" /> <?php echo $value; ?><br>
<?php } ?>
</div>
<h2>②Webページを作成するための言語は？</h2>
<!--③ 問題のradioボタンを「foreach」を使って作成する-->
<div class = "radio_web">
<?php foreach ($web_page as $value) { ?>
    <input type="radio" name="question2" value="<?php echo $value; ?>" /> <?php echo $value; ?><br>
<?php } ?>
</div>
<h2>③MySQLで情報を取得するためのコマンドは？</h2>
<!--③ 問題のradioボタンを「foreach」を使って作成する-->
<div class = "radio_command">
<?php foreach ($command as $value) { ?>
    <input type="radio" name="question3" value="<?php echo $value; ?>" /> <?php echo $value; ?><br>
<?php } ?>
</div>
<input type="submit" value="回答する" />
<!--問題の正解の変数と名前の変数を[answer.php]に送る-->
</form>