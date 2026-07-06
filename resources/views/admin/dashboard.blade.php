<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} - Tableau de bord Admin</title>
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <style>
        :root {
            --primary: #2d6a4f;
            --primary-dark: #1b4f3a;
            --accent: #f7f5ef;
            --text: #233240;
            --muted: #6c757d;
            --border: #e7e7e7;
        }

        body {
            font-family: 'Open Sans', sans-serif;
            background: linear-gradient(135deg, #f8f6ef 0%, #f4efe7 100%);
            color: var(--text);
        }

        .dashboard-shell {
            min-height: 100vh;
            display: flex;
        }

        .sidebar {
            width: 280px;
            background: linear-gradient(180deg, var(--primary-dark) 0%, var(--primary) 100%);
            color: white;
            padding: 24px 18px;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .sidebar .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 12px;
        }

        .sidebar .brand img {
            width: 46px;
            height: 46px;
            border-radius: 12px;
        }

        .sidebar .nav-link {
            color: rgba(255,255,255,0.9);
            border-radius: 10px;
            padding: 10px 12px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar .nav-link.active, .sidebar .nav-link:hover {
            background: rgba(255,255,255,0.16);
            color: white;
        }

        .main-panel {
            flex: 1;
            padding: 24px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .welcome-card, .profile-card, .stat-card, .panel-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 18px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.04);
        }

        .welcome-card {
            padding: 24px;
            background: linear-gradient(120deg, #ffffff 0%, #f8f4eb 100%);
            margin-bottom: 20px;
        }

        .profile-card {
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 20px;
        }

        .avatar {
            width: 56px;
            height: 56px;
            background: var(--accent);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            color: var(--primary);
        }

        .stat-card {
            padding: 18px;
            height: 100%;
        }

        .stat-card .icon {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: rgba(45,106,79,0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 1.1rem;
            margin-bottom: 12px;
        }

        .panel-card {
            padding: 20px;
        }

        .list-group-item {
            border-left: 0;
            border-right: 0;
            padding-left: 0;
        }

        @media (max-width: 992px) {
            .dashboard-shell { flex-direction: column; }
            .sidebar { width: 100%; }
        }
    </style>
</head>
<body>
    <div class="dashboard-shell">
        <aside class="sidebar">
            <div class="brand">
                <img src="{{ asset('logo/logo_Well_Being.jpeg') }}" alt="Well-Being logo">
                <div>
                    <h5 class="mb-0">Well-Being</h5>
                    <small>Administrateur</small>
                </div>
            </div>

            <nav class="nav flex-column">
                <a class="nav-link active" href="#"><i class="bi bi-grid"></i> Tableau de bord</a>
                <a class="nav-link" href="#"><i class="bi bi-person-circle"></i> Profil</a>
                <a class="nav-link" href="#"><i class="bi bi-people"></i> Utilisateurs</a>
                <a class="nav-link" href="#"><i class="bi bi-heart-pulse"></i> Services</a>
                <a class="nav-link" href="#"><i class="bi bi-chat-left-text"></i> Avis & messages</a>
                <a class="nav-link" href="#"><i class="bi bi-gear"></i> Paramètres</a>
            </nav>

            <div class="mt-auto p-2 rounded-3" style="background: rgba(255,255,255,0.12);">
                <small>Vue de référence</small>
                <p class="mb-0 fw-semibold">Tableau de bord rôle administrateur</p>
            </div>
        </aside>

        <main class="main-panel">
            <div class="topbar">
                <div>
                    <h2 class="mb-1">Espace administrateur</h2>
                    <p class="text-muted mb-0">Bienvenue dans votre tableau de bord de gestion.</p>
                </div>
                <a href="{{ url('/') }}" class="btn btn-outline-success">Retour au site</a>
            </div>

            <div class="welcome-card">
                <div class="row align-items-center g-4">
                    <div class="col-lg-8">
                        <h3 class="mb-2">Bonjour, administrateur</h3>
                        <p class="mb-0 text-muted">Voici un aperçu visuel de l’espace de supervision dédié à votre rôle.</p>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <span class="badge bg-success-subtle text-success px-3 py-2">Rôle : Admin</span>
                    </div>
                </div>
            </div>

            <div class="profile-card">
                <div class="avatar"><i class="bi bi-shield-lock"></i></div>
                <div>
                    <h5 class="mb-1">Profil administrateur</h5>
                    <p class="mb-0 text-muted">Nom, prénom, email et accès de gestion apparaîtront ici.</p>
                </div>
            </div>

            <div class="row g-4 mb-4">
                <div class="col-md-6 col-xl-3">
                    <div class="stat-card">
                        <div class="icon"><i class="bi bi-people"></i></div>
                        <h6 class="mb-1">Utilisateurs</h6>
                        <h3 class="mb-0">128</h3>
                        <small class="text-muted">Membres enregistrés</small>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="stat-card">
                        <div class="icon"><i class="bi bi-heart-pulse"></i></div>
                        <h6 class="mb-1">Services</h6>
                        <h3 class="mb-0">12</h3>
                        <small class="text-muted">Offres actives</small>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="stat-card">
                        <div class="icon"><i class="bi bi-chat-left-text"></i></div>
                        <h6 class="mb-1">Avis</h6>
                        <h3 class="mb-0">46</h3>
                        <small class="text-muted">Commentaires récents</small>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="stat-card">
                        <div class="icon"><i class="bi bi-bell"></i></div>
                        <h6 class="mb-1">Notifications</h6>
                        <h3 class="mb-0">8</h3>
                        <small class="text-muted">À traiter</small>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-7">
                    <div class="panel-card">
                        <h5 class="mb-3">Actions rapides</h5>
                        <div class="list-group list-group-flush">
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                <span>Gérer les comptes membres</span>
                                <button class="btn btn-sm btn-outline-success">Ouvrir</button>
                            </div>
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                <span>Valider les services proposés</span>
                                <button class="btn btn-sm btn-outline-success">Ouvrir</button>
                            </div>
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                <span>Consulter les avis publiés</span>
                                <button class="btn btn-sm btn-outline-success">Ouvrir</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="panel-card">
                        <h5 class="mb-3">Activités récentes</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="d-flex justify-content-between py-2 border-bottom"><span>Nouvelle demande d’adhésion</span><small class="text-muted">Il y a 10 min</small></li>
                            <li class="d-flex justify-content-between py-2 border-bottom"><span>Mise à jour du service bien-être</span><small class="text-muted">Il y a 1 h</small></li>
                            <li class="d-flex justify-content-between py-2"><span>Nouveau commentaire publié</span><small class="text-muted">Aujourd’hui</small></li>
                        </ul>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
