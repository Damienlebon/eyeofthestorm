<?php
function homeAction()
{
    $allStatus = getAllStatus();
    global $base_url;
    if (array_key_exists('user', $_SESSION)) {
        $monId = $_SESSION["user"]["id"];
    } else {
        header("Location: $base_url/?p=login");
        exit();
    }

    HomePage($allStatus, $monId);
}
