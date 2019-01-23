<?php
require_once __DIR__ .'./EDatabase.php';


function SaveImage($commentaire,$typeMedia,$nomMedia,$date){
    $sql = "INSERT INTO `post` (`idPost`, `commentaire`, `typeMedia`, `nomMedia`, `datePost`) VALUES (NULL, :commentaire, :typeMedia, :nomMedia, :date);";
    try {
        $stmt = EDatabase::prepare($sql);
        $stmt->bindParam(':commentaire', $commentaire, PDO::PARAM_STR);
        $stmt->bindParam(':typeMedia', $typeMedia, PDO::PARAM_STR);
        $stmt->bindParam(':nomMedia', $nomMedia, PDO::PARAM_STR);
        $stmt->bindParam(':date', $date, PDO::PARAM_STR);
        $stmt->execute();
        return TRUE;
    } catch (PDOException $e) {
        echo "PDOException Error: " . $e->getMessage();
        return FALSE;
    }
}

function GetRecentlyImage(){
    $sql = "SELECT * FROM `post` order by datePost desc limit 1";
    try {
        $stmt = EDatabase::prepare($sql);
        $stmt->execute();
        $last_id = $stmt->lastInsertId();
        return $last_id;
        
    } catch (PDOException $e) {
        echo "PDOException Error: " . $e->getMessage();
        return FALSE;
    }
}

