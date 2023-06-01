<?php
session_start();
require_once(ROOT_PATH . 'Controllers/PlayerController.php');
$player = new PlayerController();
$c_params = $player->country();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>オブジェクト指向 - 選手データ編集</title>
    <link rel="stylesheet" type="text/css" href="../css/base.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body>
    <section>
        <div class="contact_box">
            <h2>■新規会員登録</h2>
            <form action="/Players/signup_comp.php" method="POST">
                <h3>下記の項目をご記入の上送信ボタンを押してください</h3>
                <dl>
                    <div class="account_error"><?php if(!empty($_SESSION["account_error"])){echo $_SESSION["account_error"];} ?></div>
                    <dt><label for="email">・メールアドレス　<span style="color:red"><?php if(!empty($_SESSION["validation_email"])){ echo $_SESSION["validation_email"];} ?></span></label></dt>
                    <dd><input type="email" name="email" id="email" placeholder="メールアドレス";></dd>

                    <dt><label for="password">・パスワード　<span style="color:red"><?php if(!empty($_SESSION["validation_password"])){ echo $_SESSION["validation_password"];} ?></span></label></dt>
                    <dd><input type="text" name="password" id="password" placeholder="パスワード";></dd>                   

                    <button class="form-btn" type="submit" onclick="return confirm('この内容で登録してよろしいですか？')">送信する</button>
            </form>
        </div>
    </section>
    <?php unset($_SESSION["account_error"]); ?>
    <?php unset($_SESSION["validation_email"]); ?>
    <?php unset($_SESSION["validation_password"]); ?>
    <a class="back" href="/Players/index.php">トップへ戻る</a>