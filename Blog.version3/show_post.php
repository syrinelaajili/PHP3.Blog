<?php
include './model/postModel.php';
$post=getPostById($_GET['id_post']);


$comments=getCommentByPostId($_GET['id_post']);


$title="show_post";
$template="show_post.phtml";




include 'layout.phtml';