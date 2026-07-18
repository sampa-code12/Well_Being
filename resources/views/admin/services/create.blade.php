<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} - Ajouter un programme</title>
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
        <form method="POST" action="{{ route('logout') }}" class="mt-2">
            @csrf
            <button type="submit" class="nav-link btn btn-link text-start p-0"><i class="bi bi-box-arrow-right"></i> Se déconnecter</button>
        </form>
    </aside>
    <main class="main-panel">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="mb-1">Ajouter un programme</h2>
                <p class="text-muted mb-0">Créez un nouveau programme avec une image et une description.</p>
            </div>
            <a href="{{ route('admin.services.index') }}" class="btn btn-outline-success">Retour</a>
        </div>

        <div class="card-soft p-4">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.services.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Titre</label>
                    <input type="text" name="titre" value="{{ old('titre') }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="5" required>{{ old('description') }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Illustration (fichier)</label>
                    <input type="file" name="image" accept="image/*" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Ou URL de l'image (optionnel)</label>
                    <input type="text" name="image_url" value="{{ old('image_url') }}" class="form-control" placeholder="assets/img/services/service-1.jpg">
                </div>
                <button type="submit" class="btn btn-success">Créer le service</button>
            </form>
        </div>
    </main>
</div>
</body>
</html>
