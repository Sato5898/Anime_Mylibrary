<?php
require_once(ROOT_PATH .'/Models/Db.php');

class Country extends Db {
    private $table = 'countries';
    public function __construct($dbh = null){
        parent::__construct($dbh);
    }

    public function findAllCountry():Array{
        $sql = "SELECT c.id, c.name
                FROM countries AS c";
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
?>
