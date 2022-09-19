<?php

if (array_key_exists('email', $_POST)&&array_key_exists('password', $_POST)) {
    $pdo=new PDO('mysql:host=localhost;dbname=blog;charset=utf8','root','');
    
    $req4=$pdo->prepare('SELECT * FROM User WHERE User_Email = ? AND User_Password = ? ');
    extract($_POST);
    $req4->execute(array($email,$password));
    $user=$req4->fetch(PDO::FETCH_ASSOC);
    $nbr=$req4->rowCount();
    if ($nbr!=0) {
       $_SESSION['user']=['email'=>$email,'password'=>$password];
       header('location: admin_index.php');
       exit();
    }
}

$title="login";
$template="login.phtml";
include './views/layout.phtml';