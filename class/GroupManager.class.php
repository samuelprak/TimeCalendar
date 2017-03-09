<?php

class GroupManager
{
    protected $db;
    
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function add(Group $group){
        $requete = $this->db->prepare('INSERT INTO grp SET
            calid = :calid,
            name = :name,
            color = :color,
            type = :type,
            custom = :custom,
            url = :url,
            nivid = :nivid;');
        
        $requete->bindValue(':calid', $group->calid());
        $requete->bindValue(':name', $group->name());
        $requete->bindValue(':color', $group->color());
        $requete->bindValue(':type', $group->type());
        $requete->bindValue(':custom', $group->custom());
        $requete->bindValue(':url', $group->url());
        $requete->bindValue(':nivid', $group->nivid());
        
        $requete->execute();
        return $this->db->lastInsertId();
    }

    public function getUnique($id, $arrayclass = false){
        $requete = $this->db->prepare('SELECT * FROM grp WHERE id = :id');
        $requete->bindValue(':id', $id);
        $requete->execute();
        
        if($arrayclass)
            $requete->setFetchMode(PDO::FETCH_ASSOC);
        else
            $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Group');
        
        return $requete->fetch();
    }

    public function getListByGradeId($id, $arrayclass = false){
        $requete = $this->db->prepare('SELECT * FROM grp WHERE nivid = :id');
        $requete->bindValue(':id', $id);
        $requete->execute();
        
        if($arrayclass)
            $requete->setFetchMode(PDO::FETCH_ASSOC);
        else
            $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Group');

        $list = $requete->fetchAll();
        $requete->closeCursor();
        return $list;
    }
}
