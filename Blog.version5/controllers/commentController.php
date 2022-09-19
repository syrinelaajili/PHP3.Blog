<?php

include_once 'model/commentModel.php';

function listAllComments()
{

    $c = new CommentModel();
    $comments = $c->getAllComments();

    $title = 'Accueil du blog de Tante Ursule';
    $template = 'views/homeView.phtml';
    include 'views/layout.phtml';
}  

function addComment($comment)
{
    $c= new CommentModel();
    $c->addComment($comment);
}

switch ($action) {
    case 'list' :
        listAllComments();
        break;

    case 'show' :
         showPost($id);
         break;

    case 'add' :
        extract($_POST);
        addComment( [$nickName,$contents, $postId]);
        header('Location: index.php?page=post&action=show&id='.$postId);
        break;

    default: listAllComments();
}
