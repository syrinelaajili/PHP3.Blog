<?php


class CategoryModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new MonPdo();
    }

    function getAllCategories()
    {

        $sql = 'SELECT * FROM `Category`';
        $categories = $this->pdo->queryAll($sql,[]);
        return ($categories);
    }


    // function addComment()
    // {

    //     // $req1 = $this->pdo->prepare('INSERT INTO `Comment` (`Id`, `NickName`, `Contents`, `CreationTimestamp`, `Post_Id`) 
    //     // VALUES (NULL, ?, ?, now(), ?) ');

    //     // extract($_POST);
    //     // $req1->execute(array($nickName, $contents, $postId));
    // }

    // function getPostById($Id_Post)
    // {
    //     // $req1 =$this->pdo->prepare('SELECT Post.Id, Title, Contents, CreationTimestamp, FirstName, LastName, Name
    //     //            FROM Post
    //     //            INNER JOIN Author ON Author.Id = Post.Author_Id
    //     //            INNER JOIN Category ON Category.Id = Post.Category_Id
    //     //            WHERE Post.Id = ? ');

    //     // $req1->execute(array($Id_Post));
    //     // $post = $req1->fetch(PDO::FETCH_ASSOC);
    //     // return ($post);
    // }

    // function getCommentByPostId($Id_Post)
    // {
    //     $req2 =$this->pdo->prepare('SELECT * 
    // FROM `Comment` 
    // WHERE `Post_Id`=?
    // ORDER BY `CreationTimestamp` DESC');

    //     $req2->execute(array($Id_Post));
    //     $comments = $req2->fetchAll();

    //     return ($comments);
    // }

    // function editPostById()
    // {
    //     if (array_key_exists('title', $_POST)) {

    //         $query =$this->pdo->prepare('UPDATE `Post` SET `Title` = ?, `Contents` = ?, `Author_Id` = ?, `Category_Id` = ? WHERE `Post`.`Id` = ?');
    //         extract($_POST);
    //         $query->execute(array($title, $nouveauArticle, $authorId, $categoryId, $postId));
    //         header('location: show_post.php?id_post=' . $postId);
    //         exit();
    //     }



    //     $query1 = $this->pdo->query('SELECT * FROM Category');
    //     $categories = $query1->fetchAll(PDO::FETCH_ASSOC);

    //     $query2 = $this->pdo->query('SELECT * FROM Author');
    //     $authors = $query2->fetchAll(PDO::FETCH_ASSOC);

    //     $query3 = $this->pdo->prepare('SELECT * FROM Post WHERE Id=?');
    //     $query3->execute(array($_GET['id_post']));
    //     $article = $query3->fetch(PDO::FETCH_ASSOC);

    //     return ["article" => $article, "categories" => $categories, "authors" => $authors];
    // }

}
