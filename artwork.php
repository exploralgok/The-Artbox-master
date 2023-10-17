<?php

    // gestion erreur : 
    // 1. pas de paramètre dans l'url
    // 2. id n'est pas un entier
    // on renvoie vers la page d'acceuil

     if (!isset($_GET['id']) || !filter_var($_GET['id'], FILTER_VALIDATE_INT)){
         header("Location: ./index.php");
         // die();    
     }

    require('./artworks.php');

    $_artwork = false;
    // // c'est l'id du paramètre de l'url 
    // $id = $_GET['id'];

    foreach($artworks as $artwork){

         if ($artwork['id'] == $_GET['id']){
             $_artwork = $artwork;
         }

    }

    if(!$_artwork){
        header("Location: ./index.php");
     }

?>

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
    
    // foreach($artworks as $artwork) {


    // si l'id est dans le tableau && in_array($artwork['id'], $artwork)
    
    //  si l'id de l'oeuvre et l'id dans l'url sont les memes 

        // if($_artwork['id'] == $_GET['id']){ 
            
            // echo $_artwork['id'];
            // echo $_GET['id'];
            ?>

            <!-- alors tu affiches le détail de l'oeuvre -->

            <article id="detail-oeuvre">
                <div id="img-oeuvre">
                    <img src="<?php echo $_artwork["img"]; ?>" alt="<?php echo $_artwork["img_alt"]; ?>">
                </div>

            <div id="contenu-oeuvre">
                <h1><?php echo $_artwork["name"]; ?></h1>
                <p class="description"><?php echo $_artwork["author"]; ?></p>
                <p class="description-complete"><?php echo $_artwork["description"]; ?></p>
            </div>

        
        <?php 
        // }
    // } 
    ?>

</main>

    <?php include('footer.php'); ?>

</body>

</html>