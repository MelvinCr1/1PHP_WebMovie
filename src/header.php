<!DOCTYPE html>
<html lang="fr">
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebMovie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>WebMovie</h1>
        <nav>
        <label class='labelHeader' for="toggle">☰</label>
        <input type="checkbox" id="toggle">
        <div class="main_pages">
        <ul class='menu'>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="action.php">Films d'action</a></li>
            <li><a href="comedie.php">Films comédie</a></li>
            <li><a href="panier.php">Panier</a></li>
            <li><a href="search.php">Recherche</a></li>    
            <form action="logout.php" method="POST">
            <input type="hidden" name="logout" value="true">
            <input type="submit" value="Déconnexion">
            </form>
        </ul>
        </div>
        </nav>
    </header>