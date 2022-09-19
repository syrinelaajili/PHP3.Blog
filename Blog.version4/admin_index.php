<?php

$pdo=new PDO('mysql:host=localhost;dbname=blog;charset=utf8','root','');
$query = $pdo->query ('SELECT Post.Id, Title, Contents, CreationTimestamp, FirstName, LastName, Name
                       FROM Post
                       INNER JOIN Author ON Post.Author_Id = Author.Id
                       INNER JOIN Category ON Post.Category_Id = Category.Id
                       ORDER BY CreationTimestamp DESC
                       LIMIT 0, 10');
$posts=$query->fetchAll();

$nbrePosts = $query->rowCount();





$title="admin_index";
$template="admin_index.phtml";




include './views/layout.phtml';