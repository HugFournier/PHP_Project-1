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
        $query    = "SELECT lien FROM `Flux` WHERE `Flux`.`ID` = :id; ";
        $argument = array(
            ':id' => array($id, PDO::PARAM_STR)
        );
        $this->con->executeQuery($query, $argument);

        $lien = $this->con->getResults()[0]["lien"];

        $query    = "DELETE from `NEWS` WHERE origine like :lien;
                DELETE FROM `Flux` WHERE lien like :lien;";
        $argument = array(
            ':lien' => array($lien, PDO::PARAM_STR)
        );

        $this->con->executeQuery($query, $argument);
    }

    public function findAll()
    {
        $query = "SELECT * FROM Flux";
        $this->con->executeQuery($query);
        return (new FluxFactory())->creerFlux($this->con->getResults());
    }
}
