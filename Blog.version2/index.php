<?php
// page1.php

session_start();
//var_dump($_SESSION);die;
$pdo=new PDO('mysql:host=localhost;dbname=blog;charset=utf8','root','');
$query = $pdo->query ('SELECT Post.Id, Title, Contents, CreationTimestamp, FirstName, LastName, Name
                       FROM Post
                       INNER JOIN Author ON Post.Author_Id = Author.Id
                       INNER JOIN Category ON Post.Category_Id = Category.Id
                       ORDER BY CreationTimestamp DESC
                       LIMIT 0, 10');
$posts=$query->fetchAll(PDO::FETCH_ASSOC);

//var_dump($posts); die();

$title="Accueil";
$template="index.phtml";


include 'layout.phtml';