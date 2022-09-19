<?php
include_once 'model/homeModel.php';

$p = new HomeModel();
$posts = $p->get10LatestPosts();

$title = 'Accueil du blog de Tante Ursule';
$template = 'views/homeView.phtml';
include 'views/layout.phtml';