<?php 
require_once '../includes/auth.php'; 
$_SESSION['connecté'] = true;

// Connexion à la base de données
$link = mysqli_connect("localhost", "micheldjoumessi_pair-prog", "michelchrist", "micheldjoumessi_pair-prog");

// Récupérer le nombre de développeurs
$query = "SELECT COUNT(*) as total FROM developpeurs";
$result = mysqli_query($link, $query);
$total_devs = mysqli_fetch_assoc($result)['total'];

// Récupérer le nombre d'utilisateurs
$query2 = "SELECT COUNT(*) as total FROM users";
$result2 = mysqli_query($link, $query2);
$total_users = mysqli_fetch_assoc($result2)['total'];

// Récupérer l'évolution du nombre de développeurs par jour
$query3 = "SELECT DATE(date_creation) as date, COUNT(*) as count FROM developpeurs GROUP BY DATE(date_creation)";
$result3 = mysqli_query($link, $query3);
$dev_evolution = [];
while ($row = mysqli_fetch_assoc($result3)) {
    $dev_evolution[] = $row;
}

// Récupérer l'évolution du nombre d'utilisateurs par jour
$query4 = "SELECT DATE(date_creation) as date, COUNT(*) as count FROM users GROUP BY DATE(date_creation)";
$result4 = mysqli_query($link, $query4);
$user_evolution = [];
while ($row = mysqli_fetch_assoc($result4)) {
    $user_evolution[] = $row;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodePair | Admin Dashboard</title>
    <link rel="shortcut icon" href="../assets/images/icon/codepair_icon.PNG" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
        }
        .dashboard-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .dashboard-header {
            text-align: center;
            margin-bottom: 30px;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .dashboard-header h1 {
            margin: 0;
            font-size: 2rem;
            color: #000;
        }
        .stats-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 30px;
            margin-bottom: 30px;
        }
        .stat-card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            text-align: center;
            transition: all 0.2s ease-in-out;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.2);
        }
        .stat-number {
            font-size: 2.5rem;
            color: #8a6eff;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .stat-label {
            font-size: 1rem;
            color: #666;
        }
        .message {
            padding: 10px;
            border-radius: 5px;
            margin: 10px auto;
            text-align: center;
            width: 90%;
            max-width: 450px;
            position: absolute;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            animation: fadeOut 5s forwards;
        }
        @keyframes fadeOut {
            0% { opacity: 1; }
            90% { opacity: 1; }
            100% { opacity: 0; display: none; }
        }
        .error {
            background-color: #ffebee;
            color: #c62828;
        }
        .success {
            background-color: #e8f5e9;
            color: #2e7d32;
        }
        canvas {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
<?php include '../includes/sidebar.php'; ?>

<div id="add-dev-section" style="display: none;"><?php include 'add_devs.php'; ?></div>
<div id="supp-dev-section" style="display: none;"><?php include 'supp_devs.php'; ?></div>
<div id="edit-dev-section" style="display: none;"><?php include 'edit_devs.php'; ?></div>
<div id="see-dev-section" style="display: none;"><?php include 'devs.php'; ?></div>
<div id="see-user-section" style="display: none;"><?php include 'user.php'; ?></div>

<div class="dashboard-container">
    <div class="dashboard-header">
        <h1>Tableau de Bord Administrateur</h1>
    </div>

    <div class="stats-container">
        <div class="stat-card">
            <div class="stat-number"><?= $total_devs ?></div>
            <div class="stat-label">Développeurs enregistrés 👨‍💻</div>
        </div>
        <div class="stat-card">
            <div class="stat-number"><?= $total_users ?></div>
            <div class="stat-label">Utilisateurs inscrits 👤</div>
        </div>
        <div class="stat-card">
            <canvas id="devEvolutionGraph"></canvas>
            <div class="stat-label">Évolution des développeurs 👨‍💻</div>
        </div>
        <div class="stat-card">
            <canvas id="userEvolutionGraph"></canvas>
            <div class="stat-label">Évolution des utilisateurs 👤</div>
        </div>
    </div>
</div>

<?php
if (isset($_GET['erreur']) && $_GET['erreur'] === 'acces_interdit_admin') {
    echo "<div class='message error'>Vous devez être connecté en tant qu'utilisateur pour accéder à cette page, déconnectez-vous d'abord.</div>";
}
?>

<script>
function showSection(sectionId) {
    document.querySelectorAll('.dashboard-container, #add-dev-section, #see-dev-section, #supp-dev-section, #edit-dev-section, #see-user-section')
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
document.getElementById('see-user-link').addEventListener('click', function(event) {
    event.preventDefault();
    showSection('see-user-section');
});


// Gestion de l'ancre dans l'URL
window.addEventListener('DOMContentLoaded', function() {
    const anchor = window.location.hash;
    if (anchor && document.querySelector(anchor)) {
        showSection(anchor.substring(1));
    }
});

// Gestion des graphiques
const devEvolutionData = <?= json_encode($dev_evolution) ?>;
const userEvolutionData = <?= json_encode($user_evolution) ?>;

const devLabels = devEvolutionData.map(data => data.date);
const devCounts = devEvolutionData.map(data => data.count);

const userLabels = userEvolutionData.map(data => data.date);
const userCounts = userEvolutionData.map(data => data.count);

const devCtx = document.getElementById('devEvolutionGraph').getContext('2d');
const devChart = new Chart(devCtx, {
    type: 'line',
    data: {
        labels: devLabels,
        datasets: [{
            label: 'Développeurs',
            data: devCounts,
            borderColor: '#8a6eff',
            fill: false
        }]
    },
    options: {
        responsive: true,
        plugins: { legend: { display: false } }
    }
});

const userCtx = document.getElementById('userEvolutionGraph').getContext('2d');
const userChart = new Chart(userCtx, {
    type: 'line',
    data: {
        labels: userLabels,
        datasets: [{
            label: 'Utilisateurs',
            data: userCounts,
            borderColor: '#ff6e6e',
            fill: false
        }]
    },
    options: {
        responsive: true,
        plugins: { legend: { display: false } }
    }
});
</script>

</body>
</html>
