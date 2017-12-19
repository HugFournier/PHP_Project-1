<?php

/**
 * Classe parsant un fichier xml et affichant les informations sous la forme
 * d'une hierarchie de texte
 */
class Parseur
{
    private $path;
    private $element = null;
    private $result;
    private $listeNews;

    private $elementsCible = ["title", "link", "description", "pubdate", "guid"]; // attention ! les cibles doivent être en minuscule

    public function __construct(String $path)
    {
        $this->path      = $path;
        $this->listeNews = array();
    }

    private function initialiseElement()
    {
        $this->element = array_combine($this->elementsCible, array_fill(0, sizeof($this->elementsCible), array(false, null)));
    }

    /**
     * @return mixed
     */
    public function getResult(): String
    {
        return $this->result;
    }

    /**
     * @return array
     */
    public function getListeNews(): array
    {
        return $this->listeNews;
    }

    /**
     * Parse le fichier et met le resultat dans Result
     */
    public function parse()
    {
        ob_start();
        $xml_parser = xml_parser_create();
        xml_set_object($xml_parser, $this);
        xml_set_element_handler($xml_parser, "startElement", "endElement");
        xml_set_character_data_handler($xml_parser, 'characterData');
        if (!($fp = fopen($this->path, "r"))) {
            die("could not open XML input");
        }

        while ($data = fread($fp, 4096)) {
            if (!xml_parse($xml_parser, $data, feof($fp))) {
                die(sprintf("XML error: %s at line %d",
                    xml_error_string(xml_get_error_code($xml_parser)),
                    xml_get_current_line_number($xml_parser)));
            }
        }

        $this->result = ob_get_contents();
        ob_end_clean();
        fclose($fp);
        xml_parser_free($xml_parser);
    }

    private function startElement($parser, $name, $attrs)
    {
        $name = strtolower($name);
        if ($name == "item") {
            $this->initialiseElement();
        }
        $this->switchBoolean($name);
        //echo $name;
        //var_dump($this->element);
    }

    private function endElement($parser, $name)
    {
        $name = strtolower($name);
        if ($name == "item") {
            $news = array();
            foreach ($this->elementsCible as $key) {
                $news[$key] = $this->element[$key][1];
            }
            $news['origine']   = $this->path;
            $this->listeNews[] = $news; //ajouter la new au tableau
            $this->element     = null;
        }
        $this->switchBoolean($name);
    }

    private function characterData($parser, $data)
    {
        $data = trim($data);

        if (strlen($data) > 0) {
            $balise = array_search(array(true, null), $this->element);
            if ($balise != false) {
                $this->element[$balise][1] = $data;
            }
        }
    }

    private function switchBoolean($name)
    {
        if (isset($this->element)) {
            if (array_key_exists($name, $this->element)) {
                $this->element[$name][0] ^= true;
            }
        }
    }
}

?>
