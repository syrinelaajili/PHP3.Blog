<?php
include 'library/MonPdo.php';

if (isset($_GET['page']) AND !empty($_GET['page'])){
    $page = trim (strtolower($_GET['page']));
} else {
    $page = 'home';
}

if (isset($_GET['action']) AND !empty($_GET['action'])){
    $action = trim (strtolower($_GET['action']));
} else {
    $action = 'list';
}

if (isset($_GET['id']) AND !empty($_GET['id'])){
    $id = trim (strtolower($_GET['id']));
} else {
    $id = null;
}


$allPages = scandir('controllers/');

if(in_array($page.'Controller.php',$allPages)) {
   //include_once 'model/'.($page).'Model.php';
   include_once 'controllers/'.$page. 'Controller.php';
   //include_once 'views/' .$page.'View.php';

}else{
    echo 'Erreur 404 : File not found';
}

