<?php
// Connexion à la base de données
$link = mysqli_connect("localhost", "micheldjoumessi_pair-prog", "michelchrist", "micheldjoumessi_pair-prog");

// Récupérer tous les développeurs
$query = "SELECT * FROM developpeurs";
$result = mysqli_query($link, $query);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodePair | Développeurs Disponibles</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            padding: 20px;
            background-color: #f0f0f0;
        }
        .developers-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }
        .developer-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .developer-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 5px;
        }
        .developer-name {
            font-size: 1.5rem;
            margin: 10px 0;
            color: #2d79f3;
        }
        .developer-stack {
            color: #666;
            font-size: 0.9rem;
            margin: 5px 0;
        }
        .developer-description {
            color: #333;
            line-height: 1.5;
        }
    </style>
</head>
<body>
    <h1>Développeurs Disponibles</h1>
    <div class="developers-grid">
        <?php while($developpeur = mysqli_fetch_assoc($result)): ?>
            <div class="developer-card">
                <img src="<?= str_replace('../', '', $developpeur['photo_profil']) ?>" alt="<?= $developpeur['fullname'] ?>">
                <div class="developer-name"><?= $developpeur['fullname'] ?></div>
                <div class="developer-stack">Stack: <?= $developpeur['stack'] ?></div>
                <div class="developer-description"><?= $developpeur['description'] ?></div>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>