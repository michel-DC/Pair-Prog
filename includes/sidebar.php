<aside class="sidebar">
    <div class="sidebar-header">
        <h2>Tableau de Bord Administrateur</h2>
        <button id="toggle-sidebar" class="toggle-btn">☰</button>
    </div>
    <nav class="sidebar-nav">
        <ul>
            <li>
                <a href="dashboard.php" class="nav-link">
                    <span class="nav-icon">📊</span>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#" id="add-dev-link" class="nav-link">
                    <span class="nav-icon">➕</span>
                    <span class="nav-text">Ajouter un développeur</span>
                </a>
            </li>
            <li> 
                <a href="#" id="supp-dev-link" class="nav-link">
                    <span class="nav-icon">⛔</span>
                    <span class="nav-text">Supprimer un développeur</span>
                </a>
            </li>
            <li> 
                <a href="#" id="edit-dev-link" class="nav-link">
                    <span class="nav-icon">✏️</span>
                    <span class="nav-text">Modifier un profil</span>
                </a>
            </li>
            <li> 
                <a href="#" id="see-dev-link" class="nav-link">
                    <span class="nav-icon">👨‍💻</span>
                    <span class="nav-text">Voir tout les développeurs</span>
                </a>
            </li>
            <li> 
                <a href="#" id="see-reserv-link" class="nav-link">
                    <span class="nav-icon">🗓️</span>
                    <span class="nav-text">Voir toutes les réservations</span>
                </a>
            </li>
            <li>
                <a href="#" id="see-user-link" class="nav-link">
                    <span class="nav-icon">👤</span>
                    <span class="nav-text">Gérer Utilisateurs</span>
                </a>
            </li>
        </ul>
    </nav>
    <div class="sidebar-footer">
        <a href="../connexion/logout-admin.php" class="nav-link logout-link">
            <span class="nav-icon">╰┈➤🚪</span>
            <span class="nav-text">Déconnexion</span>
        </a>
    </div>
</aside>

<style>
    .sidebar {
        width: 250px;
        background: #ffffff;
        color: #151717;
        height: 100vh;
        position: fixed;
        left: 0;
        top: 0;
        padding: 30px;
        box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        transition: width 0.3s ease;
    }
    .sidebar.collapsed {
        width: 80px;
    }
    .sidebar.collapsed .nav-text {
        display: none;
    }
    .sidebar.collapsed .sidebar-header h2 {
        display: none;
    }
    .sidebar-header {
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 1px solid #ecedec;
        position: relative;
    }
    .toggle-btn {
        position: absolute;
        right: 0;
        top: 0;
        background: none;
        border: none;
        cursor: pointer;
        font-size: 1.5rem;
        padding: 5px;
    }
    .sidebar-nav ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .nav-link {
        display: flex;
        align-items: center;
        padding: 12px 15px;
        color: #151717;
        text-decoration: none;
        border-radius: 10px;
        margin-bottom: 5px;
        transition: all 0.2s ease-in-out;
        border: 1.5px solid #ecedec;
    }
    .nav-link:hover {
        border: 1.5px solid #2d79f3;
        background-color: #f8f9fa;
    }
    .nav-icon {
        margin-right: 15px;
        font-size: 1.2rem;
    }
    .nav-text {
        font-size: 1rem;
        font-weight: 500;
        transition: opacity 0.2s ease;
    }
    .sidebar-footer {
        position: absolute;
        bottom: 70px;
        left: 30px;
        right: 30px;
        padding-top: 20px;
        border-top: 1px solid #ecedec;
    }
    .logout-link {
        background-color: #fff0f0;
        border-color: #ffcccc;
    }
    .logout-link:hover {
        background-color: #ffe6e6;
    }
</style>

<script>
    document.getElementById('toggle-sidebar').addEventListener('click', function() {
        const sidebar = document.querySelector('.sidebar');
        sidebar.classList.toggle('collapsed');
    });
</script>