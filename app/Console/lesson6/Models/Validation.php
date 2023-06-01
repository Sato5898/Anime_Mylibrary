<?php
require_once(ROOT_PATH . '/Models/Db.php');

class Validation extends Db
{
    public function __construct($dbh = null)
    {
        parent::__construct($dbh);
    }

    public function validation($validation_id, $validation_country, $validation_uniform_num, $validation_position, $validation_name, $validation_club, $validation_birth, $validation_height, $validation_weight)
    {
        //nameが空入力かどうか
        if (empty($validation_name)) {
            $_SESSION["validation_name"] = "*名前は必須入力です。";
        }
        //uniform_numが数字かどうか
        if (!preg_match("/^[0-9]+$/", $validation_uniform_num)) {
            $_SESSION["validation_uniform_num"] = "*背番号は数字のみでご入力ください。";
        }
        //clubが空入力かどうか
        if (empty($validation_club)) {
            $_SESSION["validation_club"] = "*所属は必須入力です。";
        }
        //birthが空入力かどうか
        if (empty($validation_birth)) {
            $_SESSION["validation_birth"] = "*誕生日は必須入力です。";
        }
        //birthが正しいか
        if (preg_match('/\A[0-9]{4}-[0-9]{1,2}-[0-9]{1,2}\z/', $validation_birth) == false) {
            $_SESSION["validation_birth"] = "*誕生日は正しくご入力ください。";
        }
        list($year, $month, $day) = explode('-', $validation_birth);
        if (checkdate($month, $day, $year) == false) {
            $_SESSION["validation_birth"] = "*誕生日は正しくご入力ください。";
        }
        //heightが空入力かどうか
        if (empty($validation_height)) {
            $_SESSION["validation_height"] = "*身長は必須入力です。";
        }
        //heightが数字かどうか
        if (!preg_match("/^[0-9]+$/", $validation_height)) {
            $_SESSION["validation_height"] = "*身長は数字のみでご入力ください。";
        }
        //weightが空入力かどうか
        if (empty($validation_weight)) {
            $_SESSION["validation_weight"] = "*体重は必須入力です。";
        }
        //weightが数字かどうか
        if (!preg_match("/^[0-9]+$/", $validation_weight)) {
            $_SESSION["validation_weight"] = "*体重は数字のみでご入力ください。";
        }
        // errerがある場合edit.phpに戻る
        if (!empty($_SESSION["validation_name"] || $_SESSION["validation_uniform_num"] || $_SESSION["validation_club"] || $_SESSION["validation_birth"] || $_SESSION["validation_height"] || $_SESSION["validation_weight"])) {
            header("Location:" . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }

    // 新規会員登録
    public function signup_validation($email, $hash_password){
        $_SESSION["validation_email"] = "";
        $_SESSION["validation_password"] = "";
        if (empty($email)) {
            $_SESSION["validation_email"] = "*メールアドレスは正しくご入力くだいさ。";
        }
        if(!preg_match("/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/",$email)){
            $_SESSION["validation_email"] = "*メールアドレスは正しくご入力くだいさ。";
        }
        if (empty($hash_password)) {
            $_SESSION["validation_password"] = "*パスワードは必須入力です。";
        }
        if (!empty($_SESSION["validation_email"] || $_SESSION["validation_password"])) {
            header("Location:" . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }

    // ログイン
    public function login_validation($email, $password){
        $_SESSION["validation_error"] = "";
        if (empty($email)) {
            $_SESSION["validation_error"] = "*メールアドレス、またはパスワードに間違いがあります。";
        }
        if (empty($password)) {
            $_SESSION["validation_error"] = "*メールアドレス、またはパスワードに間違いがあります。";
        }
        
        if (!empty($_SESSION["validation_error"])) {
            header("Location:" . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }
}
