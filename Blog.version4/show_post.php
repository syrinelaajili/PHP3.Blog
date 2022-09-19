<?php
include './model/postModel.php';
$p=new PostModel();
$post=$p->getPostById($_GET['id_post']);
$comments=$p->getCommentByPostId($_GET['id_post']);

$title="show_post";
$template="show_post.phtml";




include './views/layout.phtml';