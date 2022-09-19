<?php
$pdo=new PDO('mysql:host=localhost;dbname=blog;charset=utf8','root','');
//var_dump($_POST); die();

$req1=$pdo->prepare('INSERT INTO `Comment` (`Id`, `NickName`, `Contents`, `CreationTimestamp`, `Post_Id`) 
VALUES (NULL, ?, ?, now(), ?) ');

extract($_POST);
$req1->execute(array($nickName,$contents,$postId));
//var_dump($post); die();

header('location:show_post.php?id_post='.$postId);







