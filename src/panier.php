<?php
require 'PDOWebMovie.php';
include('header.php');
session_start();
if (!isset($_SESSION['user_id'])){
    header('Location: login.php');
    exit;
}

$sql = "SELECT * FROM cart";
$donneeCart = $bdd->query($sql);

if ($donneeCart->rowCount() > 0) {
?>
<h1>Mon Panier</h1>
    
<table>
    <tr>
    <th>Nom du film</th>
    <th>Prix</th>
    <th>Quantité</th>
    <th>Supprimer</th>
    </tr>
<?php
    $total = 0;
    while($ligne = $donneeCart->fetch()) {
        echo "<tr>";
        echo "<td>" . $ligne["nomDuFilm"] . "</td>";
        echo "<td>" . $ligne["prix"] . " €</td>";
        echo "<td>" . "1" . "</td>";
        echo "<td><button onclick=\"location.href='delete.php?nomDuFilm=".$ligne['nomDuFilm']."'\">Supprimer</button></td>";
        echo "</tr>";
        $total += $ligne["prix"];
    }
    echo "<tr>";
    echo "<tr>";
    echo "<td>Total</td>";
    echo "<td>".$total." €</td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "</tr>";
    echo "</table>";
} else {
    echo "<p>Votre panier est vide.</p>";
}

$donneeCart->closeCursor();
include('footer.php');
?>