<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} - Paramètres</title>
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
            <a class="nav-link" href="{{ route('admin.avis') }}"><i class="bi bi-chat-left-text"></i> Avis</a>
            <a class="nav-link active" href="{{ route('admin.settings') }}"><i class="bi bi-gear"></i> Paramètres</a>
        </nav>
        <form method="POST" action="{{ route('logout') }}" class="mt-2">
            @csrf
            <button type="submit" class="nav-link btn btn-link text-start p-0"><i class="bi bi-box-arrow-right"></i> Se déconnecter</button>
        </form>
    </aside>
    <main class="main-panel">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="mb-1">Paramètres</h2>
                <p class="text-muted mb-0">Configurez les options de gestion du site.</p>
            </div>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-success">Retour</a>
        </div>
        <div class="card-soft p-4">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th>Paramètre</th>
                            <th>Description</th>
                            <th>État actuel</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Programmes</strong></td>
                            <td>Afficher la section programmes sur la page d’accueil</td>
                            <td>
                                <span class="badge {{ $settings['services_visible'] ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $settings['services_visible'] ? 'Activé' : 'Désactivé' }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Messages</strong></td>
                            <td>Autoriser l’envoi de messages par les membres</td>
                            <td>
                                <span class="badge {{ $settings['messages_enabled'] ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $settings['messages_enabled'] ? 'Activé' : 'Désactivé' }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Avis</strong></td>
                            <td>Autoriser les avis publics</td>
                            <td>
                                <span class="badge {{ $settings['avis_enabled'] ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $settings['avis_enabled'] ? 'Activé' : 'Désactivé' }}
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <hr class="my-4">

            <form method="POST" action="{{ route('admin.settings.save') }}">
                @csrf
                <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" name="services_visible" id="services_visible" value="1" {{ old('services_visible', $settings['services_visible'] ?? true) ? 'checked' : '' }}>
                    <label class="form-check-label" for="services_visible">Afficher les programmes sur la page d’accueil</label>
                </div>
                <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" name="messages_enabled" id="messages_enabled" value="1" {{ old('messages_enabled', $settings['messages_enabled'] ?? true) ? 'checked' : '' }}>
                    <label class="form-check-label" for="messages_enabled">Autoriser l’envoi de messages par les membres</label>
                </div>
                <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" name="avis_enabled" id="avis_enabled" value="1" {{ old('avis_enabled', $settings['avis_enabled'] ?? true) ? 'checked' : '' }}>
                    <label class="form-check-label" for="avis_enabled">Autoriser les avis publics</label>
                </div>
                <div class="mb-3">
                    <label for="whatsapp_support_number" class="form-label">Numéro WhatsApp de support</label>
                    <input type="text" class="form-control" id="whatsapp_support_number" name="whatsapp_support_number" value="{{ old('whatsapp_support_number', $settings['whatsapp_support_number'] ?? '') }}" placeholder="237690000000">
                    <div class="form-text">Ce numéro sera utilisé pour rediriger les messages de contact vers WhatsApp en production.</div>
                </div>
                <button type="submit" class="btn btn-success">Enregistrer les paramètres</button>
            </form>
        </div>
    </main>
</div>
</body>
</html>
