<?php

class Group{
    private $id,
            $calid,
            $name,
            $color,
            $type,
            $custom,
            $url,
            $nivid;
            
    public function __construct($valeurs = array())
    {
        if (!empty($valeurs)){
            $this->hydrate($valeurs);
        }
    }

    public function hydrate($donnees){
        foreach ($donnees as $attribut => $valeur){
            $methode = 'set'.ucfirst($attribut);

            if (is_callable(array($this, $methode))){
                $this->$methode($valeur);
            }
        }
    }

    public function id(){
        return $this->id;
    }
    public function calid(){
        return $this->calid;
    }
    public function name(){
        return $this->name;
    }
    public function color(){
        return $this->color;
    }
    public function type(){
        return $this->type;
    }
    public function custom(){
        return $this->custom;
    }
    public function url(){
        return $this->url;
    }
    public function nivid(){
        return $this->nivid;
    }

    public function setId($id){
        $this->id = $id;
    }
    public function setCalid($calid){
        $this->calid = $calid;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function setColor($color){
        $this->color = $color;
    }
    public function setType($type){
        $this->type = $type;
    }
    public function setCustom($custom){
        $this->custom = $custom;
    }
    public function setUrl($url){
        $this->url = $url;
    }
    public function setNivid($nivid){
        $this->nivid = $nivid;
    }


}