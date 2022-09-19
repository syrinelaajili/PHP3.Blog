<?php

include './model/postModel.php';
$p=new PostModel();
$datas = $p->editPostById();
$categories=$datas['categories'];
$article=$datas['article'];
$authors=$datas['authors'];

$title="edit_post";
$template="edit_post.phtml";
include './views/layout.phtml';