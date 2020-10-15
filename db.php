<?php

  try {

    $base = new PDO('mysql:host=localhost; dbname=ecommerce', 'root', 'p@ssF4cileDB45');

  }

  catch(exception $e) {

    die('Erreur '.$e->getMessage());

  }

?>