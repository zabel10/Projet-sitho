<?php
include "connexion.php";
// ========= selectionner les 5 derniers messages =========
$sql = "SELECT * FROM contacts ORDER BY id DESC LIMIT 5";
$stmt = $base_Donnee->query($sql);
$messages = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
    <link rel="stylesheet" href="css/message.css">
</head>
<!-- ============ Afficher les 5 messages récents =========== -->
<body class="container">
    <h1>Messages récents</h1>
    <div class="messages-container">
        <?php foreach ($messages as $message): ?>
            <div class="message">
                <p><strong>De:</strong> <?= htmlspecialchars($message['nom']) ?> <?= htmlspecialchars($message['prenom'])?></p>
                <p><?= nl2br(htmlspecialchars($message['message'])) ?></p>
            </div>
        <?php endforeach; ?>
    </div>
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
    *{
        margin: 0;
        padding: 0;
        text-decoration: none;
        box-sizing: border-box;
    }
    body{
        background-color: var(--background-color);
        font-family: var(--font-family);
        color: var(--secondary-text-color);
    }
    
    .container{
    display: grid;
    grid-template-columns: 
    minmax(6rem, 1fr)
    [start]
    repeat(8, minmax(min-content, 14rem ))
    [end]
    minmax(6rem, 1fr);
}
.messages-container{
    grid-column: start/end;
    margin: 3rem 0;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(15rem, 1fr));
    grid-gap: 5rem;
}
.container h1{
    grid-column: start/end;
    text-align: center;
    font-size: 3rem;
}
.message{
    background-color: var(--color-on-sombre);
    padding: 1rem;
    margin-bottom: 1rem;
    color: var(--header-footer-activite);
    display: flex;
    flex-direction: column;
    gap: 1rem;
    border-radius: 8px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.message strong{
    font-family: var(--heading-font-family);
    font-size: 1.5rem;
}

.message:hover{
    transform: translateY(-5px);
    transition: transform var(--transition-speed);
}

@media screen and (max-width: 480px){
    .container{
        width: 100%;

    }
    .message-container{
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
}

    </style>
</body>
</html>