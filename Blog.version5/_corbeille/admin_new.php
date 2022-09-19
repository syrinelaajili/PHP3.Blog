<?php

$pdo=new PDO('mysql:host=localhost;dbname=blog;charset=utf8','root','');


if (array_key_exists('title',$_POST)) {

    $query = $pdo->prepare('INSERT INTO `Post`(`Id`, `Title`, `Contents`, `CreationTimestamp`, `Author_Id`, `Category_Id`) 
    VALUES(NULL, ?, ? , now(), ?, ?)');
    extract($_POST);
    $query->execute(array($title, $nouveauArticle, $authorId,$categoryId ));    
    $new_id = $pdo -> lastInsertId();
    header('location: show_post.php?id_post='.$new_id);
    exit();

};



$query1 = $pdo->query ('SELECT * FROM Category');
$categories=$query1->fetchAll(PDO::FETCH_ASSOC);



$query2 = $pdo->query ('SELECT * FROM Author');
$authors=$query2->fetchAll(PDO::FETCH_ASSOC);








$title="admin_new";
$template="admin_new.phtml";




include './views/layout.phtml';