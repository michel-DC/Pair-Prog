<?php
// Connexion à la base de données
$link = mysqli_connect("localhost", "micheldjoumessi_pair-prog", "michelchrist", "micheldjoumessi_pair-prog");

// Récupérer la liste des développeurs
$query = "SELECT id, fullname FROM developpeurs ORDER BY fullname ASC";
$result = mysqli_query($link, $query);
$developers = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Traitement du formulaire de suppression
if (isset($_POST['supp_developpeur'])) {
    $id = $_POST['id'];

    // Vérifier si le développeur existe
    $query = "SELECT * FROM developpeurs WHERE id = $id";
    $result = mysqli_query($link, $query);

    if (mysqli_num_rows($result) > 0) {
        // Supprimer le développeur
        $query = "DELETE FROM developpeurs WHERE id = $id";
        if (mysqli_query($link, $query)) {
            $success = "Développeur supprimé avec succès !";
            // Rafraîchir la liste des développeurs après suppression
            $query = "SELECT id, fullname FROM developpeurs ORDER BY fullname ASC";
            $result = mysqli_query($link, $query);
            $developers = mysqli_fetch_all($result, MYSQLI_ASSOC);
        } else {
            $error = "Erreur lors de la suppression du développeur.";
        }
    } else {
        $error = "Aucun développeur trouvé avec cet ID.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer un Développeur</title>
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
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: white;
        }
        .btn {
            background-color: #ff4444;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #cc0000;
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
        <h2>Supprimer un profil de développeur</h2>
        
        <?php if (isset($success)): ?>
            <div class="message success"><?= $success ?></div>
        <?php endif; ?>
        
        <?php if (isset($error)): ?>
            <div class="message error"><?= $error ?></div>
        <?php endif; ?>

        <form action="dashboard.php#supp-dev-section" method="POST">
            <div class="form-group">
                <label for="id">Sélectionnez un développeur à supprimer</label>
                <select name="id" id="id" required>
                    <option value="">-- Choisissez un développeur --</option>
                    <?php foreach ($developers as $developer): ?>
                        <option value="<?= $developer['id'] ?>"><?= $developer['fullname'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" name="supp_developpeur" class="btn">Supprimer</button>
        </form>
    </div>
</body>
</html>
