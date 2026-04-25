<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partenaires et Exposants - SITHO</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=menu,search" /> 
    <style>
            :root{
    --background-color: #FAFAE8;
    --Partenaire-section-background-color: #F5E6C0;
    --header-footer-activite: #1A1208;
    --secondary-text-color: #6B6254;
    --color-on-sombre: #FFFFFF;
    --color-hover: #E8B84B;
    --color-secondaire: #C9962A;

    --font-family: 'Poppins, sans-serif';
    --heading-font-family: 'Lora, serif';
    --transition-speed: 0.3s;
}
        .card-img-top {
            height: 150px;
            object-fit: contain;
            background: #fafaf8;
        }
        .card {
            transition: transform 0.2s;
        }
        .card:hover {
            transform: scale(1.02);
        }
        .btn-primaire, .btn-secondaire, .btn-primaire:hover, .btn-secondaire:hover {
            background-color: var(--color-secondaire);
            border-color: var(--color-secondaire);
            color: var(--header-footer-activite) ;
        }
        .bg-primaire {
            background-color: var(--color-secondaire) ;
            color: var(--header-footer-activite);;
        }
        .bg-info{
            background-color: var(--color-secondaire) !important;
            
        }
        .text-succes{
            color: var(--secondary-text-color);
        }
        main{
            background-color: var(--background-color);
        }
        
    </style>
</head>
<body>
<?php include 'header.html' ?>
<main>
<div class="container py-5">
    <h1 class="text-center mb-5 fw-bold text-succes">NOS PARTENAIRES ET EXPOSANTS</h1>
<div class="text-center mb-5">
    <h3 class="fw-bold">NOS PARTENAIRES</h3>
    <p class="text-muted">Découvrez nos differents partenaires</p>
</div>
    <div class="row g-4">
        <?php
        $reponse = $pdo->query("SELECT * FROM Partenaires");
        
        while ($donnees = $reponse->fetch()) {
            // Chemin de l'image
            $chemin_image = $donnees['logo'];
            
            // Si le logo n'existe pas physiquement dans le dossier img/
            if (!file_exists($chemin_image) || empty($donnees['logo'])) {
                $chemin_image = "https://via.placeholder.com/150?text=SITHO";
            }
        ?>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm">
                    <img src="<?php echo $chemin_image; ?>" class="card-img-top p-3" alt="Logo">
                    <div class="card-body border-top">
                        <h5 class="card-title text-primary fw-bold"><?php echo htmlspecialchars($donnees['nom_structure']); ?></h5>
                        <p class="card-text">
                            <span class="badge bg-info text-dark mb-2"><?php echo htmlspecialchars($donnees['statut']); ?></span><br>
                            <small class="text-muted"><strong>Lieu :</strong> <?php echo htmlspecialchars($donnees['localisation']); ?></small>
                        </p>
                    </div>
                </div>
            </div>
        <?php
        }
        ?> 
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></s
cript>
<script src="js/bootstrap.bundle.min.js"></script>

<hr class="container my-5" style="border: 2px solid #0d6efd; width: 50px;">

<section class="container mb-5">
    <div class="text-center mb-5">
        <h3 class="fw-bold">NOS EXPOSANTS</h3>
        <p class="text-muted">Découvrez les acteurs de l'artisanat et de la gastronomie burkinabè</p>
    </div>
    <div class="row g-4">
        <?php
        // Connexion et récupération des exposants (assure-toi que $pdo est défini via db.php)
        $requete = $pdo->query("SELECT * FROM exposants");
        
        while($exposant = $requete->fetch()) {
            // On crée un ID unique pour chaque modal (ex: modal1, modal2...)
            $modalID = "modalExposant" . $exposant['id'];
            $chemin_img_exposant = $exposant['photo'];
        ?>
        
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm border-0 transition-hover">
                <img src="<?php echo $chemin_img_exposant; ?>" 
                    class="card-img-top" 
                    alt="<?php echo $exposant['nom_exposant']; ?>"
                    style="height: 220px; object-fit: cover;">
                
                <div class="card-body">
                    <span class="badge bg-success mb-2"><?php echo $exposant['domaine']; ?></span>
                    <h5 class="card-title fw-bold"><?php echo $exposant['nom_exposant']; ?></h5>
                    <p class="card-text text-truncate-2 text-muted">
                        <?php echo substr($exposant['description'], 0, 80) . '...'; ?>
                    </p>
                </div>
                
                <div class="card-footer bg-white border-0 pb-3">
                    <button class="btn btn-primaire w-100 fw-bold" 
                            data-bs-toggle="modal" 
                            data-bs-target="#<?php echo $modalID; ?>">
                        En savoir plus
                    </button>
                </div>
            </div>
        </div>

        <div class="modal fade" id="<?php echo $modalID; ?>" tabindex="-1" aria-labelledby="label<?php echo $modalID; ?>" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 shadow">
                    <div class="modal-header bg-primaire text-white">
                        <h5 class="modal-title" id="label<?php echo $modalID; ?>"><?php echo $exposant['nom_exposant']; ?></h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img src="<?= $chemin_img_exposant ?>" 
                            class="img-fluid rounded shadow-sm mb-3" 
                            alt="Image agrandie">
                        
                        <div class="p-2">
                            <h6 class="text-success fw-bold">Secteur : <?php echo $exposant['domaine']; ?></h6>
                            <hr>
                            <p class="text-dark"><?php echo $exposant['description']; ?></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondaire" data-bs-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>

        <?php } // Fin de la boucle while ?>
    </div>
</section>
</main>

<script src="js/bootstrap.bundle.min.js"></script>
<?php include 'footer.html' ?>
</body>
</html>