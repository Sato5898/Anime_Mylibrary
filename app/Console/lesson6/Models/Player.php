<?php
require_once(ROOT_PATH . "/Models/Db.php");

class Player extends Db
{
    private $table = "players";

    public function __construct($dbh = null)
    {
        parent::__construct($dbh);
    }
    /**
     * playersテーブルからすべてデータを取得（20件ごと）
     * 
     * @param integer $page ページ番号
     * @return Array $result 全選手データ（20件ごと）
     */
    public function findAll($page = 0): array
    {
        $sql = "SELECT p.*, c.name as country_name
    FROM players AS p 
    JOIN countries AS c 
    ON p.country_id = c.id";
        $sql .= ' WHERE del_flg = 0 ';
        $sql .= ' LIMIT 20 OFFSET ' . (20 * $page);
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    /**
     * playersテーブルから全データ数を取得
     * 
     * @return Int $count 全選手の件数
     */
    public function countAll(): Int
    {
        $sql = "SELECT count(*) as count FROM players";
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        $count = $sth->fetchColumn();
        return $count;
    }

    /**
     * playersテーブルから指定idに一致するデータを取得
     * 
     * @param integer $id 選手のID
     * @return Array $result 指定の選手データ
     */
    public function findById($id = 0): array
    {
        $sql = 'SELECT p.*, c.name as country_name 
        FROM players AS p 
        LEFT JOIN countries AS c 
        ON p.country_id = c.id';
        $sql .= ' WHERE p.id = :id';
        $sth = $this->dbh->prepare($sql);
        $sth->bindParam(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    /**
     * playersテーブルから指定idに一致するデータを削除
     * 
     * @param integer $id 選手のID
     * @return Array $result 指定の選手データ
     */
    public function delete($id)
    {
        $sql = 'UPDATE players
        SET del_flg = 1
        WHERE id = :id';
        $sth = $this->dbh->prepare($sql);
        $sth->bindParam(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    // 編集フォーム
    public function edit($validation_id, $validation_country, $validation_uniform_num, $validation_position, $validation_name, $validation_club, $validation_birth, $validation_height, $validation_weight)
    {
        $sql = 'UPDATE players
                SET uniform_num = :uniform_num,
                    position = :position,
                    name = :name,
                    club = :club,
                    birth = :birth,
                    height = :height,
                    weight = :weight,
                    country_id = :country_id
                WHERE id = :id';
        $sth = $this->dbh->prepare($sql);
        $sth->bindParam(':id', $validation_id, PDO::PARAM_INT);
        $sth->bindParam(':country_id', $validation_country, PDO::PARAM_INT);
        $sth->bindParam(':uniform_num', $validation_uniform_num, PDO::PARAM_INT);
        $sth->bindParam(':position', $validation_position, PDO::PARAM_STR);
        $sth->bindParam(':name', $validation_name, PDO::PARAM_STR);
        $sth->bindParam(':club', $validation_club, PDO::PARAM_STR);
        $sth->bindParam(':birth', $validation_birth, PDO::PARAM_STR);
        $sth->bindParam(':height', $validation_height, PDO::PARAM_INT);
        $sth->bindParam(':weight', $validation_weight, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function deleteTemporary()
    {
        $sql = 'DELETE FROM players_tmp ';
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        $this->insertTemporary();
    }

    public function insertTemporary()
    {
        $sql = 'INSERT INTO players_tmp ';
        $sql .= 'SELECT c.name AS country_name ,p.uniform_num, p.position, p.name, p.club, p.birth, p.height ,p.weight FROM players AS p ';
        $sql .= 'LEFT JOIN countries c ON p.country_id = c.id ';
        $sql .= 'WHERE del_flg = 0 ';
        $sql .= 'ORDER BY p.id ASC';
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
    }

    // 新規会員登録
    // 情報照会して、既に登録してあるアドレスとパスワードだった場合、false
    public function signup($email, $password)
    {
        $sql = "INSERT INTO users(email, password) VALUES (:email, :password)";
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':email', $email);
        $sth->bindValue(':password', $password);
        $sth->execute();
    }

    //アカウント重複チェック
    public function signupAll($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':email', $email);
        $sth->execute();
        $count = $sth->fetch();
        if (!empty($count)) {
            $_SESSION["account_error"] = "*既に登録されているアカウントです。";
            header("Location:" . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }

    // ログイン時の情報照会
    public function login($email, $password)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $sql = 'SELECT email, password, role FROM users WHERE email = :email';
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch();
            if ($result === false) {
                $_SESSION["validation_error"] = "*メールアドレス、またはパスワードに間違いがあります。";
                header('Location:' . $_SERVER['HTTP_REFERER']);
                exit;
            }
            if (password_verify($password, $result['password'])) {
                $_SESSION["role"] = $result["role"];
                header('Location:' . $_SERVER['HTTP_REFERER']);
                exit;
            } else {
                $_SESSION["validation_error"] = "*メールアドレス、またはパスワードに間違いがあります。";
            }
        }
    }

        // edit,deteleのダイレクトアクセスの禁止設定
        // ログインのセッションが存在しない場合リダイレクトされる
        // if文 refere session_derectry的な？
}
