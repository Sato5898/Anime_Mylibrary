<?php
require_once(ROOT_PATH ."/Models/Player.php");
require_once(ROOT_PATH ."/Models/Goal.php");
require_once(ROOT_PATH ."/Models/Country.php");

class PlayerController{
    private $request;  //リクエストパラメータ(GET,POST)
    private $Player;   //Playerモデル
    private $Goal;     //Goalモデル
    private $Country;     //Countryモデル

    public function __construct(){
        //リクエストパラメータの取得
        $this->request["get"] = $_GET;
        $this->request["post"] = $_POST;

        // モデルオブジェクトの生成
        $this->Player = new Player();
        // 別モデルと連携
        $dbh = $this->Player->get_db_handler();
        $this->Goal = new Goal($dbh);
        // 別モデルと連携
        $dbh = $this->Player->get_db_handler();
        $this->Country = new Country($dbh);
    }

    public function index(){
        $page = 0;
        if(isset($this->request["get"]["page"])){
            $page = $this->request["get"]["page"];
        }

        $players = $this->Player->findAll($page);
        $players_count = $this->Player->countAll();
        $params = [
            "players" => $players,
            "pages" => $players_count / 20
        ];
        return $params;
    }

    public function view() {
        if(empty($this->request["get"]["id"])){
            echo "指定のパラメータが不正です。このページは表示できません。";
            exit;
        }
        $player = $this->Player->findById($this->request["get"]["id"]);
        $params = [
            "player" => $player
        ];
        return $params;
    }

    public function goal() {
        if(empty($this->request['get']['id'])){
            echo '指定のパラメータが不正です。このページを表示できません。';
            exit;
        }
        $Goal = $this->Goal->findByGoal($this->request['get']['id']);
        $g_params = [
            'Goal' => $Goal
        ];
        return $g_params;
    }

    public function delete() {
        if(empty($this->request['post']['del_id'])){
            exit;
        }
        $del_id = $this->request['post']['del_id'];
        $this->Player->delete($del_id);
        $this->Player->deleteTemporary();
        $this->Player->insertTemporary();
    }

    public function country(){
        $Country = $this->Country->findAllCountry();
        $c_params = [
            'Country' => $Country
        ];
        return $c_params;
    }

    public function edit($validation_id, $validation_country, $validation_uniform_num, $validation_position, $validation_name, $validation_club, $validation_birth, $validation_height, $validation_weight) {
        $this->Player->edit($validation_id, $validation_country, $validation_uniform_num, $validation_position, $validation_name, $validation_club, $validation_birth, $validation_height, $validation_weight);
        $this->Player->deleteTemporary();
        $this->Player->insertTemporary();
    }

    public function signupAll($email){
        $this->Player->signupAll($email);
    }

    public function signup($email, $password){
        $this->Player->signup($email, $password);
    }

    public function login($email, $password){
        $this->Player->login($email, $password);
    }
}
?>