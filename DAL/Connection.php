<?php

/**
 * Created by PhpStorm.
 * User: hufournier
 * Date: 15/11/17
 * Time: 15:16
 */
class Connection extends PDO
{
    private $stmt;

    public function __construct($dsn, $username, $passwd)
    {
        try {
            parent::__construct($dsn, $username, $passwd);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new Exception("Connexion à la base impossible");
        }
    }

    public function executeQuery($query, array $parameters = [])
    {
        try {
            $this->stmt = parent::prepare($query);
            foreach ($parameters as $name => $value)
                $this->stmt->bindValue($name, $value[0], $value[1]);
            return $this->stmt->execute();
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                throw new Exception("violation contrainte");
            }
            throw new Exception("Requête SQL impossible");
        }
    }

    public function getResults()
    {
        try {
            return $this->stmt->fetchall();
        } catch (PDOException $e) {
            throw new Exception("Problème résultat requête SQL");
        }
    }
}
