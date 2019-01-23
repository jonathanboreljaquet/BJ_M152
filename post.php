<?php
// Traitement du formulaire
// Remplacement des ; en , dans le contenu du message posté
// todo : S'assurer que le champ ne contient pas d'injection sql 
if (isset($_FILES) && is_array($_FILES) && count($_FILES) > 0) {
    $format = '%d/%m/%Y %H:%M:%S';
    $date = strftime($format);
    $image = $_FILES["image"];
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
            <input type="file" name="image[]" accept="image/jpeg,image/png,image/gif" >
            <input type="submit" value="Envoi">
        </form>
</html>
