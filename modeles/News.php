<?php

/**
 * Created by PhpStorm.
 * User: hufournier
 * Date: 16/11/17
 * Time: 14:20
 */
class News
{
    private $id;
    private $dateNews;
    private $description;
    private $titre;
    private $lien;

    /**
     * News constructor.
     * @param $dateNews
     * @param $description
     * @param $titre
     * @param $lien
     */
    public function __construct($titre, $lien, $description, $dateNews=null, $id=null)
    {
        if($dateNews==null){
            $dateNews=date('Y-m-d h:i:s');
        }
        if($id==null){
            $id=$lien;
        }
        $this->id = $id;
        $this->dateNews = $dateNews;
        $this->description = $description;
        $this->titre = $titre;
        $this->lien = $lien;
    }

    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param null $id
     */
    private function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return false|null|string
     */
    public function getDateNews()
    {
        return $this->dateNews;
    }

    /**
     * @param false|null|string $dateNews
     */
    private function setDateNews($dateNews)
    {
        $this->dateNews = $dateNews;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    private function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    private function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * @return mixed
     */
    public function getLien()
    {
        return $this->lien;
    }

    /**
     * @param mixed $lien
     */
    private function setLien($lien)
    {
        $this->lien = $lien;
    }

    public function __toString()
    {
        return $this->getId()."|".$this->getDateNews()."|".$this->getTitre()."|".$this->getDescription()."|".$this->getLien();
    }


}