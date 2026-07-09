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
                <a class="nav-link" href="{{ url('/') }}"><i class="bi bi-house-door"></i> Retour à l’accueil</a>
                <a class="nav-link active" href="{{ route('admin.dashboard') }}"><i class="bi bi-grid"></i> Tableau de bord</a>
                <a class="nav-link" href="{{ route('admin.profile') }}"><i class="bi bi-person-circle"></i> Profil</a>
                <a class="nav-link" href="{{ route('admin.users') }}"><i class="bi bi-people"></i> Utilisateurs</a>
                <a class="nav-link" href="{{ route('admin.services.index') }}"><i class="bi bi-heart-pulse"></i> Services</a>
                <a class="nav-link" href="{{ route('admin.avis') }}"><i class="bi bi-chat-left-text"></i> Avis</a>
                <a class="nav-link" href="{{ route('admin.messages') }}"><i class="bi bi-envelope"></i> Messages</a>
                <a class="nav-link" href="{{ route('admin.settings') }}"><i class="bi bi-gear"></i> Paramètres</a>
            </nav>

            <form method="POST" action="{{ route('logout') }}" class="mt-2">
                @csrf
                <button type="submit" class="nav-link btn btn-link text-start p-0"><i class="bi bi-box-arrow-right"></i> Se déconnecter</button>
            </form>

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
                        <h3 class="mb-0">{{ $totalUsers }}</h3>
                        <small class="text-muted">{{ $totalMembers }} membres · {{ $totalAdmins }} admins</small>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="stat-card">
                        <div class="icon"><i class="bi bi-heart-pulse"></i></div>
                        <h6 class="mb-1">Services</h6>
                        <h3 class="mb-0">{{ $totalServices }}</h3>
                        <small class="text-muted">Offres actives</small>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="stat-card">
                        <div class="icon"><i class="bi bi-chat-left-text"></i></div>
                        <h6 class="mb-1">Avis</h6>
                        <h3 class="mb-0">{{ $totalAvis }}</h3>
                        <small class="text-muted">Commentaires recensés</small>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="stat-card">
                        <div class="icon"><i class="bi bi-envelope"></i></div>
                        <h6 class="mb-1">Messages</h6>
                        <h3 class="mb-0">{{ $totalMessages }}</h3>
                        <small class="text-muted">Communications reçues</small>
                    </div>
                </div>
            </div>

            <div class="panel-card mb-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="mb-0">Avis publiés</h5>
                    <span class="badge bg-success-subtle text-success">{{ $recentAvis->count() }} à l’affichage</span>
                </div>
                <div class="list-group list-group-flush">
                    @forelse($recentAvis as $item)
                        <div class="list-group-item d-flex justify-content-between align-items-start gap-3">
                            <div>
                                <div class="fw-semibold">{{ optional($item->user)->prenom }} {{ optional($item->user)->nom }}</div>
                                <small class="text-muted">{{ $item->created_at->format('d/m/Y H:i') }}</small>
                                <p class="mb-0 mt-2 text-break">{{ \Illuminate\Support\Str::limit($item->contenu, 120) }}</p>
                            </div>
                            <span class="badge bg-success-subtle text-success">Publié</span>
                        </div>
                    @empty
                        <div class="text-muted">Aucun avis publié pour le moment.</div>
                    @endforelse
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-7">
                    <div class="panel-card">
                        <h5 class="mb-3">Nouveaux utilisateurs</h5>
                        <div class="list-group list-group-flush">
                            @forelse($recentUsers as $recentUser)
                                <div class="list-group-item d-flex justify-content-between align-items-start gap-3">
                                    <div>
                                        <div class="fw-semibold">{{ $recentUser->prenom }} {{ $recentUser->nom }}</div>
                                        <small class="text-muted">{{ $recentUser->email }} · {{ ucfirst($recentUser->role->value ?? $recentUser->role) }}</small>
                                    </div>
                                    <span class="badge bg-success-subtle text-success">{{ $recentUser->created_at->format('d/m') }}</span>
                                </div>
                            @empty
                                <div class="text-muted">Aucun nouvel utilisateur enregistré récemment.</div>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="panel-card">
                        <h5 class="mb-3">Derniers messages reçus</h5>
                        <div class="list-group list-group-flush">
                            @forelse($recentMessages as $recentMessage)
                                <div class="list-group-item">
                                    <div class="fw-semibold text-break-all">{{ $recentMessage->user?->prenom ?? 'Inconnu' }} {{ $recentMessage->user?->nom ?? '' }}</div>
                                    <small class="text-muted">{{ $recentMessage->created_at->format('d/m/Y H:i') }}</small>
                                    <p class="mb-0 mt-2">{{ \Illuminate\Support\Str::limit($recentMessage->contenu, 100) }}</p>
                                </div>
                            @empty
                                <div class="text-muted">Aucun message reçu pour le moment.</div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
