<?php
$pdo=new PDO('mysql:host=localhost;dbname=blog;charset=utf8','root','');

$req1=$pdo->prepare('SELECT Post.Id, Title, Contents, CreationTimestamp, FirstName, LastName, Name
               FROM Post
               INNER JOIN Author ON Author.Id = Post.Author_Id
               INNER JOIN Category ON Category.Id = Post.Category_Id
               WHERE Post.Id = ? ');

$req1->execute(array($_GET['id_post']));
$post=$req1->fetch(PDO::FETCH_ASSOC);
//var_dump($post); die();


$req2=$pdo->prepare('SELECT * 
                     FROM `Comment` 
                     WHERE `Post_Id`=?
                     ORDER BY `CreationTimestamp` DESC');

$req2->execute(array($_GET['id_post']));
$comments=$req2->fetchAll();





$title="show_post";
$template="show_post.phtml";




include 'layout.phtml';