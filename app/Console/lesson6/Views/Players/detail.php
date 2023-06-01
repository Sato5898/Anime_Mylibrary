<?php
session_start();
// 画面遷移の制限
$referer = $_SERVER['HTTP_REFERER'];
$url = '/Players/index.php';
if(!strstr($referer,$url)){
header('Location: index.php');
exit;
}
// ログイン状態の確認
if($_SESSION["role"] === NULL){
    header('Location: index.php');
    exit;
}
require_once(ROOT_PATH . "Controllers/PlayerController.php");
$player = new PlayerController();
$params = $player->view();
$g_params = $player->goal();
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
    <h2>■選手詳細</h2>
    <table class="detail">
        <tr>
            <th>No</th>
            <td><?php echo $params['player']['id'] ?></td>
        </tr>
        <tr>
            <th>背番号</th>
            <td><?php echo $params['player']['uniform_num'] ?></td>
        </tr>
        <tr>
            <th>ポジション</th>
            <td><?php echo $params['player']['position'] ?></td>
        </tr>
        <tr>
            <th>名前</th>
            <td><?php echo $params['player']['name'] ?></td>
        </tr>
        <tr>
            <th>所属</th>
            <td><?php echo $params['player']['club'] ?></td>
        </tr>
        <tr>
            <th>誕生日</th>
            <td><?php echo $params['player']['birth'] ?></td>
        </tr>
        <tr>
            <th>身長</th>
            <td><?php echo $params['player']['height'] ?>cm</td>
        </tr>
        <tr>
            <th>体重</th>
            <td><?php echo $params['player']['weight'] ?>kg</td>
        </tr>
        <tr>
            <th>国</th>
            <td><?php echo $params['player']['country_name'] ?></td>
        </tr>
    </table>

    <table class="g_detail">
    <tr>
            <th>点数</th>
            <th>試合日時</th>
            <th>対戦相手</th>
            <th>ゴールタイム</th>
        </tr>
        <?php $x=1; ?>
        <?php foreach($g_params['Goal'] as $goal): ?>
        <tr>
            <td><?=$x ?>点目</td>
            <td><?=$goal['kickoff'] ?></td>
            <td><?=$goal['name'] ?></td>
            <td><?=$goal['time'] ?></td>
        </tr>
        <?php $x++; ?>
        <?php endforeach; ?>
    </table>
    

    <a class="back" href="/Players/index.php">トップへ戻る</a>
</body>

</html>