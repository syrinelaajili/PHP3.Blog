<?php

class HomeModel {
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
    }

    function getAllPosts()
    {

        $query = $this->pdo->query('SELECT Post.Id, Title, Contents, CreationTimestamp, FirstName, LastName, Name
                       FROM Post
                       INNER JOIN Author ON Post.Author_Id = Author.Id
                       INNER JOIN Category ON Post.Category_Id = Category.Id
                       ORDER BY CreationTimestamp DESC
                       LIMIT 0, 10');
        $query->execute();

        $posts = $query->fetchAll(PDO::FETCH_ASSOC);


        return ($posts);
    }

}