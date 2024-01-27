<?php
require 'PDOWebMovie.php';

$nomDuFilm = $_GET['nomDuFilm'];

$delete = $bdd->prepare("DELETE FROM cart WHERE nomDuFilm = :nomDuFilm");
$delete->execute([':nomDuFilm' => $nomDuFilm]);

header('Location: panier.php');
?>