<?php

require 'vendor/autoload.php';
require 'MyExtension.php';
require "db.php";

// Routing.
$page = 'home';
if (isset($_GET['p'])) {
    $page = $_GET['p'];
}

// Template rendering.
$loader = new Twig_Loader_Filesystem(__DIR__ . '/templates');
$twig = new Twig_Environment($loader, array(
  'cache' => __DIR__ . '/cache',
  //'cache' => FALSE,
  'debug' => TRUE
));
$twig->addExtension(new MyExtension());
$twig->addExtension(new Twig_Extensions_Extension_Text());
$twig->addGlobal('current_page', $page);

switch ($page) {
  case 'home':
    $values = array(
      'seo' => array(
        'title' => 'Home page',
      ),
      'person' => array(
        'name' => 'Nassim'
      )
    );
    echo $twig->render('home.twig', $values);
    break;
  case 'contact':
    $values = array(
      'contact' => array(
        'email' => 'ayoub.khazzar@cpe.fr'
      )
    );
    echo $twig->render('contact.twig', $values);
    break;
  case 'produits':
    try{
      $stmt = $base->prepare("select * from Products;");
      $stmt->execute();
    } catch(Exception $e){
      echo $e->getMessage();
      die();
    }
    $items = array();
    while($produit = $stmt->fetch()){
      $items[] = $produit;
    }
    echo $twig->render('produits.twig', array('item' => $items)); //essayer d'afficher la liste des produits de la BDD
   
    break;
  case 'panier':
    echo $twig->render('panier.twig');
    break;
  default:
    header('HTTP/1.0 404 Not Found');
    echo $twig->render('404.twig');
    break;
}


