<?php
require 'PDOWebMovie.php';
session_start();

if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) {
    header('Location: panier.php');
    exit();
}
$errors = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST["emailValue"];
    $password = $_POST['motdepasseValue'];
    $mdp = $bdd->prepare('SELECT motdepasse FROM user WHERE email = :email' );
    $mdp->execute([
        ':email' => $_POST["emailValue"]
    ]);
    $donnee = $mdp->fetch();
    $recup = $donnee[0];
    if (password_verify($_POST['motdepasseValue'], $recup)){
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $query = $bdd->prepare('SELECT * FROM user WHERE email = :email');
            $query->execute([':email' => $email]);
            $user = $query->fetch();

            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['email'];

                header('Location: index.php');
                exit();
            } else {
                $errors = 'Adresse e-mail non trouvée';
            }
        } else {
            $errors = 'Adresse e-mail invalide';
        }
    } else {
        $errors = 'Mot de passe incorrect';
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se Connecter</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1 class='title'>Connexion</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="emailValue">Email :</label>
        <input type="email" name="emailValue" required><br>

        <label for="motdepasseValue">Mot de passe :</label>
        <input type="password" name="motdepasseValue" required><br>

        <input type="submit" value="Connexion" name='connexion'>
        <a class='redirectLink' style='color:white;' href="register.php">S'inscrire</a>
    </form>
</body>
</html>