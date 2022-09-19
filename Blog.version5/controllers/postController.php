<?php
include_once 'model/postModel.php';
include_once 'model/commentModel.php';
include_once 'model/categoryModel.php';
include_once 'model/authorModel.php';


function listAllPosts()
{

    $p = new PostModel();
    $posts = $p->getAllPosts();
    $nbrePosts = count($posts);

    $title = 'Accueil du blog de Tante Ursule';
    $template = 'views/listPostView.phtml';
    include 'views/layout.phtml';
}

function showPost($id)
{
    $p = new PostModel();
    $post = $p->getPostById($id);

    $c = new CommentModel();
    $comments = $c->getCommentByPostId($id);

    $title = "Détail d'un article";
    $template = "./views/show_post.phtml";
    include './views/layout.phtml';
}

function addPost()
{
    $c = new CategoryModel();
    $categories = $c->getAllCategories();

    $a = new AuthorModel();
    $authors = $a->getAllAuthors();
    if (!empty($_POST)) {

        $target_dir = "uploads/";
        $imgName = $_FILES["fileToUpload"]["name"];
        $target_file = $target_dir . basename($imgName);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);


        $p = new PostModel();
        $p->addPost($_POST['title'], $_POST['content'], $_POST['authorId'], $_POST['categoryId'],$imgName);

        header('Location: index.php?page=post&action=list');
        exit;
    }
    $title = "admin_new";
    $template = "./views/addPostView.phtml";

    include './views/layout.phtml';
}

function editPost ($id)
{
    $c = new CategoryModel();
    $categories = $c->getAllCategories();

    $a = new AuthorModel();
    $authors = $a->getAllAuthors();
    
    
    $p = new PostModel();
    $article = $p->getPostById($id);


    if (!empty($_POST)) {
        $p = new PostModel();
        $p->editPostById($_POST['title'], $_POST['content'], $_POST['authorId'], $_POST['categoryId'],$id);

        header('Location: index.php?page=post&action=list');
        exit;
    }
    $title = "admin_new";
    $template = "./views/editPostView.phtml";

    include './views/layout.phtml';

}

function deletePost ($id)
{
    $p = new PostModel();
    $post= $p->deletePost($id);

    header('Location: index.php?page=post&action=list');
    exit();

}


switch ($action) {
    case 'list':
        listAllPosts();
        break;

    case 'add':
        addPost();
        break;
        case 'edit':
        editPost($id);
        break;
    case 'delete' :
        deletePost($id);
        break;

    case 'show':
        showPost($id);
        break;

    default:
        listAllPosts();
}
