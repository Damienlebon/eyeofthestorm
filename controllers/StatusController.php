<?php
function createStatusAction()
{
    global $isConnected;
    global $base_url;
    if (!$isConnected) {
        header("Location: $base_url/?p=login");
        return;
    }
    if (isset($_POST["content"])) {
        $id_user = $_SESSION["user"]["id"];
        $content = $_POST["content"];
        $file = $_POST["file"];
        $verif = createStatus($id_user, $content, $file);
        if (!$verif) {
            echo "Erreur lors de la création du status";
        } else {
            header("Location: $base_url");
        }
    }
}

function deleteStatusAction($id_status)
{
    global $isConnected;
    global $base_url;
    if (!$isConnected) {
        header("Location: $base_url/?p=login");
        return;
    }
    $verif = deleteStatus($id_status);
    if (!$verif) {
        echo "Erreur lors de la suppression du statut";
    } else {
        header("Location: $base_url");
    }
}

function updateStatusAction()
{
    global $isConnected;
    global $base_url;
    if (!$isConnected) {
        header("Location: $base_url/?p=login");
        return;
    }
    if (isset($_POST["id_status"])) {
        $id_status = $_POST["id_status"];
        $content = $_POST["content"];
        $file = $_POST["file"];
        $verif = updateStatus($id_status, $content, $file);
        if (!$verif) {
            echo "Erreur lors de la mise à jour du statut";
        } else {
            header("Location: $base_url");
        }
    }
}