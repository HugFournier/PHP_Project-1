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
        $this->id   = $id;
        $this->lien = $lien;
    }

    /**********************************************************************
     * @return mixed
     **********************************************************************/
    public function getId(): string
    {
        return $this->id;
    }

    /**********************************************************************
     * @param mixed $id
     **********************************************************************/
    private function setId(string $id)
    {
        $this->id = $id;
    }

    /**********************************************************************
     * @return mixed
     **********************************************************************/
    public function getLien(): string
    {
        return $this->lien;
    }

    /**********************************************************************
     * @param mixed $lien
     **********************************************************************/
    private function setLien(string $lien)
    {
        $this->lien = $lien;
    }

    public function __toString(): string
    {
        return "|_" . $this->getId() . "_|_<a href=https://" . $this->getLien() . ">Lien</a>_|";
    }


}
