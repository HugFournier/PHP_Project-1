<?php

class FluxGateway
{
    private $con;

    /**********************************************************************
     * FluxGateway constructor.
     * @param $con
     **********************************************************************/
    public function __construct($con)
    {
        $this->con = $con;
    }

    public function insertBrut($id, $lien)
    {
        $query = "INSERT INTO `Flux` (`ID`, `lien`) VALUES (:id, :lien)";

        $argument = array(
            ':id' => array($id, PDO::PARAM_STR),
            ':lien' => array($lien, PDO::PARAM_STR)
        );
        $this->con->executeQuery($query, $argument);

        return $this->con->lastInsertId();
    }

    public function insert(Flux $f)
    {
        return $this->insertBrut($f->getId(), $f->getLien());
    }

    public function delete($id)
    {
        $query = "DELETE FROM `Flux` WHERE `Flux`.`ID` = :id";
        $argument = array(
            ':id' => array($id, PDO::PARAM_STR)
        );
        $this->con->executeQuery($query, $argument);
    }

    /*
    public function find($id){
        $query = "SELECT * FROM FLUX WHERE id=:id";
        $argument = array(
            ':id'=>array($id, PDO::PARAM_STR)
        );
        $this->con->executeQuery($query, $argument);
        return (new FluxFactory())->creerFlux($this->con->getResults());
    }
    */

    public function findAll()
    {
        $query = "SELECT * FROM Flux";
        $this->con->executeQuery($query);
        //foreach($l as $r)$retour[]=new News($r['titre'],$r['lien'],$r['description'],$r['date'],$r['guid']);
        return (new FluxFactory())->creerFlux($this->con->getResults());
    }
}
