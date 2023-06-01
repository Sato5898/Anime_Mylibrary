<?php
session_start();
require_once(ROOT_PATH . 'Controllers/PlayerController.php');
require_once(ROOT_PATH . '/Models/Validation.php');
$player = new PlayerController();
$Validation = new Validation();
// ログアウト
if(isset($_POST["logout"])){
    session_destroy();
    header('Location:' .$_SERVER['HTTP_REFERER']);
    exit;
}
$email = $_POST["email"];
$password = $_POST["password"];
$validation = $Validation->login_validation($email, $password);
$params = $player->login($email, $password);
