<?php
    include "connexion.php";

    $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

    if (!empty($searchTerm)) {
        $sql = "SELECT * FROM exposants WHERE nom_exposant LIKE :searchTerm OR description LIKE :searchTerm";
        $stmt = $base_Donnee->prepare($sql);
        $stmt->execute([':searchTerm' => '%' . $searchTerm . '%']);
        $exposant = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $sql = "SELECT * FROM exposants";
        $stmt = $base_Donnee->prepare($sql);
        $stmt->execute();
        $exposant = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        main{
            background-color: var(--background-color);
        }
        
    </style>
</head>
<body>
<?php include 'header.html' ?>
    <main>

    <section class="container mb-5">
        <div class="text-center mb-5">
            <p class="text-muted">Vos recherches</p>
        </div>
        <div class="row g-4">
            <?php
            foreach ($exposant as $exp) {
                $chemin_img_exposant = $exp['photo'];
                if (!file_exists($chemin_img_exposant) || empty($exp['photo'])) {
                    $chemin_img_exposant = "https://via.placeholder.com/150?text=SITHO";
                }
                $modalID = "modalExposant" . $exp['id'];
            ?>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0 transition-hover">
                    <img src="<?php echo $chemin_img_exposant; ?>" 
                        class="card-img-top" 
                        alt="<?php echo $exp['nom_exposant']; ?>"
                        style="height: 220px; object-fit: cover;">
                    
                    <div class="card-body">
                        <span class="badge bg-success mb-2"><?php echo $exp['domaine']; ?></span>
                        <h5 class="card-title fw-bold"><?php echo $exp['nom_exposant']; ?></h5>
                        <p class="card-text text-truncate-2 text-muted">
                            <?php echo substr($exp['description'], 0, 80) . '...'; ?>
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
                        <div class="modal-header bg-primaire">
                            <h5 class="modal-title" id="label<?php echo $modalID; ?>"><?php echo $exp['nom_exposant']; ?></h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                            <img src="<?= $chemin_img_exposant ?>" 
                                class="img-fluid rounded shadow-sm mb-3" 
                                alt="Image agrandie">
                            
                            <div class="p-2">
                                <h6 class="text-success fw-bold">Secteur : <?php echo $exp['domaine']; ?></h6>
                                <hr>
                                <p class="text-dark"><?php echo $exp['description']; ?></p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondaire" data-bs-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php } // Fin de la boucle foreach ?>
        </div>
    </section>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<?php include 'footer.html' ?>
</body>
</html>