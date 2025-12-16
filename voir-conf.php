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
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/5/solar/bootstrap.min.css">
    <title>Inscription Conférence</title>
</head>

<body>
    <?php include 'nav.php'; ?>
    <div class="container mt-4">
        <div class="card mb-3">
            <h3 class="card-header">Conference # <?= $conference['id'] ?></h3>
            <div class="card-body">
                <h5 class="card-title"><?= $conference['prenom'] . ' '. $conference['nom'] ; ?> (<?= $conference['date_naissance'] ?>)</h5>
                <h6 class="card-subtitle text-muted"><?= $conference['email'] ?></h6>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Type participant : <?= $conference['type_participant'] ?></li>
                <li class="list-group-item">Centre interet : <?= $conference['centres_interet'] ?></li>
            </ul>
            <div class="card-footer text-muted">
                <?= $conference['date_inscription'] ?>
            </div>
        </div>
        <a href="index.php" class="btn btn-success">Retour à la liste des conferecnes</a>
    </div>

</body>

</html>