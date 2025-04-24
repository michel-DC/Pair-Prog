<?php
// Connexion à la base de données
$link = mysqli_connect("localhost", "micheldjoumessi_pair-prog", "michelchrist", "micheldjoumessi_pair-prog");

// Récupérer le nombre de développeurs
$query = "SELECT COUNT(*) as total FROM developpeurs";
$result = mysqli_query($link, $query);
$total_devs = mysqli_fetch_assoc($result)['total'];

// Récupérer le nombre d'utilisateurs
$query = "SELECT COUNT(*) as total FROM users";
$result = mysqli_query($link, $query);
$total_users = mysqli_fetch_assoc($result)['total'];

// Récupérer le nombre de réservations - à faire
// $query = "SELECT COUNT(*) as total FROM reservations";
// $result = mysqli_query($link, $query);
// $total_reservations = mysqli_fetch_assoc($result)['total'];

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodePair | Admin Dashboard</title>
    <link rel="shortcut icon" href="../assets/images/icon/codepair_icon.PNG" type="image/x-icon">
    <style>
       @import url('https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap');
        body {
            font-family: "Space Grotesk", sans-serif;
            background-color: #f0f0f0;
            padding-left: 0px;
            margin: 0;
        }
        .dashboard-container {
            max-width: 2000px;
            margin: 0 auto;
            padding: 30px;
        }
        .dashboard-header {
            text-align: center;
            margin-bottom: 40px;
        }
        .dashboard-header h1 {
            color: #151717;
            font-weight: 600;
            font-size: 1.8rem;
        }
        .stats-container {
                display: flex;
                gap: 15px;
                flex-wrap: wrap;
                margin-bottom: 30px;
            }
            .stat-card {
                background: white;
                padding: 10px 15px;
                border-radius: 8px;
                box-shadow: 0 1px 3px rgba(0,0,0,0.1);
                text-align: center;
                flex: 1;
                min-width: 150px;
                max-width: 180px;
                border: 1px solid #ecedec;
                transition: all 0.2s ease-in-out;
                height: 80px;
            }
            .stat-card:hover {
                border-color: #2d79f3;
                background-color: #f8f9fa;
            }
            .stat-number {
                font-size: 1.3rem;
                color: #2d79f3;
                font-weight: 600;
                margin-bottom: 5px;
            }
            .stat-label {
                color: #666;
                font-size: 0.8rem;
                font-weight: 500;
            }
    </style>
</head>
<body>
    <?php include '../includes/sidebar.php'; ?>

    <div id="add-dev-section" style="display: none;">
        <?php include 'add_devs.php'; ?>
    </div>

    <div id="see-dev-section" style="display: none;">
        <?php include '../devs.php'; ?>
    </div>

    <div id="supp-dev-section" style="display: none;">
        <?php include 'supp_devs.php'; ?>
    </div>

    <div id="edit-dev-section" style="display: none;">
        <?php include 'edit_devs.php'; ?>
    </div>
    
    <div class="dashboard-container">
        <div class="dashboard-header">
            <h1>Tableau de Bord Administrateur</h1>
        </div>

        <div class="stats-container">
            <div class="stat-card">
                <div class="stat-number"><?= $total_devs ?></div>
                <div class="stat-label">Développeurs enregistrés</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?= $total_users ?></div>
                <div class="stat-label">Utilisateurs inscrits</div>
            </div>
            <!-- <div class="stat-card">
                <div class="stat-number"><?= $total_reservations ?></div>
                <div class="stat-label">Réservations effectuées</div>
            </div> -->
        </div>

    
    </div>

    <script>
    function showSection(sectionId) {
        document.querySelectorAll('.dashboard-container, #add-dev-section, #see-dev-section, #supp-dev-section, #edit-dev-section')
            .forEach(section => section.style.display = 'none');
        document.getElementById(sectionId).style.display = 'block';
    }

    // Navigation depuis sidebar
    document.getElementById('add-dev-link').addEventListener('click', function(event) {
        event.preventDefault();
        showSection('add-dev-section');
    });

    document.getElementById('see-dev-link').addEventListener('click', function(event) {
        event.preventDefault();
        showSection('see-dev-section');
    });

    document.getElementById('supp-dev-link').addEventListener('click', function(event) {
        event.preventDefault();
        showSection('supp-dev-section');
    });

    document.getElementById('edit-dev-link').addEventListener('click', function(event) {
        event.preventDefault();
        showSection('edit-dev-section');
    });

    // Affiche automatiquement une section si l'ancre est dans l'URL
    window.addEventListener('DOMContentLoaded', function() {
        const anchor = window.location.hash;
        if (anchor && document.querySelector(anchor)) {
            showSection(anchor.substring(1));
        }
    });
</script>

</body>
</html>
