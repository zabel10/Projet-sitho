<?php
    include "connexion.php";

    // Creation d'un tableau pour stocker les activités et les conférences puis exécuter les requêtes pour les récupérer de la base de données et les stocker dans les tableaux respectifs
    
    $activite = [];
    $sql = "SELECT * FROM activites";
    $resultat = $base_Donnee->prepare($sql);
    $resultat->execute();
    $activite = $resultat->fetchAll(PDO::FETCH_ASSOC);

    $conference = [];
    $sql2 = "SELECT * FROM conferences";
    $resultat2 = $base_Donnee->prepare($sql2);
    $resultat2->execute();
    $conference = $resultat2->fetchAll(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activité</title>
    <link rel="stylesheet" href="css/activite.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=menu,search" />
</head>
<body>
    <?php include "header.html" ?>
    <!-- ============== Liste des activités ============= -->
    <main class="container">
        <h2>Activités</h2>
        <section class="grille">
            <?php foreach($activite as $act): ?>
                <article class="article">
                    <h3><?= $act['titre'] ?></h3>
                    <p><?= $act['description'] ?></p>
                    <span><strong>A la date du :</strong> <?= $act['date'] ?></span>
                    <p>Lieu: <?= $act['lieu'] ?></p>
                </article>
            <?php endforeach; ?>
        </section>
        <!-- ============== Liste des conférences ============= -->
        <h2>Conférences</h2>
        <section class="grille">
            <?php foreach($conference as $conf): ?>
                <article class="article">
                    <h3><?= $conf['titre'] ?></h3>
                    <h4>Thème: <?= $conf['theme'] ?></h4>
                    <p><?= $conf['description'] ?></p>
                    <span><strong>A la date du :</strong> <?= $conf['date_conference'] ?></span>
                    <p><strong>Intervenant: <?= $conf['intervenant'] ?></strong></p>
                    <p><strong>Organisme: <?= $conf['organisme'] ?></strong></p>
                </article>
            <?php endforeach; ?>
        </section>
    </main>
    <?php include "footer.html" ?>
</body>
</html>