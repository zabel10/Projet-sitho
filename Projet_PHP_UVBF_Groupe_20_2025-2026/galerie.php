<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galerie SITHO</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=menu,search" /> 
    <style>
        .gallery-container img, .gallery-container video {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-radius: 8px 8px 0 0;
        }
        .card { border: none; transition: 0.3s; }
        .card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.1); }
        .text-succes{
            color: #6B6254;
        }
        body {
            background-color: #FAFAE8;
        }
    </style>
</head>
<body>
<?php include 'header.html'?>
    <main>
        <div class="container py-5">
            <h1 class="text-center mb-5 fw-bold text-succes">Galerie Multimédia - SITHO</h1>

            <h2>Revivez les meilleurs moments du SITHO a travers notre galerie pleine de surprises!</h2> 

            <div class="row g-4">
                <?php
                $stmt = $pdo->query("SELECT * FROM galeries ORDER BY id DESC");
                
                while ($row = $stmt->fetch()) {
                    $chemin = $row['fichier'];
                    $type = strtolower($row['type']);
                ?>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm">
                            <div class="gallery-container">
                                <?php if ($type == 'video'): ?>
                                    <video controls>
                                        <source src="<?php echo $chemin; ?>" type="video/mp4">
                                        Votre navigateur ne supporte pas la vidéo.
                                    </video>
                                <?php else: ?>
                                    <img src="<?php echo $chemin; ?>" alt="Image SITHO">
                                <?php endif; ?>
                            </div>
                            <div class="card-body">
                                <p class="card-text text-muted">
                                    <?php echo htmlspecialchars($row['description']); ?>
                                </p>
                                <span class="badge bg-secondary"><?php echo ucfirst($type); ?></span>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </main>
<script src="js/bootstrap.bundle.min.js"></script>
<?php include 'footer.html'?>
</body>
</html>
