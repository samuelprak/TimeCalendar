<?php

class GradeManager
{
    protected $db;
    
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getUnique($id, $arrayclass = false){
        $requete = $this->db->prepare('SELECT * FROM niv WHERE id = :id');
        $requete->bindValue(':id', $id);
        $requete->execute();
        
        if($arrayclass)
            $requete->setFetchMode(PDO::FETCH_ASSOC);
        else
            $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Grade');
        
        return $requete->fetch();
    }

    public function getListByUniversityCode($code, $arrayclass = false){
        $requete = $this->db->prepare('SELECT * FROM niv WHERE universitycode = :code');
        $requete->bindValue(':code', $code);
        $requete->execute();
        
        if($arrayclass)
            $requete->setFetchMode(PDO::FETCH_ASSOC);
        else
            $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Grade');

        $list = $requete->fetchAll();
        $requete->closeCursor();
        return $list;
    }
}
