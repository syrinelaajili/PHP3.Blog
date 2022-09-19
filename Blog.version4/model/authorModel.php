<?php


class AuthorModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
    }

    function getAllAuthor()
    {

        $query = $this->pdo->query('SELECT * FROM `Author`');
        $query->execute();

        $authors = $query->fetchAll(PDO::FETCH_ASSOC);


        return ($authors);
    }


    function getAuthorById($id)
    {
        $req1 =$this->pdo->prepare('SELECT * FROM `Author` WHERE `Id` = ?');

        $req1->execute(array($id));
        $author = $req1->fetch(PDO::FETCH_ASSOC);
        return ($author);
    }

    
    function editAuthorById($id)
    {
        if (array_key_exists('name', $_POST)) {

            $query =$this->pdo->prepare('UPDATE `Author` SET `FirstName`=?,`LastName`=? WHERE `Id`=?');
            extract($_POST);
            $query->execute(array($FirstName,$LastName,$Id,$id));
            //header('location: show_post.php?id_post=' . $postId);
            exit();
        }
    }

    function deleteAuthorById($id)
    {
        $query =$this->pdo->prepare('DELETE FROM `Author` WHERE `Id`=?');
            $query->execute($id);
        
    }

}
