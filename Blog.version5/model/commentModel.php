<?php


class CommentModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new MonPdo();
    }


    function addComment($comment)
    {

        $sql ='INSERT INTO `Comment` (`Id`, `NickName`, `Contents`, `CreationTimestamp`, `Post_Id`) 
        VALUES (NULL, ?, ?, now(), ?) ';
        $newId=$this->pdo->executeSql($sql, $comment);
        return $newId;
    }

    function getCommentByPostId($Id_Post)
    {
        $sql ='SELECT * 
               FROM `Comment` 
               WHERE `Post_Id`=?
               ORDER BY `CreationTimestamp` DESC';

        $comments = $this->pdo->queryAll($sql, [$Id_Post]);

        return ($comments);
    }

    function getAllComments()
    {
        $sql ='SELECT * 
               FROM `Comment` 
               GROUP BY `Post_Id`
               ORDER BY `CreationTimestamp` DESC';

        return $this->pdo->queryAll($sql, []);
    }
}
