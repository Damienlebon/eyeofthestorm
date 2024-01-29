<?php
function getAllStatus()
{
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM status ORDER BY createdAt DESC");
    $query->execute();
    $status = $query->fetchAll();
    return $status;
}

function createStatus($id_user, $content,$file): bool
{
    global $pdo;
    try {
        $query = $pdo->prepare("INSERT INTO status (id_user, content,file,createdAt) VALUES (:id_user,:content,:file,:createdAt)");
        $query->execute([
            "id_user" => $id_user,
            "content" => $content,
            "file" => $file,
            "createdAt" => date("Y-m-d H:i:s")
        ]);
        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

function deleteStatus($id_status): bool
{
    global $pdo;
    try {
        $query = $pdo->prepare("DELETE FROM status WHERE id_status = :id_status");
        $query->execute([
            "id_status" => $id_status
        ]);
        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

function updateStatus($id_status, $content, $file): bool
{
    global $pdo;
    try {
        $query = $pdo->prepare("UPDATE status SET content = :content, file = :file WHERE id_status = :id_status");
        $query->execute([
            "id_status" => $id_status,
            "content" => $content,
            "file" => $file
        ]);
        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}



