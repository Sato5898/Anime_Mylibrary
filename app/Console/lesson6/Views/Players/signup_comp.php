<?php 
session_start();
date_default_timezone_set('Asia/Tokyo');
// 画面遷移の制限
$referer = $_SERVER['HTTP_REFERER'];
$url = '/Players/signup.php';
if(!strstr($referer,$url)){
header('Location: index.php');
exit;
}
require_once(ROOT_PATH . '/Models/Validation.php');
require_once(ROOT_PATH . 'Controllers/PlayerController.php');
$player = new PlayerController();
$Validation = new Validation();
$email = $_POST["email"];
$hash_password = $_POST["password"];
$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
$validation = $Validation->signup_validation($email, $hash_password);
$signupAll = $player->signupAll($email);
$singup = $player->signup($email, $password);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規会員登録 完了画面</title>
    <link rel="stylesheet" type="text/css" href="../css/base.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <div class="signup_comp_area">
        <p>会員登録が完了しました。</p>
        <a class="back" href="/Players/index.php">トップへ戻る</a>
    </div>
</body>
<?php session_destroy(); ?>
</html>