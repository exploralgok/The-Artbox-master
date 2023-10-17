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
    // 3. si l'id n'existe pas 
    // variable temporaire pour évaluer la présence de l'id ou non 
    // je stocke la ligne du tableau dans $artwork
    // et si elle réponds au condition la variable temporaire est modifié sinon elle est toujours vide
    // false : cet id n'existe pas dans le tableau  
    $_artwork = false;
    // on parcourt le array pour récupérer les id et donc les erreurs potentiels
    foreach($artworks as $artwork){
        // quand l'id de l'array est le meme que celui de la page 
        // on stock le array dans une variable temporaire
        // pour l'utiliser dans le code html ensuite
        if ($artwork['id'] == $_GET['id']){
                $_artwork = $artwork;
            }
    }
    // mais si la variable temporaire n'a pas été remplacé par un array 
    // ça veut dire l'id de la page ne correspond à aucun id dans le array
    // alors on renvoie vers la page d'acceuil
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
        <!-- affiches le détail de l'oeuvre du array concerné -->
        <article id="detail-oeuvre">
            <div id="img-oeuvre">
                <img src="<?php echo $_artwork["img"]; ?>" alt="<?php echo $_artwork["img_alt"]; ?>">
            </div>
        <div id="contenu-oeuvre">
            <h1><?php echo $_artwork["name"]; ?></h1>
            <p class="description"><?php echo $_artwork["author"]; ?></p>
            <p class="description-complete"><?php echo $_artwork["description"]; ?></p>
        </div>
    </main>
    <?php include('footer.php'); ?>
</body>
</html>