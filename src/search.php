<?php
require 'PDOWebMovie.php';
include('header.php');
?>
<form action="search.php" method="get">
    <label for="film">Recherche de film:</label>
    <input type="text" name="film" id="film">
    <input type="submit" value="Rechercher">
</form>
<?php
// Vérifie si un film est sélectionné dans la barre de recherche
if(isset($_GET['film'])) {
    $film = $_GET['film'];

    $sql = "SELECT * FROM movie WHERE nomDuFilm LIKE :film OR realisateur LIKE :film or acteur LIKE :film";
    $stmt = $bdd->prepare($sql);
    $stmt->execute(['film' => '%' . $film . '%']);
    $result = $stmt->fetchAll();

    if(count($result) > 0) {
        echo 'Résultat de votre recherche : ';
        foreach ($result as $resultDonnee) {
            ?>
            <div class="card">
                <img src="img/<?= $resultDonnee['movieId'] ?>.jpg" alt="<?= $resultDonnee['nomDuFilm'] ?>">
                <div class="card-body">
                    <h3><?= $resultDonnee['nomDuFilm'] ?></h3>
                    <p>Tarifs : <?= $resultDonnee['prix'] ?>€</p>
                    <p><?= $resultDonnee['synopsis'] ?></p>
                    <a style='color:white;' href="movie.php?id=<?= $resultDonnee['movieId'] ?>">En savoir plus</a>
                </div>
            </div>
        <?php
        }
    } else {
        echo "Aucun résultat trouvé.";
    }
}
include('footer.php');
?>