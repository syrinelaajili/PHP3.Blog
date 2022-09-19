<?php

include './model/postModel.php';

$datas = editPostById();
$categories=$datas['categories'];
$article=$datas['article'];
$authors=$datas['authors'];

$title="edit_post";
$template="edit_post.phtml";
include 'layout.phtml';