<?php
session_start();
// 画面遷移の制限
$referer = $_SERVER['HTTP_REFERER'];
$url = '/Players/edit.php';
if(!strstr($referer,$url)){
header('Location: index.php');
exit;
}
require_once(ROOT_PATH . '/Models/Validation.php');
require_once(ROOT_PATH . 'Controllers/PlayerController.php');
$player = new PlayerController();
$Validation = new Validation();
$validation_id = $_POST["id"];
$validation_country = $_POST["country_id"];
$validation_uniform_num = $_POST["uniform_num"];
$validation_position = $_POST["position"];
$validation_name = $_POST["name"];
$validation_club = $_POST["club"];
$validation_birth = $_POST["birth"];
$validation_height = $_POST["height"];
$validation_weight = $_POST["weight"];
$validation = $Validation->validation($validation_id, $validation_country, $validation_uniform_num, $validation_position, $validation_name, $validation_club, $validation_birth, $validation_height, $validation_weight);
$edit = $player->edit($validation_id, $validation_country, $validation_uniform_num, $validation_position, $validation_name, $validation_club, $validation_birth, $validation_height, $validation_weight);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>オブジェクト指向 編集完了画面</title>
    <link rel="stylesheet" type="text/css" href="../css/base.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body>
    <p>編集が完了しました。</p>
    <a class="back" href="/Players/index.php">トップへ戻る</a>
</body>
<?php
unset($_SESSION["country_name"]);
unset($_SESSION["uniform_num"]);
unset($_SESSION["name"]);
unset($_SESSION["position"]);
unset($_SESSION["club"]);
unset($_SESSION["birth"]);
unset($_SESSION["height"]);
unset($_SESSION["weight"]);
unset($_SESSION["validation_name"]);
unset($_SESSION["validation_uniform_num"]);
unset($_SESSION["validation_club"]);
unset($_SESSION["validation_birth"]);
unset($_SESSION["validation_height"]);
unset($_SESSION["validation_weight"]);
unset($_SESSION["validation_name"]);
?>

</html>