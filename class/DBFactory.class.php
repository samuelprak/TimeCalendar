<?php

class DBFactory{
    
    public static function getMysqlConnexionWithPDO(){
        try{
            $db = new PDO('mysql:host=localhost;dbname=timecalendar', 'root', 'root');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $req = $db->prepare("SET NAMES 'utf8'");
            $req->execute();
            return $db;
        }
        catch(Exception $e){
            echo("Erreur de connexion à la base de données");
        }
    }
}
?>