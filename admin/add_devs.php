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
        @import url('https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap');
        body {
            font-family: "Space Grotesk", sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .form-container {
            width: 1000px;
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border: 1px solid #ecedec;
        }
        .form-container h1 {
            color: #151717;
            font-weight: 600;
            margin-bottom: 30px;
            text-align: center;
            font-size: 2rem;
        }
        .form-group {
            margin-top: 30px;
            margin-bottom: 25px;
        }
        label {
            display: block;
            margin-bottom: 10px;
            color: #151717;
            font-weight: 500;
            font-size: 1.1rem;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ecedec;
            border-radius: 8px;
            background-color: #f8f9fa;
            transition: border-color 0.2s ease-in-out;
            font-size: 1rem;
        }
        input[type="text"]:focus, textarea:focus {
            border-color: #2d79f3;
            outline: none;
        }
        textarea {
            height: 150px;
            resize: vertical;
        }
        .submit-btn {
            background-color: #2d79f3;
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 500;
            width: 100%;
            transition: background-color 0.2s ease-in-out;
            font-size: 1.1rem;
        }
        .submit-btn:hover {
            background-color: #1a5bbf;
        }
        .message {
            padding: 20px;
            margin-bottom: 25px;
            border-radius: 8px;
            text-align: center;
            font-weight: 500;
            font-size: 1.1rem;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        input[type="file"] {
            padding: 10px;
            border: 1px solid #ecedec;
            border-radius: 8px;
            background-color: #f8f9fa;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Ajouter un Développeur</h1>
        
        <?php if (isset($success)): ?>
            <div class="message success"><?= $success ?></div>
        <?php endif; ?>

        <form method="POST" enctype="multipart/form-data" action="dashboard.php#add-dev-section">
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