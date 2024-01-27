<?php
require 'PDOWebMovie.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $nom = isset($_POST["nomValue"]) ? $_POST["nomValue"] : '';
    $prenom = isset($_POST["prenomValue"]) ? $_POST["prenomValue"] : '';
    $email = isset($_POST["emailValue"]) ? $_POST["emailValue"] : '';
    $motdepasse = isset($_POST["motdepasseValue"]) ? $_POST["motdepasseValue"] : '';
    $hashedPassword = password_hash($motdepasse, PASSWORD_DEFAULT);
    if (!empty($nom) && !empty($prenom) && !empty($email) && !empty($motdepasse)) {
        $requetesql = "INSERT INTO user (nom, prenom, email, motdepasse) VALUES (?, ?, ?, ? )";
        $stmt = $bdd->prepare($requetesql);
        $stmt->execute([$nom, $prenom, $email, $hashedPassword]);
        header('Location:index.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebMovie - Inscription</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1 class='title'>Inscription</h1>
    <form class='formRegister' action="" method="POST" enctype="multipart/form-data">
        <label for="nomValue">Nom :</label>
        <input type="text" name="nomValue" required><br>

        <label for="prenomValue">Prenom :</label>
        <input type="text" name="prenomValue" required><br>

        <label for="emailValue">Email :</label>
        <input type="email" name="emailValue" required><br>

        <label for="motdepasseValue">Mot de passe :</label>
        <input type="password" name="motdepasseValue" required><br>

        <input type="submit" value="Continuer" name='ajouter'>
        <a href="login.php" style='color:white;'>Se Connecter</a>
    </form>
</body>
</html>