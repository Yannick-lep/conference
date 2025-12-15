<?php
include 'fonctions.php';
require 'connexion-bd.php';

$idVoir = $_GET['id'] ?? null;
if ( ! is_numeric($idSupp)) {
    dd("Cette conference n'existe pas !!!");
}
$pdo = new PDO($dsn, $user, $pass, $options);
$stm = $pdo->prepare("SELECT * FROM participants where id = :id");
$stm->bindParam(':id', $idVoir, PDO::PARAM_INT);
$stmConf = $stm->execute();
$conference = $stm->fetch();

dd($conference);

?>