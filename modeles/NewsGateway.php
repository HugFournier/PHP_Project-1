<?php

/**
 * Created by PhpStorm.
 * User: hufournier
 * Date: 16/11/17
 * Time: 15:23
 */
class NewsGateway
{
    private $con;

    /**
     * NewsGateway constructor.
     * @param $con
     */
    public function __construct($con)
    {
        $this->con = $con;
    }

    public function insertBrut($titre,$lien,$description,$dateNews,$id){
        $query = "INSERT INTO NEWS VALUES(:id,:dateNews,:description,:titre,:lien)";
        $argument=array(
            ':id'=>array($id,PDO::PARAM_STR),
            ':dateNews'=>array($dateNews,PDO::PARAM_STR),
            ':description'=>array($description,PDO::PARAM_STR),
            ':titre'=>array($titre,PDO::PARAM_STR),
            ':lien'=>array($lien,PDO::PARAM_STR)
        );
        $this->con->executeQuery($query,$argument);
        return $this->con->lastInsertId();
    }

    public function insert(News $n){
        return $this->insertBrut($n->getTitre(),$n->getLien(),$n->getDescription(),$n->getDateNews(),$n->getId());
    }

    public function delete($id){
        $query = "DELETE FROM NEWS WHERE guid=:id";
        $argument=array(
            ':id'=>array($id,PDO::PARAM_STR)
        );
        $this->con->executeQuery($query,$argument);
    }

    public function find($id){
        $query = "SELECT * FROM NEWS WHERE guid=:id";
        $argument=array(
            ':id'=>array($id,PDO::PARAM_STR)
        );
        $this->con->executeQuery($query,$argument);
        return NewsFactory::creerNews($this->con->getResults());
    }

    public function findAll(){
        $query = "SELECT * FROM NEWS";
        $this->con->executeQuery($query);
        return NewsFactory::creerNews($this->con->getResults());
    }

    public function findN($placement,$nbElt=10){
        if(isset($placement) || $placement<1)$placement=1;
        $placement=($placement-1)*$nbElt;
        echo $placement ."-".$nbElt;
        $query = "SELECT * FROM NEWS ORDER BY date DESC LIMIT :x, :y";
        $argument=array(
            ':x'=>array($placement,PDO::PARAM_INT),
            ':y'=>array($nbElt,PDO::PARAM_INT)
        );
        $this->con->executeQuery($query, $argument);
        return NewsFactory::creerNews($this->con->getResults());
    }

    public function nbPage(){
        $query = "SELECT COUNT * FROM NEWS";
        echo "test";
        $this->con->executeQuery($query);
        echo "test";
        return $this->con->getResults()/10;
    }
}