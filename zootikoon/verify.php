<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Tableau des utilisateurs autorisés
    $utilisateurs = [
        ["email" => "Lina@gmail.com", "password" => "passeLina"],
        ["email" => "Edgar@gmail.com", "password" => "passeEdgar"]
    ];

    $authentification_reussie = false;

    // Vérifier les informations d'authentification
    foreach ($utilisateurs as $user) {
        if ($user["email"] === $email && $user["password"] === $password) {
            // L'authentification est réussie
            $authentification_reussie = true;
            break;
        }
    }

    if ($authentification_reussie) {
        // Informations d'authentification valides.
        echo '<div style="background-color: green; color: white; padding: 10px; border: 1px solid #008000;">Vous êtes connecté !</div>';
        exit; // Terminer le script après une authentification réussie.
    } else {
        // Informations d'authentification ne sont pas valides.
        echo '<div style="background-color: red; color: black; padding: 10px; border: 1px solid #ff0000;">Erreur : Les informations d\'authentification sont incorrectes.</div>';
    }
}
?>

