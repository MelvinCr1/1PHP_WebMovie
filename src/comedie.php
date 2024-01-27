<?php
require 'PDOWebMovie.php';
include('header.php');
?>
<main>
    <h2>Film comédie</h2>
    <div class="container">
        <?php
        $requeteSql = 'SELECT * FROM movie where categorie="comedie"';
        $donneesMovie=$bdd->query($requeteSql);
        while ($donnee = $donneesMovie->fetch()) {
        ?>
            <article class="card">
                <img src='img/<?= $donnee['movieId'] ?>.jpg' alt='Affiche de <?= $donnee['nomDuFilm'] ?>'>
                <div class="card-body">
                    <h3><?= $donnee['nomDuFilm'] ?></h3>
                    <p>Tarifs : <?= $donnee['prix'] ?>€</p>
                    <p><?= $donnee['synopsis'] ?></p>
                    <a style='color:white;' href='movie.php?id=<?= $donnee['movieId'] ?>'>En savoir plus</a>
                </div>
            </article>
        <?php
        }
        $donneesMovie->closeCursor();
        ?>
    </div>
</main>
<?php
include('footer.php');
?>