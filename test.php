<?php

try{
    $rez = $base->prepare("select * from Products;");
    $rez = execute();
  } catch(Exception $e){
    echo $e->getMessage();
    die();
  }
  $produits = $rez->FetchAll(PDO::FETCH_ASSOC);
  $items = array();
  foreach($produits as $produit){
    $items[] = $produit;
  }

  print_r($items);

  ?>