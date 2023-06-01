<?php
session_start();
require_once(ROOT_PATH . "Controllers/PlayerController.php");
$player = new PlayerController();
$params = $player->index();
if (!empty($_POST['del_id']) AND $_SESSION["role"] === 0) {
    $player->delete();
    header('Location: index.php');
    exit;
}else if(!empty($_POST["del_id"])){
    unset($_POST["del_id"]);
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>オブジェクト指向 - 選手一覧</title>
    <link rel="stylesheet" type="text/css" href="../css/base.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body>
    <header>
        <h2>■選手一覧</h2>
        <div class="signin">
            <form action="login.php" method="POST">
                <p><?php if (!empty($_SESSION["validation_error"])) {
                        echo $_SESSION["validation_error"];
                    } ?></p>
                <label for="email">アカウント名</label>
                <input id="email" name="email" type="text" placeholder="メールアドレスを入力"><br>
                <label for="password">パスワード　</label>
                <input id="password" name="password" type="text" placeholder="パスワードを入力"><br>
                <button class="signin_log" type="submit">ログイン</button>
                <button class="signin_log" name="logout" value="logout" type="submit">ログアウト</button><br>
            </form>
            <a href="signup.php">新規会員登録</a>
        </div>
    </header>
    <table>
        <tr>
            <th>No</th>
            <th>背番号</th>
            <th>ポジション</th>
            <th>名前</th>
            <th>所属</th>
            <th>誕生日</th>
            <th>身長</th>
            <th>体重</th>
            <th>国</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        <?php foreach ($params["players"] as $player) : ?>
            <?php if ($player["del_flg"] == 1) {
                continue;
            }; ?>
            <tr>
                <td><?= $player["id"] ?></td>
                <td><?= $player["uniform_num"] ?></td>
                <td><?= $player["position"] ?></td>
                <td><?= $player["name"] ?></td>
                <td><?= $player["club"] ?></td>
                <td><?= $player["birth"] ?></td>
                <td><?= $player["height"] ?>cm</td>
                <td><?= $player["weight"] ?>kg</td>
                <td><?= $player["country_name"] ?></td>
                <td><button class="form-btn"><a style="text-decoration: none; color: black;" href="/Players/detail.php?id=<?php echo $player["id"]; ?>">詳細</a></button></td>
                <td>
                    <form style="margin: auto 0;" method="post" action="">
                        <input type="hidden" name="del_id" value=<?= $player['id'] ?>>
                        <button class="form-btn" type="submit" onclick="return confirm('削除しますか？')">削除</button>
                    </form>
                </td>
                <td><button class="form-btn"><a style="text-decoration: none; color: black;" href="/Players/edit.php?id=<?php echo $player["id"]; ?>">編集</a></button></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <div class="paging">
        <?php
        for ($i = 0; $i <= $params["pages"]; $i++) {
            if (isset($_GET["page"]) && $_GET["page"] == $i) {
                echo $i + 1;
            } else {
                echo "<a href='?page=" . $i . "'>" . ($i + 1) . "</a>";
                echo " ";
            }
        }
        ?>
    </div>
    <?php unset($_SESSION["validation_error"]); ?>
</body>

</html>