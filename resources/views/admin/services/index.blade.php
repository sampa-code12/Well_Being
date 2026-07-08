<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} - Gestion des services</title>
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
        .service-thumbnail { width: 80px; height: 80px; object-fit: cover; border-radius: 12px; }
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
            <a class="nav-link active" href="{{ route('admin.services.index') }}"><i class="bi bi-heart-pulse"></i> Services</a>
            <a class="nav-link" href="{{ route('admin.avis') }}"><i class="bi bi-chat-left-text"></i> Avis</a>
            <a class="nav-link" href="{{ route('admin.messages') }}"><i class="bi bi-envelope"></i> Messages</a>
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
                <h2 class="mb-1">Gestion des services</h2>
                <p class="text-muted mb-0">Créez, modifiez et supprimez les services visibles sur le site.</p>
            </div>
            <a href="{{ route('admin.services.create') }}" class="btn btn-success">Ajouter un service</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card-soft p-4">
            @if($services->isEmpty())
                <p class="text-muted">Aucun service n’a été trouvé.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-borderless align-middle mb-0">
                        <thead>
                            <tr>
                                <th>Illustration</th>
                                <th>Titre</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($services as $service)
                                <tr>
                                    <td>
                                        @if($service->image_url)
                                            <img src="{{ asset($service->image_url) }}" alt="{{ $service->titre }}" class="service-thumbnail">
                                        @else
                                            <span class="text-muted">Aucune image</span>
                                        @endif
                                    </td>
                                    <td>{{ $service->titre }}</td>
                                    <td>{{ Str::limit($service->description, 100) }}</td>
                                    <td>
                                        <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-sm btn-outline-primary me-2">Modifier</a>
                                        <form method="POST" action="{{ route('admin.services.destroy', $service) }}" class="d-inline" onsubmit="return confirm('Supprimer ce service ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </main>
</div>
</body>
</html>
