<?php


class CommentModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
    }


    function addComment()
    {

        $req1 = $this->pdo->prepare('INSERT INTO `Comment` (`Id`, `NickName`, `Contents`, `CreationTimestamp`, `Post_Id`) 
        VALUES (NULL, ?, ?, now(), ?) ');

        extract($_POST);
        $req1->execute(array($nickName, $contents, $postId));
    }

    function getCommentByPostId($Id_Post)
    {
        $req =$this->pdo->prepare('SELECT * 
    FROM `Comment` 
    WHERE `Post_Id`=?
    ORDER BY `CreationTimestamp` DESC');

        $req->execute(array($Id_Post));
        $comments = $req->fetchAll();

        return ($comments);
    }

    function getAllComments()
    {
        $req =$this->pdo->prepare('SELECT * 
    FROM `Comment` 
    GROUP BY `Post_Id`
    ORDER BY `CreationTimestamp` DESC');

        $req->execute();
        $comments = $req->fetchAll();

        return ($comments);
    }
}
