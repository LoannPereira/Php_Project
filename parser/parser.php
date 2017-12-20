<?php

/**
 * Created by PhpStorm.
 * User: lopereira2
 * Date: 19/12/17
 * Time: 12:27
 */
require_once('../model/metier/FabriqueNews.php');
class Parser
{
    private $path;
    private $result;
    private $depth;


    //booleens
    private $inItem = false;
    private $lectTitre = false;
    private $lectDescr = false;
    private $lectDate = false;
    private $lectLien = false;
    private $lectCateg = false;
    private $lectGuid = false;

    //new créée
    private $nouvelle;
    private $tabRetour = array();

    public function __construct($path)
    {
        $this -> path = $path;
        $this -> depth = 0;
    }

    public function getResult() {
        return $this->result;
    }

    public function getTabRetour():array
    {
        return $this->tabRetour;
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
        if (strtolower($name) == 'item')
            $this->nouvelle=new FabriqueNews();

        $this->changerBool($name);

        $this -> depth++;
    }


    private function endElement($parser, $name)
    {
        $this -> depth--;
        $this->changerBool($name);

        if (strtolower($name) == 'item')
            $this->tabRetour[]=$this->nouvelle->creerNews();
    }

    private function characterData($parser, $data)
    {
        $data = trim($data);

        if (strlen($data) > 0)
        {
            if ($this->inItem)
            {
                //$data=Validation::nettoyerString($data);
                if ($this->lectTitre)       $this->nouvelle->setTitre($data);
                else if ($this->lectGuid)   $this->nouvelle->setGuid($data);
                else if ($this->lectDescr)  $this->nouvelle->setDescription($data);
                else if ($this->lectCateg)  $this->nouvelle->setCategorie($data);
                else if ($this->lectDate)   $this->nouvelle->setDate($data);
                else if ($this->lectLien)   $this->nouvelle->setLien($data);
            }
        }
    }


    private function changerBool($name){
        switch (strtolower($name))
        {
            case 'item' :
                $this->inItem = !$this->inItem;
                break;
            case 'title' :
                $this->lectTitre = !$this->lectTitre;
                break;
            case 'description' :
                $this->lectDescr = !$this->lectDescr;
                break;
            case 'pubdate' :
                $this->lectDate = !$this->lectDate;
                break;
            case 'category' :
                $this->lectCateg = !$this->lectCateg;
                break;
            case 'guid' :
                $this->lectGuid = !$this->lectGuid;
                break;
            case 'link' :
                $this->lectLien = !$this->lectLien;
                break;
            default:
                break;
        }
    }
}