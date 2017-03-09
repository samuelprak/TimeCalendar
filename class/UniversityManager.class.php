<?php

class UniversityManager
{
    protected $db;
    
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function add(University $university)
    {
        $requete = $this->db->prepare('INSERT INTO ets
            SET code = :code,
            name = :name,
            url = :url');

        $requete->bindValue(':code', $university->code());
        $requete->bindValue(':name', $university->name());
        $requete->bindValue(':url', $university->url());

        $requete->execute();
        return $this->db->lastInsertId();
    }

    public function getUnique($code, $arrayclass = false){
        $requete = $this->db->prepare('SELECT * FROM ets WHERE code = :code');
        $requete->bindValue(':code', $code);
        $requete->execute();
        
        if($arrayclass)
            $requete->setFetchMode(PDO::FETCH_ASSOC);
        else
            $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'University');
        
        return $requete->fetch();
    }

    public function getList($arrayclass = false){
        $requete = $this->db->query('SELECT * FROM ets');

        if($arrayclass)
            $requete->setFetchMode(PDO::FETCH_ASSOC);
        else
            $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'University');

        $list = $requete->fetchAll();
        $requete->closeCursor();
        return $list;
    }
}

?>