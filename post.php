<?php
require_once __DIR__ .'./BDD/FunctionBDD.php';

if (isset($_FILES) && is_array($_FILES) && count($_FILES) > 0) {
    
    
    $date = date("Y-m-d H:i:s"); 
    $image = $_FILES["image"];
    move_uploaded_file($image['tmp_name'][0],'Image/'.$image['name'][0]);
    $commentaire = filter_input(INPUT_POST, "commentaire", FILTER_SANITIZE_STRING);
    if (SaveImage($commentaire, $image["type"][0], $image["name"][0], $date)) {
        header("location: index.php");
    }
    else{
        echo "<h3>L'upload n'a pas fonctionné</h3>";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Post</title>
    </head>
    <body>
        <?php
        include './nav.php';
        ?>
        <form method="post" action="post.php" enctype="multipart/form-data">
            <label for="commentaire">Commentaire : </label><textarea id="commentaire" name="commentaire" cols="20" rows="10"></textarea><br>
            <input type="file" name="image[]" accept="image/jpeg,image/png,image/gif" >
            <input type="submit" value="Envoi">
        </form>
</html>
