<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} - Avis</title>
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
            <a class="nav-link" href="{{ url('/') }}"><i class="bi bi-house-door"></i> Retour à l’accueil</a>
            <a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="bi bi-grid"></i> Tableau de bord</a>
            <a class="nav-link" href="{{ route('admin.profile') }}"><i class="bi bi-person-circle"></i> Profil</a>
            <a class="nav-link" href="{{ route('admin.users') }}"><i class="bi bi-people"></i> Utilisateurs</a>
            <a class="nav-link" href="{{ route('wellbeing.programmes') }}"><i class="bi bi-heart-pulse"></i> Programmes</a>
            <a class="nav-link active" href="{{ route('admin.avis') }}"><i class="bi bi-chat-left-text"></i> Avis</a>
            <a class="nav-link" href="{{ route('admin.settings') }}"><i class="bi bi-gear"></i> Paramètres</a>
        </nav>
        <form method="POST" action="{{ route('logout') }}" class="mt-2">
            @csrf
            <button type="submit" class="nav-link btn btn-link text-start p-0"><i class="bi bi-box-arrow-right"></i> Se déconnecter</button>
        </form>
    </aside>
    <main class="main-panel">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="mb-1">Gestion des avis</h2>
                <p class="text-muted mb-0">Modérez les avis et commentaires publiés.</p>
            </div>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-success">Retour</a>
        </div>
        <div class="card-soft p-4">
            <h5 class="mb-3">Avis récents</h5>
            @if($avis->isEmpty())
                <p class="text-muted">Aucun avis n’a encore été publié.</p>
            @else
                <div class="accordion" id="adminAvisAccordion">
                    @foreach($avis as $item)
                        <div class="accordion-item border-0">
                            <h2 class="accordion-header" id="headingAvis{{ $item->idAvis }}">
                                <button class="accordion-button collapsed py-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAvis{{ $item->idAvis }}" aria-expanded="false" aria-controls="collapseAvis{{ $item->idAvis }}">
                                    <div class="d-flex justify-content-between align-items-start gap-3 w-100">
                                        <div class="text-start">
                                            <strong>{{ $item->user?->prenom ?? 'Utilisateur' }} {{ $item->user?->nom ?? '' }}</strong>
                                            <div class="text-muted small">{{ $item->created_at->format('d/m/Y H:i') }}</div>
                                        </div>
                                        <span class="badge bg-success-subtle text-success">{{ $item->StatusModeration }}</span>
                                    </div>
                                </button>
                            </h2>
                            <div id="collapseAvis{{ $item->idAvis }}" class="accordion-collapse collapse" aria-labelledby="headingAvis{{ $item->idAvis }}" data-bs-parent="#adminAvisAccordion">
                                <div class="accordion-body">
                                    <p class="mb-0">{{ $item->contenu }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </main>
</div>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
