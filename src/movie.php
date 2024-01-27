<?php
require 'PDOWebMovie.php';
include('header.php');

if(isset($_POST['add-to-cart'])) {
  $id = $_POST['movieId'];
  $nomDuFilm = $_POST['nomDuFilm'];
  $prix = $_POST['prix'];

  $requete = $bdd->prepare('INSERT INTO cart (nomDuFilm, prix) VALUES (:nomDuFilm, :prix)');
  $requete->execute(array(
    'nomDuFilm' => $nomDuFilm,
    'prix' => $prix
  ));
  header('Location: panier.php');
  exit();
}

$id=$_GET['id'];
$requeteSql = 'SELECT * FROM movie WHERE movieId = ' . $id;
$donneesMovie = $bdd->query($requeteSql);
while ($donnee = $donneesMovie->fetch()) {
?>
    <main class='movieInfo'>
    <img src='img/<?=$donnee['movieId']?>.jpg'>
        <h2><?= $donnee['nomDuFilm']?></h2>
        <div class="centre">
            <p><?= $donnee['synopsis']?></p><br>
        </div>
        <br>
        <h3>Réalisateur(s) : <?= $donnee['realisateur']?></h3>
        <h3>Date de sortie : <?= $donnee['dateDeSortie']?></h3>
        <h3>Acteur(s) : <?= $donnee['acteur']?></h3>
        <h3>Prix de location: <?= $donnee['prix']?>€</h3>
        <form method="POST">
            <input type="hidden" name="movieId" value="<?= $donnee['movieId'] ?>">
            <input type="hidden" name="nomDuFilm" value="<?= $donnee['nomDuFilm'] ?>">
            <input type="hidden" name="prix" value="<?= $donnee['prix'] ?>">
            <input type='submit' name='add-to-cart' value='Ajouter au panier'>
        </form>
    </main>
<?php
}
include('footer.php');
$donneesMovie->closeCursor();
?>