<?php

class HomeModel {
    private $pdo;

    public function __construct()
    {
        $this->pdo = new MonPdo();
    }

    function get10LatestPosts()
    {
        $sql='SELECT Post.Id, Title, Contents, image, CreationTimestamp, FirstName, LastName, Name
        FROM Post
        INNER JOIN Author ON Post.Author_Id = Author.Id
        INNER JOIN Category ON Post.Category_Id = Category.Id
        ORDER BY CreationTimestamp DESC
        LIMIT 0, 10';

        //retourne la liste de tous les postes
        return $this->pdo->queryAll($sql, []); 
    }

}