<?php

function LoginPage()
{
    $titre = "Connexion";
    ob_start();
?>
    <form method="post">
        <input type="text" name="pseudo" placeholder="pseudo">
        <input type="password" name="password" placeholder="mot de passe">
        <input type="submit" value="Se connecter">
    </form>
<?php
global $base_url;
$base_url = "http://localhost/eyeofthestorm/";
?>
    <li><a href="<?= $base_url ?>?p=register">S'Enregistrer</a></li>

<?php
    $contenu = ob_get_clean();
    require "layout.php";
}
