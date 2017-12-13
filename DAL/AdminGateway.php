<?php

/**
 * Created by PhpStorm.
 * User: hufournier
 * Date: 30/11/17
 * Time: 14:25
 */
class AdminGateway
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

    public function verifConnection($id, $mdp)
    {
        $query = "SELECT mdp FROM Admin WHERE ID LIKE :id";

        $argument = array(
            ':id' => array($id, PDO::PARAM_STR)
        );

        $this->con->executeQuery($query, $argument);
        $result=$this->con->getResults();

        return password_verify($mdp,$result[0]['mdp']);
    }
}
