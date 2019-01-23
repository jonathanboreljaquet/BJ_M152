<!DOCTYPE html>
<?php
require_once __DIR__ . './BDD/FunctionBDD.php';
$imageRecently = GetRecentlyImage();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Home</title>
    </head>
    <body>
        <?php
        include './nav.php';
        ?>
        <img src="Image/images.png" alt="Pas d'image">
        <h1>Bienvenue !</h1>

        <figure>
            <img src="image.jpg" alt="" />
            <figcaption>Légende associée</figcaption>
        </figure>

    </body>
</html>
