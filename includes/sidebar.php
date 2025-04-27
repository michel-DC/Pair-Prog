<aside class="sidebar">
    <div class="sidebar-header">
        <h3>Tableau de Bord Administrateur</h3>
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
        padding: 20px;
        box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        transition: all 0.3s ease;
        z-index: 1000;
    }
    
    @media (max-width: 768px) {
        .sidebar {
            width: 80px;
            padding: 10px;
        }
        .sidebar .nav-text,
        .sidebar-header h3 {
            display: none;
        }
        .sidebar .nav-icon {
            margin-right: 0;
        }
        .sidebar-footer {
            left: 10px;
            right: 10px;
        }
    }
    
    .sidebar.collapsed {
        width: 80px;
    }
    .sidebar.collapsed .nav-text {
        display: none;
    }
    .sidebar.collapsed .sidebar-header h3 {
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
        color: #2d79f3;
        transition: color 0.2s ease;
    }
    .toggle-btn:hover {
        color: #1a5bbf;
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
        border-radius: 8px;
        margin-bottom: 8px;
        transition: all 0.2s ease-in-out;
        border: 1.5px solid #ecedec;
        background-color: #f8f9fa;
    }
    .nav-link:hover {
        border-color: #2d79f3;
        background-color: #e9f2ff;
        transform: translateX(5px);
    }
    .nav-icon {
        margin-right: 15px;
        font-size: 1.2rem;
        color: #2d79f3;
        transition: margin 0.3s ease;
    }
    .nav-text {
        font-size: 0.95rem;
        font-weight: 500;
        transition: opacity 0.2s ease;
    }
    .sidebar-footer {
        position: absolute;
        bottom: 70px;
        left: 20px;
        right: 20px;
        padding-top: 20px;
        border-top: 1px solid #ecedec;
    }
    .logout-link {
        background-color: #fff0f0;
        border-color: #ffcccc;
    }
    .logout-link:hover {
        background-color: #ffe6e6;
        border-color: #ff9999;
    }
</style>

<script>
    document.getElementById('toggle-sidebar').addEventListener('click', function() {
        const sidebar = document.querySelector('.sidebar');
        sidebar.classList.toggle('collapsed');
    });

    // Handle mobile responsiveness
    window.addEventListener('resize', function() {
        const sidebar = document.querySelector('.sidebar');
        if (window.innerWidth <= 768) {
            sidebar.classList.add('collapsed');
        } else {
            sidebar.classList.remove('collapsed');
        }
    });

    // Initialize on load
    window.addEventListener('DOMContentLoaded', function() {
        if (window.innerWidth <= 768) {
            document.querySelector('.sidebar').classList.add('collapsed');
        }
    });
</script>