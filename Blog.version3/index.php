<?php
session_start();
include './model/postModel.php';
$posts=getAllPosts();
$title="Accueil";
$template="index.phtml";


include 'layout.phtml';