<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Voyageurs - Bienvenue</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --dark-blue: #368af8;
            --light-blue: #4fc3f7;
            --ash-gray: #b0bec5;
            --gold: #ffc107;
            --red: #d32f2f;
        }

        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8fafc;
        }

        .welcome-container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .header {
            background-color: var(--dark-blue);
            padding: 2rem 0;
            color: white;
            text-align: center;
        }

        .dev-info {
            background-color: var(--ash-gray);
            padding: 1rem;
            text-align: center;
            border-bottom: 4px solid var(--gold);
        }

        .features-section {
            padding: 4rem 0;
            background-color: white;
        }

        .feature-card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            height: 100%;
            transition: transform 0.3s;
            border-top: 4px solid var(--dark-blue);
        }

        .feature-card:hover {
            transform: translateY(-5px);
        }

        .feature-icon {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: var(--light-blue);
        }

        .btn-primary {
            background-color: var(--dark-blue);
            border-color: var(--dark-blue);
        }

        .btn-primary:hover {
            background-color: #0d1b69;
            border-color: #0d1b69;
        }

        .btn-outline-warning {
            color: var(--gold);
            border-color: var(--gold);
        }

        .btn-outline-warning:hover {
            background-color: var(--gold);
            color: white;
        }

        .btn-danger {
            background-color: var(--red);
            border-color: var(--red);
        }

        .footer {
            background-color: var(--dark-blue);
            color: white;
            padding: 2rem 0;
            margin-top: auto;
        }

        .contact-info {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 1rem 0;
        }

        .contact-info i {
            margin-right: 0.5rem;
            color: var(--gold);
        }

        .nav-buttons {
            margin: 2rem 0;
        }

        .nav-buttons .btn {
            margin: 0 0.5rem;
        }

        .navbar {
            background-color: var(--dark-blue);
        }

        .navbar-brand, .nav-link {
            color: white !important;
        }

        .nav-link:hover {
            color: var(--light-blue) !important;
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="#">Gestion des Voyageurs</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('voyageurs.index') }}">Voyageurs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('sejours.index') }}">Séjours</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('hebergements.index') }}">Hébergements</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Header -->
        <header class="header">
            <div class="container">
                <h1 class="display-4">Gestion des Voyageurs</h1>
                <p class="lead">Une application complète pour gérer vos voyageurs, séjours et hébergements.</p>
            </div>
        </header>

        <!-- Developer Info -->
        <div class="dev-info">
            <div class="container">
                <h4>Développé par <span style="color: var(--dark-blue);">Malthus AMETEPE</span></h4>
                <div class="contact-info">
                    <i class="fas fa-envelope"></i>
                    <a href="mailto:ametepemalthus16@gmail.com" class="text-decoration-none text-dark">ametepemalthus16@gmail.com</a>
                </div>
            </div>
        </div>

        <!-- Features Section -->
        <section class="features-section">
            <div class="container">
                <h2 class="text-center mb-5" style="color: var(--dark-blue);">Fonctionnalités</h2>

                <div class="row g-4">
                    <!-- Feature 1 -->
                    <div class="col-md-4">
                        <div class="feature-card card p-4">
                            <div class="text-center">
                                <div class="feature-icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <h4>Gestion des Voyageurs</h4>
                                <p class="text-muted">Ajoutez, modifiez et suivez les informations de vos voyageurs.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Feature 2 -->
                    <div class="col-md-4">
                        <div class="feature-card card p-4">
                            <div class="text-center">
                                <div class="feature-icon">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                                <h4>Gestion des Séjours</h4>
                                <p class="text-muted">Planifiez et organisez les séjours pour chaque voyageur.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Feature 3 -->
                    <div class="col-md-4">
                        <div class="feature-card card p-4">
                            <div class="text-center">
                                <div class="feature-icon">
                                    <i class="fas fa-hotel"></i>
                                </div>
                                <h4>Gestion des Hébergements</h4>
                                <p class="text-muted">Gérez les différents types d'hébergements disponibles.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Navigation Buttons -->
                <div class="text-center nav-buttons">
                    <a href="{{ route('voyageurs.index') }}" class="btn btn-primary btn-lg">
                        <i class="fas fa-users me-2"></i>Voyageurs
                    </a>
                    <a href="{{ route('sejours.index') }}" class="btn btn-outline-warning btn-lg">
                        <i class="fas fa-calendar-alt me-2"></i>Séjours
                    </a>
                    <a href="{{ route('hebergements.index') }}" class="btn btn-danger btn-lg">
                        <i class="fas fa-hotel me-2"></i>Hébergements
                    </a>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="footer">
            <div class="container text-center">
                <p>&copy; {{ date('Y') }} Gestion des Voyageurs. Tous droits réservés.</p>
                <p>Conçu et développé par <strong>Malthus AMETEPE</strong></p>
            </div>
        </footer>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
