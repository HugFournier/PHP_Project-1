<?php
/**
 * Created by PhpStorm.
 * User: quent
 * Date: 06/12/2017
 * Time: 15:04
 */


class XmlParserFlux
{
    private $path;
    private $result;

    //booléens
    private $item;
    private $guid;
    private $titre;
    private $heure;
    private $lien;
    private $description;

    private $n;

    private $tabNews;

    public function __construct($path)
    {
        $this -> path = $path;
        $this->item = false;
        $this -> guid = false;
        $this -> titre =false;
        $this -> heure = false;
        $this -> lien = false;
        $this -> description = false;
        $this -> tabNews= array();
        $this -> n = new News();
    }

    public function getTabNews() {
        return $this->tabNews;
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }


    public function parse()
    {
        ob_start();
        $xml_parser = xml_parser_create();
        xml_set_object($xml_parser, $this);
        xml_set_element_handler($xml_parser, "startElement", "endElement");
        xml_set_character_data_handler($xml_parser, 'characterData');
        if (!($fp = fopen($this -> path, "r"))) {
            die("could not open XML input");
        }

        while ($data = fread($fp, 4096)) {
            if (!xml_parse($xml_parser, $data, feof($fp))) {
                die(sprintf("XML error: %s at line %d",
                    xml_error_string(xml_get_error_code($xml_parser)),
                    xml_get_current_line_number($xml_parser)));
            }
        }

        $this -> result = ob_get_contents();
        ob_end_clean();
        fclose($fp);
        xml_parser_free($xml_parser);
    }


    private function startElement($parser, $name, $attrs)
    {

        $name=strtolower($name);
        if($name == "item"){

            $this->n = new News();
            $this->item = true;
        }
        if($this->item == true){
            if($name == "guid"){
                $this->guid=true;
            }
            if($name == "title"){
                $this->titre=true;
            }
            if($name == "pubdate"){
                $this->heure=true;
            }
            if($name == "link"){
                $this->lien=true;
            }
            if($name == "description" ){
                $this->description=true;
            }
        }

    }



    private function endElement($parser, $name)
    {
        $name=strtolower($name);
        if($name == "item"){
            //$this->displayNews();
            //$this->displayTest();
            $this->tabNews[] = $this->n;
            $this->item = false;

        }
        if($this->item == true) {
            if ($name == "guid") {
                $this->guid = false;
            }
            if ($name == "title") {
                $this->titre = false;
            }
            if ($name == "pubdate") {
                $this->heure = false;
            }
            if ($name == "link") {
                $this->lien = false;
            }
            if ($name == "description") {
                $this->description = false;
            }
        }
    }

    private function characterData($parser, $data)
    {
        $data = trim($data);

        if (strlen($data) > 0) {
            if($this->guid){
                $this-> n-> setGuid($data);
            }
            if($this->titre ){
                $this->n->setTitre($data);
            }
            if($this->heure){
                $this->n->setHeure($data);

            }
            if($this->lien){
                $this->n->setLien($data);

            }
            if($this->description){
                $this->n->setDescription($data);

            }

        }
    }
}
?>