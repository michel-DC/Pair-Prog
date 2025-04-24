<?php
// Connexion à la base de données
$link = mysqli_connect("localhost", "micheldjoumessi_pair-prog", "michelchrist", "micheldjoumessi_pair-prog");

// Récupérer la liste des développeurs
$query = "SELECT id, fullname FROM developpeurs ORDER BY fullname ASC";
$result = mysqli_query($link, $query);
$developers = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Traitement du formulaire de sélection
if (isset($_POST['select_developpeur'])) {
    $id = $_POST['id'];
    $query = "SELECT * FROM developpeurs WHERE id = $id";
    $result = mysqli_query($link, $query);
    $selected_developer = mysqli_fetch_assoc($result);
}

// Traitement du formulaire de modification
if (isset($_POST['edit_developpeur'])) {
    $id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $stack = $_POST['stack'];
    $description = $_POST['description'];
    
    $query = "UPDATE developpeurs SET 
                fullname = '$fullname',
                stack = '$stack',
                description = '$description'
              WHERE id = $id";
    
    if (mysqli_query($link, $query)) {
        $success = "Profil développeur mis à jour avec succès !";
        // Rafraîchir les données du développeur
        $query = "SELECT * FROM developpeurs WHERE id = $id";
        $result = mysqli_query($link, $query);
        $selected_developer = mysqli_fetch_assoc($result);
    } else {
        $error = "Erreur lors de la mise à jour du profil.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Profil Développeur</title>
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
            border-radius: 4px;
        }
        .btn {
            background-color: #2d79f3;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #1a5bbf;
        }
        .message {
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 15px;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Modifier un Profil Développeur</h2>
        
        <?php if (isset($success)): ?>
            <div class="message success"><?= $success ?></div>
        <?php endif; ?>
        
        <?php if (isset($error)): ?>
            <div class="message error"><?= $error ?></div>
        <?php endif; ?>

        <?php if (!isset($selected_developer)): ?>
            <form action="dashboard.php#edit-dev-section" method="POST">
                <div class="form-group">
                    <label for="id">Sélectionnez un développeur à modifier</label>
                    <select name="id" id="id" required>
                        <option value="">-- Choisissez un développeur --</option>
                        <?php foreach ($developers as $developer): ?>
                            <option value="<?= $developer['id'] ?>"><?= $developer['fullname'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" name="select_developpeur" class="btn">Sélectionner</button>
            </form>
        <?php else: ?>
            <form action="dashboard.php#edit-dev-section" method="POST">
                <input type="hidden" name="id" value="<?= $selected_developer['id'] ?>">
                
                <div class="form-group">
                    <label for="fullname">Nom complet</label>
                    <input type="text" name="fullname" id="fullname" value="<?= $selected_developer['fullname'] ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="stack">Stack technique</label>
                    <input type="text" name="stack" id="stack" value="<?= $selected_developer['stack'] ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" rows="5" required><?= $selected_developer['description'] ?></textarea>
                </div>
                
                <button type="submit" name="edit_developpeur" class="btn">Mettre à jour</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>