<?php 

class University{
    private $code,
            $name,
            $url;

    public function code(){
        return $this->code;
    }
    public function name(){
        return $this->name;
    }
    public function url(){
        return $this->url;
    }

    public function setCode($code){
        $this->code = $code;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function setUrl($url){
        $this->url = $url;
    }
}

 ?>