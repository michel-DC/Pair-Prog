<?php
// Connexion à la base de données
$link = mysqli_connect("localhost", "micheldjoumessi_pair-prog", "michelchrist", "micheldjoumessi_pair-prog");

// Traitement du formulaire d'ajout
if (isset($_POST['ajt_developpeur'])) {
    $fullname = $_POST['fullname'];
    $stack = $_POST['stack'];
    $description = $_POST['description'];

    // Gestion de l'upload de l'image
    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === 0) {
        $dossier = '../images/';
        if (!is_dir($dossier)) {
            mkdir($dossier, 0755, true);
        }

        $filename = basename($_FILES['profile_picture']['name']);
        $destination = $dossier . uniqid() . '_' . $filename;
        $type_fichier = mime_content_type($_FILES['profile_picture']['tmp_name']);

        $type_autorise = ['image/jpeg', 'image/png', 'image/gif'];

        if (in_array($type_fichier, $type_autorise)) {
            if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $destination)) {
                $query = "INSERT INTO developpeurs (fullname, stack, description, photo_profil)
                          VALUES ('$fullname', '$stack', '$description', '$destination')";

                if (mysqli_query($link, $query)) {
                    $success = "Développeur ajouté avec succès !";
                } else {
                    $error = "Erreur lors de l'insertion en base de données.";
                }
            } else {
                $error = "Erreur lors du déplacement de l'image.";
            }
        } else {
            $error = "Type de fichier non autorisé. Seuls les JPG, PNG et GIF sont acceptés.";
        }
    } else {
        $error = "Erreur lors de l'upload de l'image.";
    }
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Développeur</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            padding: 20px;
            background-color: #f0f0f0;
        }
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        textarea {
            height: 100px;
        }
        .submit-btn {
            background-color: #2d79f3;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .submit-btn:hover {
            background-color: #1a5bbf;
        }
        .message {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            text-align: center;
        }
        .success {
            background-color: #e8f5e9;
            color: #2e7d32;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Ajouter un Développeur</h1>
        
        <?php if (isset($success)): ?>
            <div class="message success"><?= $success ?></div>
        <?php endif; ?>

        <form method="POST" enctype="multipart/form-data" action="add_devs.php">
            <div class="form-group">
                <label for="fullname">Nom complet</label>
                <input type="text" id="fullname" name="fullname" required>
            </div>
            
            <div class="form-group">
                <label for="stack">Stack</label>
                <input type="text" id="stack" name="stack" required>
            </div>
            
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" required></textarea>
            </div>
            
            <div class="form-group">
                <label for="profile_picture">Photo de profil</label>
                <input type="file" id="profile_picture" name="profile_picture" required>
            </div>
            
            <button type="submit" name="ajt_developpeur" class="submit-btn">Ajouter le développeur</button>
        </form>
    </div>
</body>
</html>