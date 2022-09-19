<?php
include './model/postModel.php';
$p=new PostModel();
$p->addComment();
header('location:show_post.php?id_post='.$postId);







