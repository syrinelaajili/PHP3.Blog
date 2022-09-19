<?php

$pdo=new PDO('mysql:host=localhost;dbname=blog;charset=utf8','root','');


if (array_key_exists('title',$_POST)) {

    $query = $pdo->prepare('UPDATE `Post` SET `Title` = ?, `Contents` = ?, `Author_Id` = ?, `Category_Id` = ? WHERE `Post`.`Id` = ?');
    extract($_POST);
    $query->execute(array($title, $nouveauArticle, $authorId,$categoryId, $postId ));    
    header('location: show_post.php?id_post='.$postId);
    exit();

}



$query1 = $pdo->query ('SELECT * FROM Category');
$categories=$query1->fetchAll(PDO::FETCH_ASSOC);



$query2 = $pdo->query ('SELECT * FROM Author');
$authors=$query2->fetchAll(PDO::FETCH_ASSOC);


$query3 = $pdo->prepare ('SELECT * FROM Post WHERE Id=?');
$query3->execute(array($_GET['id_post']));
$article=$query3->fetch(PDO::FETCH_ASSOC);







$title="edit_post";
$template="edit_post.phtml";
include 'layout.phtml';