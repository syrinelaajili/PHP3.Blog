<?php
class MonPdo {

    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
    }

//select qui retourne plusieurs résultats
    function queryAll($sql, $param) {
        $reponse=$this->pdo->prepare($sql);
        $reponse->execute($param);
        return $reponse->fetchAll(PDO::FETCH_ASSOC);
    }

//select qui retourne un seul résultat
    function queryOne($sql, $param) {
        $reponse=$this->pdo->prepare($sql);
        $reponse->execute($param);
        return $reponse->fetch(PDO::FETCH_ASSOC);
    }
    
//pour éxecuter des requetes de types Insert Update Delete
    function executeSql($sql, $param) {
        $reponse=$this->pdo->prepare($sql);
        $reponse->execute($param);
        return $this->pdo->lastInsertId();
    }
}
