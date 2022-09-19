<?php
include_once 'model/authorModel.php';

function listAllAuthors()
{

    $a = new AuthorModel();
    $authors = $a->getAllauthor();

    $title = 'Accueil du blog de Tante Ursule';
    $template = 'views/authorView.phtml';
    include 'views/layout.phtml';

}   

function showAuthor($id){

}

switch ($action) {
    case 'list' :
        listAllAuthors();
        break;

    case 'show' :
         showAuthor($id);
         break;

    default: listAllAuthors();
}