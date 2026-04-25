<?php
    include "connexion.php";

    // Creation d'un tableau pour stocker les actualités
    $actualite = [];

    // Récupérer les actualités de la base de données stockées dans le tableau et exécuter la requête
    $sql = "SELECT * FROM actualites";
    $resultat = $base_Donnee->prepare($sql);
    $resultat->execute();
    $actualite = $resultat->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualité</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=menu,search" />
</head>
<body>
    <?php include "header.html" ?>
    <!-- ============== Liste des actualités ============= -->
    <main class="container">
    <h2>Actualités</h2>
        <section class="grille">
            <?php foreach($actualite as $actu): ?>
                <article class="article">
                    <h3><?= $actu['titre'] ?></h3>
                    <p><?= $actu['description'] ?></p>
                    <span><?= $actu['date_evenement'] ?></span>
                </article>
            <?php endforeach; ?>
        </section>
    </main>
    <?php include "footer.html" ?>
</body>
