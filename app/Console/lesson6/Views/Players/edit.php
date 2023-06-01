<?php
session_start();
// 画面遷移の制限
$referer = $_SERVER['HTTP_REFERER'];
$url = '/Players/index.php';
if(!strstr($referer,$url)){
header('Location: index.php');
exit;
}
// 権限管理
if($_SESSION["role"] === 1 || $_SESSION["role"] === NULL){
    header('Location: index.php');
    exit;
}
require_once(ROOT_PATH . 'Controllers/PlayerController.php');
$player = new PlayerController();
$params = $player->view();
$c_params = $player->country();
// 変数の初期化
if (empty($_SESSION["country_name"])) {
    $_SESSION["country_name"] = $params["player"]["country_name"];
    $_SESSION["uniform_num"] = $params["player"]["uniform_num"];
    $_SESSION["name"] = $params["player"]["name"];
    $_SESSION["position"] = $params["player"]["position"];
    $_SESSION["club"] = $params["player"]["club"];
    $_SESSION["birth"] = $params["player"]["birth"];
    $_SESSION["height"] = $params["player"]["height"];
    $_SESSION["weight"] = $params["player"]["weight"];
}
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
            <h2>■編集フォーム</h2>
            <form action="/Players/edit_comp.php" method="POST">
                <h3>下記の項目をご記入の上送信ボタンを押してください</h3>
                <dl>
                    <input type="hidden" name="id" value="<?php echo $params["player"]["id"]; ?>">
                    <dt><label for="country_name">・国</label></dt>
                    <dd>
                        <select name="country_id" id="country_id">
                            <?php foreach ($c_params["Country"] as $key => $country) : ?>
                                <?php if ($params["player"]["country_name"] == $country["name"]) {
                                    echo "<option value=" . $country["id"] . " selected>" . $country["name"] . "</option>";
                                } else {
                                    echo "<option value=" . $country["id"] . ">" . $country["name"] . "</option>";
                                } ?>
                            <?php endforeach; ?>
                        </select>
                    </dd>

                    <dt><label for="uniform_num">・背番号　<span style="color:red"><?php if (!empty($_SESSION["validation_uniform_num"])) {
                                                                                    echo $_SESSION["validation_uniform_num"];
                                                                                } ?></span></label></dt>
                    <dd><input type="text" name="uniform_num" id="uniform_num" value="<?php echo $_SESSION["uniform_num"]; ?>"></dd>

                    <dt><label for="name">・名前　<span style="color:red"><?php if (!empty($_SESSION["validation_name"])) {
                                                                            echo $_SESSION["validation_name"];
                                                                        } ?></span></label></dt>
                    <dd><input type="text" name="name" id="name" value="<?php echo $_SESSION["name"]; ?>"></dd>

                    <dt><label for="position">・所属</label></dt>
                    <dd>
                        <select name="position" id="position">
                            <option hidden><?= $params["player"]["position"]; ?></option>
                            <option value="MF">MF</option>
                            <option value="GK">GK</option>
                            <option value="DF">DF</option>
                            <option value="FW">FW</option>
                        </select>
                    </dd>

                    <dt><label for="club">・所属　<span style="color:red"><?php if (!empty($_SESSION["validation_club"])) {
                                                                            echo $_SESSION["validation_club"];
                                                                        } ?></span></label></dt>
                    <dd><input type="text" name="club" id="club" value="<?php echo $_SESSION["club"]; ?>"></dd>

                    <dt><label for="birth">・誕生日　<span style="color:red"><?php if (!empty($_SESSION["validation_birth"])) {
                                                                            echo $_SESSION["validation_birth"];
                                                                        } ?></span></label></dt>
                    <dd><input type="text" name="birth" id="birth" value="<?php echo $_SESSION["birth"]; ?>"></dd>

                    <dt><label for="height">・身長　<span style="color:red"><?php if (!empty($_SESSION["validation_height"])) {
                                                                            echo $_SESSION["validation_height"];
                                                                        } ?></span></label></dt>
                    <dd><input type="text" name="height" id="height" value="<?php echo $_SESSION["height"]; ?>"></dd>

                    <dt><label for="weight">・体重　<span style="color:red"><?php if (!empty($_SESSION["validation_weight"])) {
                                                                            echo $_SESSION["validation_weight"];
                                                                        } ?></span></label></dt>
                    <dd><input type="text" name="weight" id="weight" value="<?php echo $_SESSION["weight"]; ?>"></dd>

                    <button class="form-btn" type="submit" onclick="return confirm('この内容で編集してよろしいですか?')">送信する</button>
            </form>
        </div>
    </section>
    <a class="back" href="/Players/index.php">トップへ戻る</a>
    <?php
    // validationの値を初期化
    $_SESSION["validation_name"] = "";
    $_SESSION["validation_uniform_num"] = "";
    $_SESSION["validation_club"] = "";
    $_SESSION["validation_birth"] = "";
    $_SESSION["validation_height"] = "";
    $_SESSION["validation_weight"] = "";
    unset($_SESSION["country_name"]);
    unset($_SESSION["uniform_num"]);
    unset($_SESSION["name"]);
    unset($_SESSION["position"]);
    unset($_SESSION["club"]);
    unset($_SESSION["birth"]);
    unset($_SESSION["height"]);
    unset($_SESSION["weight"]);
    ?>
</body>

</html>