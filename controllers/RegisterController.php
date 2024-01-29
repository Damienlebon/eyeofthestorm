<?php
function registerAction()
{
    global $base_url;
    if (isset($_POST["pseudo"]) && isset($_POST["password"]) && isset($_POST["nom"]) && isset($_POST["prenom"])) {
        $pseudo = $_POST["pseudo"];
        $mdp = $_POST["password"];
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $verif = register($pseudo, $mdp, $nom, $prenom);
        if ($verif) {
            header("Location: $base_url/?p=login");
        } else {
            echo "Erreur lors de l'inscription";
        }
    }

    RegisterPage();
}
