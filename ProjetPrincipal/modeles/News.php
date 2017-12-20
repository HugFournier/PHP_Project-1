<?php

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
    public function __construct(string $titre, string $lien, string $description, string $dateNews = null, string $id = null)
    {
        if ($dateNews == null) {
            $dateNews = date('Y-m-d h:i:s');
        }
        if (gettype($dateNews) != "string") {
            $dateNews = date("Y-m-d H:i:s", strtotime($dateNews));
        }
        if ($id == null) {
            $id = $lien;
        }
        $this->id          = $id;
        $this->dateNews    = $dateNews;
        $this->description = $description;
        $this->titre       = $titre;
        $this->lien        = $lien;
    }

    /**
     * @return null
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param null $id
     */
    private function setId(string $id)
    {
        $this->id = $id;
    }

    /**
     * @return false|null|string
     */
    public function getDateNews(): string
    {
        return $this->dateNews;
    }

    /**
     * @param false|null|string $dateNews
     */
    private function setDateNews(string $dateNews)
    {
        $this->dateNews = $dateNews;
    }

    /**
     * @return mixed
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    private function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getTitre(): string
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    private function setTitre(string $titre)
    {
        $this->titre = $titre;
    }

    /**
     * @return mixed
     */
    public function getLien(): string
    {
        return $this->lien;
    }

    /**
     * @param mixed $lien
     */
    private function setLien(string $lien)
    {
        $this->lien = $lien;
    }

    public function __toString(): string
    {
        return "|_" . $this->getId() . "_|_" . $this->getDateNews() . "_|_" . $this->getTitre() . "_|_" . $this->getDescription() . "_|_<a href=https://" . $this->getLien() . ">Lien</a>_|";
    }


}
