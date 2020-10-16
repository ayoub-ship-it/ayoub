<?php

  try {

    $base = new PDO('mysql:host=localhost; dbname=webapp2k', 'root', '');

  }

  catch(exception $e) {

    die('Erreur '.$e->getMessage());

  }

?>