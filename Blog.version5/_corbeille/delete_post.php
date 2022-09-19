<?php

$pdo=new PDO('mysql:host=localhost;dbname=blog;charset=utf8','root','');


$delete = $pdo->prepare ('DELETE FROM Post WHERE `Post`.`Id` = ?');
$delete->execute(array($_GET['id_post']));
header('Location: admin_index.php');
exit();










 

