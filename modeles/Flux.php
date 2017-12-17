<?php

class Flux
{
    private $id;
    private $lien;

    /**********************************************************************
     * Flux constructor.
     * @param $id
     * @param $lien
     **********************************************************************/
    public function __construct($id, $lien)
    {
        if ($id == null) {
            $id = $lien;
        }
        $this->id = $id;
        $this->lien = $lien;
    }

    /**********************************************************************
     * @return mixed
     **********************************************************************/
    public function getId()
    {
        return $this->id;
    }

    /**********************************************************************
     * @param mixed $id
     **********************************************************************/
    private function setId($id)
    {
        $this->id = $id;
    }

    /**********************************************************************
     * @return mixed
     **********************************************************************/
    public function getLien()
    {
        return $this->lien;
    }

    /**********************************************************************
     * @param mixed $lien
     **********************************************************************/
    private function setLien($lien)
    {
        $this->lien = $lien;
    }

    public function __toString()
    {
        return "|_" . $this->getId() . "_|_<a href=https://" . $this->getLien() . ">Lien</a>_|";
    }


}
