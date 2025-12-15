<?php
include 'fonctions.php';
require 'connexion-bd.php';

$idSupp = $_GET['id'] ?? null;
if ( ! is_numeric($idSupp)) {
    dd("Cette conference n'existe pas !!!");
}

?>