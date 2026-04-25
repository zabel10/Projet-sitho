<?php
session_start();
include "connexion.php";

// Durée de vie de la session (10 minutes = 600 secondes)
$vie_session = 600;

if (!isset($_SESSION['admin_id'])) {
    header("Location: connexionAdmin.php");
    exit();
}

// Vérifier si la session n'a pas expirée
if (isset($_SESSION['derniere_activite'])) {
    $temps_ecoule = time() - $_SESSION['derniere_activite'];
    
    if ($temps_ecoule > $vie_session) {
    // Session expirée, détruire et rediriger
        session_unset();
        session_destroy();
        header("Location: connexionAdmin.php");
        exit();
    }
    
    // Mettre à jour le dernier moment d'activité
    $_SESSION['derniere_activite'] = time();
}

// Fonction pour compter le nombre de partenaires et d'exposants
function compter($table, $base){
    $sql = "SELECT COUNT(*) as total FROM $table";

    $stmt = $base->query($sql);
    return $stmt->fetch()['total'];
}
$nb_exposants = compter("exposants", $base_Donnee);
$nb_partenaires = compter("partenaires", $base_Donnee);

// Compter 5 les nouveaux messages
$sql1 = "SELECT COUNT(*) FROM contacts ORDER BY id DESC LIMIT 5";
$stmt1 = $base_Donnee->query($sql1);
$messages = $stmt1->fetchColumn();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=add,delete,edit,menu,search" />
    <title>Document</title>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <?php include "header.html" ?>
    <!-- ======================== Afficher le nombre d'exposants de partenaires et de nouveaux messages ======================= -->
    <div class="carte">
        <div class="box box1">
            <span><?=$nb_exposants?></span>
            <p>Exposants</p>
        </div>
        <div class="box box2">
            <span><?=$nb_partenaires?></span>
            <p>Partenaires</p>
        </div>
        <div class="box box3">
            <span><?=$messages?></span>
            <a href="message.php"> Nouveaux messages</a>
        </div>
    </div>
    <!-- ======================== Gestion des contenus ======================= -->
    <div class="container">
        <div class="add-container">
            <div class=" box actualite">
                <h3>Gérer les actualités</h3>
                <div class="btn btn-actualite">
                    <a href="add/addActualite.php"><span class=" add material-symbols-outlined">add</span></a>
                    <a href="liste.php?type=actualite"><span class=" remove material-symbols-outlined">delete</span></a>
                    <a href="liste2.php ? type=actualite"><span class=" update material-symbols-outlined">edit</span></a>
                </div>
            </div>
            <div class="box activite">
                <h3>Gérer les activités</h3>
                <div class="btn btn-activite">
                    <a href="add/addActivite.php"><span class=" add material-symbols-outlined">add</span></a>
                    <a href="liste.php?type=activite"><span class=" remove material-symbols-outlined">delete</span></a>
                    <a href="liste2.php?type=activite"><span class=" update material-symbols-outlined">edit</span></a>
                </div>
            </div>
            <div class="box conferen">
                <h3>Gérer les conférences</h3>
                <div class="btn btn-conferen">
                    <a href="add/addConference.php"><span class=" add material-symbols-outlined">add</span></a>
                    <a href="liste.php?type=conference"><span class=" remove material-symbols-outlined">delete</span></a>
                    <a href="liste2.php?type=conference"><span class=" update material-symbols-outlined">edit</span></a>
                </div>
            </div>
            <div class="box partenaire">
                <h3>Gérer les partenaires</h3>
                <div class="btn btn-partenaire">
                    <a href="add/addpartenaire.php"><span class=" add material-symbols-outlined">add</span></a>
                    <a href="liste.php?type=partenaire"><span class=" remove material-symbols-outlined">delete</span></a>
                    <a href="liste2.php?type=partenaire"><span class="update material-symbols-outlined">edit</span></a>
                </div>
            </div>
            <div class="box exposant">
                <h3>Gérer les exposants</h3>
                <div class="btn btn-exposant">
                    <a href="add/AddExposant.php"><span class=" add material-symbols-outlined">add</span></a>
                    <a href="liste.php?type=exposant"><span class="remove material-symbols-outlined">delete</span></a>
                    <a href="liste2.php?type=exposant"><span class=" update material-symbols-outlined">edit</span></a>
                </div>
            </div>  
            <div class="box galerie">
                <h3>Gérer la galerie</h3>
                <div class="btn btn-galerie">
                    <a href="add/addGalerie.php"><span class=" add material-symbols-outlined">add</span></a>
                    <a href="liste.php?type=galerie"><span class=" remove material-symbols-outlined">delete</span></a>
                    <a href="liste2.php?type=galerie"><span class="update material-symbols-outlined">edit</span></a>
                </div>
            </div>
        </div>
    </div>
    <?php include "footer.html" ?>
</body>
</html>