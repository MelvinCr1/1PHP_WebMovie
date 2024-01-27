<?php
require 'PDOWebMovie.php';
include('header.php');
session_start();

$user_id = $_SESSION['user_id'];
$user_email = $_SESSION['user_email'];
?>
<main>
    <h2>Nos derniers ajouts</h2>
    <div class="container">
        <?php
        $requeteSql = 'SELECT * FROM movie ORDER BY movieId DESC LIMIT 6' ;
        $donneesMovie=$bdd->query($requeteSql);
        while ($donnee = $donneesMovie->fetch()) {
        ?>
            <div class="card">
                <img src="img/<?= $donnee['movieId'] ?>.jpg" alt="<?= $donnee['nomDuFilm'] ?>">
                <div class="card-body">
                    <h3><?= $donnee['nomDuFilm'] ?></h3>
                    <p>Tarifs : <?= $donnee['prix'] ?>€</p>
                    <p><?= $donnee['synopsis'] ?></p>
                    <a style='color:white;' href="movie.php?id=<?= $donnee['movieId'] ?>">En savoir plus</a>
                </div>
            </div>
        <?php
        }
        $donneesMovie->closeCursor();
        ?>
    </div>
    <h2>Nos films les moins chers</h2>
    <div class="container">
        <?php
        $requeteSql1 = 'SELECT * FROM movie ORDER BY prix LIMIT 6';
        $donneesMoviePrix=$bdd->query($requeteSql1);
        while ($donnee1 = $donneesMoviePrix->fetch()){
        ?>
            <div class="card">
                <img src="img/<?= $donnee1['movieId'] ?>.jpg" alt="<?= $donnee1['nomDuFilm'] ?>">
                <div class="card-body">
                    <h3><?= $donnee1['nomDuFilm'] ?></h3>
                    <p>Tarifs : <?= $donnee1['prix'] ?>€</p>
                    <p><?= $donnee1['synopsis'] ?></p>
                    <a style='color:white;' href="movie.php?id=<?= $donnee1['movieId'] ?>">En savoir plus</a>
                </div>
            </div>
        <?php
        }
        $donneesMoviePrix->closeCursor();
        ?>
    </div>
</main>
<?php
include('footer.php');
?>