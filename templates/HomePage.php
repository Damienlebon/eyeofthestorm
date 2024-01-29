<?php
function HomePage($allStatus,$monId)
{
    global $isConnected;
    $titre = "Accueil";
    ob_start();
?>
 <?php
    // Si l'utilisateur est connecté, on affiche le formulaire de statut
    if (isset($isConnected)) { ?>
        <form method="post" action="?p=status&a=create">
        <label for="file">Mets une photo</label>
        <input type="file" id="file" name="file" multiple>
        <textarea name="content" placeholder="Nouveau statut ..." cols="30" rows="10"></textarea>
        <input type="submit" value="Publier">
        </form>
        
    <?php } ?>    

    
    <?php
    // On récupère tous les statuts
    foreach ($allStatus as $s) {
        // Vérifier si l'utilisateur connecté est le propriétaire du statut
        $isOwner = isset($monId) && $monId == $s["id_user"];
    ?>
        <p><?= $s["content"] ?> - <?= getUserPseudo($s["id_user"]) ?>
            <img src="img/<?= $s["file"] ?>" width="250px" />

            <?php
            // Si l'utilisateur est connecté et est le propriétaire du statut, on affiche le formulaire de modificationet de suppression
            if (isset($isConnected) && $isOwner) {
            ?>
                <form method="post" action="?p=status&a=delete&id=<?= $s["id_status"] ?>">
                    <input type="hidden" name="id_status" value="delete">
                    <input type="submit" value="Supprimer">
                </form>
            <?php
            }
            // Si l'utilisateur est connecté, on affiche le formulaire de commentaire
            if (isset($isConnected)) {
            ?>
                <form method="post" action="?p=comment&a=create&id_status=<?= $s["id_status"] ?>">
                    <textarea name="content" placeholder="Commenter ..." cols="30" rows="1"></textarea>
                    <input type="submit" value="Commenter">
                </form>
            <?php
            }
            // On récupère tous les commentaires du statut
            $comments = getAllCommentsByStatus($s["id_status"]);
            foreach ($comments as $c) {
                
            ?>
                <p><?= $c["content"] ?> -
                    <?= getUserPseudo($c["id_user"]) ?>
                </p>
        <?php
            }
        ?>
        </p>
    <?php
    }
    

    $contenu = ob_get_clean();
    require "layout.php";

}
?>