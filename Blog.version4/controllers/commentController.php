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

switch ($action) {
    case 'list' :
        listAllPosts();
        break;

    case 'show' :
         showPost($id);
         break;

    default: listAllPosts();
}
