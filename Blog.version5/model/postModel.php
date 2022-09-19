<?php


class PostModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo =  new MonPdo();
    }

    function getAllPosts()
    {

        $sql = 'SELECT Post.Id, Title, Contents, CreationTimestamp, FirstName, LastName, Name
               FROM Post
               INNER JOIN Author ON Post.Author_Id = Author.Id
               INNER JOIN Category ON Post.Category_Id = Category.Id
               ORDER BY CreationTimestamp DESC
               LIMIT 0, 10';

        return $this->pdo->queryAll($sql, []);
    }

    function getPostById($Id_Post)
    {
        $sql = 'SELECT Post.Id, Title, Contents, CreationTimestamp, FirstName, LastName, Name ,Category_Id,Author_Id
               FROM Post
               INNER JOIN Author ON Author.Id = Post.Author_Id
               INNER JOIN Category ON Category.Id = Post.Category_Id
               WHERE Post.Id = ? ';

        return $this->pdo->queryOne($sql, [$Id_Post]);
    }


    function addPost($Title, $Contents, $Author_Id, $Category_Id,$image)
    {
        $sql = 'INSERT INTO `Post`(`Title`, `Contents`, `CreationTimestamp`, `Author_Id`, `Category_Id`,`image`) VALUES (?,?,Now(),?,?,?)';

        return $this->pdo->executeSql($sql, [$Title, $Contents, $Author_Id, $Category_Id,$image]);
    }




    function editPostById($title, $nouveauArticle, $authorId, $categoryId, $postId)
    {

        $sql = 'UPDATE `Post` SET `Title` = ?, `Contents` = ?, `Author_Id` = ?, `Category_Id` = ? WHERE `Post`.`Id` = ?';

        $this->pdo->executeSql($sql,array($title, $nouveauArticle, $authorId, $categoryId, $postId));

    }


    function deletePost($Id_Post)
    {
        $sql = 'DELETE FROM Post WHERE `Post`.`Id` = ?';

        return $this->pdo->executeSql($sql, [$Id_Post]);

    }
}
