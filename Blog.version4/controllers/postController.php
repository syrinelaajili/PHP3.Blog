<?php
include_once 'model/postModel.php';
include_once 'model/commentModel.php';

function listAllPosts()
{

    $p = new PostModel();
    $post = $p->getAllPosts();

    $title = 'Accueil du blog de Tante Ursule';
    $template = 'views/homeView.phtml';
    include 'views/layout.phtml';
}   
function showPost($id)
{
    $p = new PostModel();
    $post = $p->getPostById($id);

    $c = new CommentModel();
    $comments=$c->getCommentByPostId($id);

    $title = "Détail d'un article";
    $template = "./views/show_post.phtml";
    include './views/layout.phtml';
}

// function deletePost ($id)
// {
//     $p = new PostModel();
//     $posts = $p->deletePost($id);
// }

switch ($action) {
    case 'list' :
        listAllPosts();
        break;

    // case 'delete' :
    //     deletePost($id);
    //     listAllPosts();
    //     break;

    case 'show' :
         showPost($id);
         break;

    default: listAllPosts();
}
