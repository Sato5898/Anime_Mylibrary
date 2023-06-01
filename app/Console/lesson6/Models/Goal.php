<?php
require_once(ROOT_PATH .'/Models/Db.php');

class Goal extends Db {
    private $table = 'goals';
    public function __construct($dbh = null){
        parent::__construct($dbh);
    }

    /**
     * 得点履歴
     *
     * @param integer $id 選手のid
     * @return Array $result 指定の選手の得点履歴
     */

    public function findByGoal($id = 0):Array{
        $sql = "SELECT p.kickoff as kickoff, c.name as name, g.goal_time as time
        FROM goals AS g
        JOIN pairings AS p
        ON p.id = g.pairing_id
        JOIN countries AS c
        ON c.id = p.enemy_country_id
        WHERE g.player_id = :id
        ORDER BY p.kickoff ,g.goal_time";
        $sth = $this->dbh->prepare($sql);
        $sth->bindParam(':id',$id,PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
?>
