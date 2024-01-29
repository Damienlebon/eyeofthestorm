<?php 
global $base_url;
$base_url = "http://localhost/eyeofthestorm/";
global $isConnected;
$isConnected = isset($_SESSION["user"]);
?>

<!DOCTYPE html>
<html lang="fr">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eye Of The Storm - <?= $titre ?></title>
</head>
<header>
    <nav> 
        <ul> 
            <?php if($isConnected): ?>
                    <li><a href="<?= $base_url ?>">Accueil</a></li>
                    <li><a href="<?= $base_url ?>?p=logout">Se Déconnecter</a></li> 
                <?php else: ?> 
                    <li><a href="<?= $base_url ?>?p=login">Connexion</a></li> 
                    <li><a href="<?= $base_url ?>?p=register">S'Enregistrer</a></li> 
            <?php endif; ?> 
        </ul> 
    </nav> 
 </header>

<body>
    <h1><?= $titre ?></h1>
        <div>
            <?= $contenu ?>
        </div>
    </div>
</body>

</html>
