<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodePair - Plateforme de Réservation de Sessions de Pair Programming</title>
    <link rel="shortcut icon" href="assets/images/icon/codepair_icon.PNG" type="image/x-icon">
    <style>
        * {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #ffffff;
            color: #151717;
            line-height: 1.6;
        }

        header {
            position: fixed;
            top: 0;
            width: 100%;
            background-color: #ffffff;
            z-index: 1000;
            padding: 15px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .logo {
            font-size: 24px;
            font-weight: 600;
            color: #151717;
        }

        .logo span {
            color: #8a6eff;
        }

        nav ul {
            display: flex;
            list-style: none;
            gap: 30px;
        }

        nav ul li a {
            text-decoration: none;
            color: #151717;
            font-size: 14px;
            font-weight: 500;
            transition: color 0.3s;
        }

        nav ul li a:hover {
            color:rgb(153, 128, 252);
        }

        .container {
            max-width: 1200px;
            margin-top: 150px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .hero {
            text-align: center;
            padding: 180px 20px 100px;
            background-color: transparent;
        }

        .hero h1 {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 20px;
            color: #151717;
        }

        .hero h1 span {
            color: #8a6eff;
            position: relative;
        }

        .hero h1 span::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 100%;
            height: 3px;
            background-color: #8a6eff;
            border-radius: 3px;
        }

        .hero p {
            font-size: 20px;
            max-width: 600px;
            margin: 0 auto 40px;
            color: #5e5e5e;
        }

        .features-heading {
            text-align: center;
            margin: 80px 0 30px;
        }

        .features-heading h2 {
            font-size: 36px;
            margin-bottom: 15px;
            color: #151717;
        }

        .features-heading p {
            color: #5e5e5e;
            max-width: 700px;
            margin: 0 auto;
        }

        .features {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin: 50px 0;
        }

        .feature-card {
            background-color: #f8f9fa;
            border-radius: 12px;
            padding: 40px 30px;
            text-align: center;
            flex: 1;
            transition: transform 0.3s;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border: 1.5px solid #ecedec;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            border: 1.5px solid #2d79f3;
        }

        .feature-card h3 {
            font-size: 24px;
            margin-bottom: 15px;
            color: #151717;
        }

        .feature-card p {
            color: #5e5e5e;
        }

        .testimonials {
            text-align: center;
            padding: 80px 0;
            background-color: #f8f9fa;
        }

        .testimonials h2 {
            font-size: 36px;
            margin-bottom: 50px;
            color: #151717;
        }

        .testimonial-container {
            display: flex;
            gap: 30px;
            justify-content: center;
            margin-top: 40px;
        }

        .testimonial {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            max-width: 350px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border: 1.5px solid #ecedec;
        }

        .testimonial p {
            font-style: italic;
            margin-bottom: 20px;
            color: #151717;
        }

        .testimonial cite {
            color: #5e5e5e;
        }

        footer {
            background-color: #f8f9fa;
            padding: 60px 0 30px;
            margin-top: 80px;
            border-top: 1px solid #ecedec;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .footer-links {
            display: flex;
            gap: 50px;
        }

        .footer-column h4 {
            font-size: 18px;
            margin-bottom: 20px;
            color: #151717;
        }

        .footer-column ul {
            list-style: none;
        }

        .footer-column ul li {
            margin-bottom: 10px;
        }

        .footer-column ul li a {
            color: #5e5e5e;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-column ul li a:hover {
            color: #2d79f3;
        }

        .social-media {
            display: flex;
            gap: 20px;
            margin-top: 20px;
        }

        .social-media a {
            color: #5e5e5e;
            text-decoration: none;
            transition: color 0.3s;
        }

        .social-media a:hover {
            color: #2d79f3;
        }

        .copyright {
            text-align: center;
            color: #5e5e5e;
            margin-top: 50px;
            padding-top: 20px;
            border-top: 1px solid #ecedec;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }

        @media (max-width: 768px) {
            .header-container {
                flex-direction: column;
                gap: 15px;
            }
            
            .features {
                flex-direction: column;
            }
            
            .testimonial-container {
                flex-direction: column;
                align-items: center;
            }
            
            .footer-content {
                flex-direction: column;
                gap: 30px;
            }
            
            .footer-links {
                flex-direction: column;
                gap: 30px;
            }
        }
    </style>
</head>

<body>
    <header>
        <div class="header-container">
            <div class="logo">Code<span>Pair</span></div>
            <nav>
                <ul>
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="devs.php">Développeurs</a></li>
                    <li><a href="../reservation/reserve.php">Réserver</a></li>
                    <li><a href="../connexion/login.php">Connexion</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="hero" id="accueil">
        <div class="container">
            <h1>Bienvenue sur <span>CodePair</span></h1>
            <p>Organisez vos sessions de pair programming de manière efficace et collaborative avec notre plateforme intuitive.</p>
        <div class="cta-buttons">
            <a href="devs.php" class="cta-button white">Voir tous les développeurs</a>
            <a href="../connexion/register.php" class="cta-button purple">Créer un compte</a>
        </div>
        <style>
            .cta-buttons {
                display: flex;
                gap: 20px;
                justify-content: center;
                margin-top: 30px;
            }
            
            .cta-button {
                padding: 12px 24px;
                border-radius: 5px;
                text-decoration: none;
                font-weight: 500;
                transition: all 0.3s;
            }
            
            .cta-button.white {
                background-color: #fff;
                color: #0a0a0a;
                border: 1px solid #8a6eff;
            }
            
            .cta-button.white:hover {
                background-color: #f5f5f7;
            }
            
            .cta-button.purple {
                background-color: #8a6eff;
                color: #fff;
            }
            
            .cta-button.purple:hover {
                background-color: #6e4eff;
            }
        </style>
        </div>
    </section>

    <div class="container">
        <div class="features-heading">
            <h2>Avec nous vous pourrez :</h2>
            <p>Découvrez nos outils pour simplifier l'organisation de vos sessions de pair programming.</p>
        </div>

        <div class="features">
            <div class="feature-card">
                <h3>Planification</h3>
                <p>Organisez vos sessions facilement avec notre outil de planification avancé. Choisissez l'heure et le développeur qui vous convient.</p>
            </div>
            <div class="feature-card">
                <h3>Collaboration</h3>
                <p>Travaillez avec votre équipe en temps réel pour une meilleure coordination et un apprentissage enrichissant.</p>
            </div>
            <div class="feature-card">
                <h3>Suivi</h3>
                <p>Suivez l'avancement de vos sessions et ajustez vos plans en conséquence pour maximiser votre apprentissage.</p>
            </div>
        </div>
    </div>

    <section class="testimonials">
        <div class="container">
            <h2>Témoignages de clients satisfaits</h2>
            <div class="testimonial-container">
                <div class="testimonial">
                    <p>"Une expérience incroyable ! J'ai appris tellement de choses en peu de temps grâce aux développeurs disponibles sur la plateforme."</p>
                    <cite>- Sophie Martin, Développeuse Junior</cite>
                </div>
                <div class="testimonial">
                    <p>"Les développeurs sont très compétents et m'ont aidé à réaliser mon projet. La plateforme est intuitive et facile à utiliser."</p>
                    <cite>- Thomas Dubois, Entrepreneur</cite>
                </div>
                <div class="testimonial">
                    <p>"Les développeurs sont très compétents et m'ont aidé à réaliser mon projet. La plateforme est intuitive et facile à utiliser."</p>
                    <cite>- Thomas Dubois, Entrepreneur</cite>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="footer-content">
            <div class="logo">Code<span>Pair</span></div>
            <div class="footer-links">
                <div class="footer-column">
                    <h4>Plateforme</h4>
                    <ul>
                        <li><a href="#accueil">Accueil</a></li>
                        <li><a href="#developpeurs">Développeurs</a></li>
                        <li><a href="#reserver">Réserver</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h4>Compte</h4>
                    <ul>
                        <li><a href="../connexion/login.php">Connexion</a></li>
                        <li><a href="../connexion/register.php">Inscription</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h4>Suivez-nous</h4>
                    <div class="social-media">
                        <a href="#">Facebook</a>
                        <a href="#">Twitter</a>
                        <a href="#">LinkedIn</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <p>© 2025 CodePair. Tous droits réservés.</p>
        </div>
    </footer>
</body>
</html>