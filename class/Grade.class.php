<?php 
class Grade{

    private $id,
            $name,
            $weekend,
            $colorBySubject,
            $universitycode;
    
    public function id(){
        return $this->id;
    }
    public function name(){
        return $this->name;
    }
    public function weekend(){
        return $this->weekend;
    }
    public function colorBySubject(){
        return $this->colorBySubject;
    }
    public function universitycode(){
        return $this->universitycode;
    }

    public function setId($id){
        $this->id = $id;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function setWeekend($weekend){
        $this->weekend = $weekend;
    }
    public function setColorBySubject($colorBySubject){
        $this->colorBySubject = $colorBySubject;
    }
    public function setUniversitycode($universitycode){
        $this->universitycode = $universitycode;
    }

}

 ?>