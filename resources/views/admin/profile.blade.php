<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} - Profil Admin</title>
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f7f5ef; color: #233240; }
        .dashboard-shell { min-height: 100vh; display: flex; }
        .sidebar { width: 280px; background: linear-gradient(180deg, #1b4f3a 0%, #2d6a4f 100%); color: white; padding: 24px 18px; }
        .sidebar .nav-link { color: rgba(255,255,255,0.9); border-radius: 10px; padding: 10px 12px; }
        .sidebar .nav-link.active, .sidebar .nav-link:hover { background: rgba(255,255,255,0.16); color: white; }
        .main-panel { flex: 1; padding: 24px; }
        .card-soft { background: white; border-radius: 18px; box-shadow: 0 8px 25px rgba(0,0,0,0.04); border: 1px solid #e7e7e7; }
    </style>
</head>
<body>
<div class="dashboard-shell">
    <aside class="sidebar">
        <div class="d-flex align-items-center gap-2 mb-4">
            <img src="{{ asset('logo/logo_Well_Being.jpeg') }}" alt="logo" width="46" height="46" class="rounded-3">
            <div>
                <h5 class="mb-0">Well-Being</h5>
                <small>Administrateur</small>
            </div>
        </div>
        <nav class="nav flex-column">
            <a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="bi bi-grid"></i> Tableau de bord</a>
            <a class="nav-link active" href="{{ route('admin.profile') }}"><i class="bi bi-person-circle"></i> Profil</a>
            <a class="nav-link" href="{{ route('admin.users') }}"><i class="bi bi-people"></i> Utilisateurs</a>
            <a class="nav-link" href="{{ route('admin.services.index') }}"><i class="bi bi-heart-pulse"></i> Services</a>
            <a class="nav-link" href="{{ route('admin.avis') }}"><i class="bi bi-chat-left-text"></i> Avis</a>
            <a class="nav-link" href="{{ route('admin.settings') }}"><i class="bi bi-gear"></i> Paramètres</a>
        </nav>
    </aside>
    <main class="main-panel">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="mb-1">Profil administrateur</h2>
                <p class="text-muted mb-0">Consultez et gérez votre profil d’administration.</p>
            </div>
            <a href="{{ url('/') }}" class="btn btn-outline-success">Retour au site</a>
        </div>
        <div class="card-soft p-4">
            <h5 class="mb-3">Informations du compte</h5>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Nom</label>
                    <input type="text" class="form-control" value="{{ auth()->user()->nom ?? 'Admin' }}" disabled>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Prénom</label>
                    <input type="text" class="form-control" value="{{ auth()->user()->prenom ?? 'Well-Being' }}" disabled>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" value="{{ auth()->user()->email ?? '' }}" disabled>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Rôle</label>
                    <input type="text" class="form-control" value="Administrateur" disabled>
                </div>
            </div>
        </div>
    </main>
</div>
</body>
</html>
