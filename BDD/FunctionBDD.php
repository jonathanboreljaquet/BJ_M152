<?php

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

