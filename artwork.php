<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>The ArtBox</title>
</head>
<body>

    <?php include('header.php'); ?>

    <main>


    <?php

    // gestion cas : pas de paramètre dans l'url
    // ou id n'est pas un entier

    if (!isset($_GET['id']) || !filter_var($_GET['id'], FILTER_VALIDATE_INT))
    {
        echo('Il faut un id entier pour afficher l\'oeuvre');
        
        return;
    }

    ?>

    <?php

    require('./artworks.php');
    
    foreach($artworks as $artwork) {


    // si l'id est dans le tableau && in_array($artwork['id'], $artwork)
    
    //  si l'id de l'oeuvre et l'id dans l'url sont les memes 

        if($artwork['id'] == $_GET['id']) { ?>

            <!-- alors tu affiches le détail de l'oeuvre -->

            <article id="detail-oeuvre">
                <div id="img-oeuvre">
                    <img src="<?php echo $artwork["img"] ?>"
                    alt="<?php echo $artwork["img_alt"] ?>"
                </div>

            <div id="contenu-oeuvre">
                <h1><?php echo $artwork["name"]?></h1>
                <p class="description"><?php echo $artwork["author"]?></p>
                <p class="description-complete"><?php echo $artwork["description"] ?></p>
            </div>

            </article>
        
        <?php }
    } ?>

</main>

    <?php include('footer.php'); ?>

</body>
</html>