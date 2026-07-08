<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} - Utilisateurs</title>
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
            <a class="nav-link active" href="{{ route('admin.users') }}"><i class="bi bi-people"></i> Utilisateurs</a>
            <a class="nav-link" href="{{ route('admin.services.index') }}"><i class="bi bi-heart-pulse"></i> Services</a>
            <a class="nav-link" href="{{ route('admin.avis') }}"><i class="bi bi-chat-left-text"></i> Avis</a>
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
                <h2 class="mb-1">Gestion des utilisateurs</h2>
                <p class="text-muted mb-0">Consultez les comptes membres et administrateurs.</p>
            </div>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-success">Retour</a>
        </div>
        <div class="card-soft p-4">
            <h5 class="mb-3">Liste des utilisateurs</h5>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @if($users->isEmpty())
                <p class="text-muted">Aucun utilisateur n’a été trouvé.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-borderless align-middle mb-0">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Rôle</th>
                                <th>Inscription</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $userItem)
                                <tr>
                                    <td>{{ $userItem->prenom }} {{ $userItem->nom }}</td>
                                    <td>{{ $userItem->email }}</td>
                                    <td>{{ ucfirst($userItem->role->value ?? $userItem->role) }}</td>
                                    <td>{{ $userItem->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        @if(auth()->id() !== $userItem->idUser)
                                            <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-delete-url="{{ route('admin.users.destroy', $userItem) }}" data-user-name="{{ $userItem->prenom }} {{ $userItem->nom }}">
                                                Supprimer
                                            </button>
                                        @else
                                            <span class="text-muted">Actuel</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

        <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmation de suppression</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                    </div>
                    <div class="modal-body">
                        <p>Voulez-vous vraiment supprimer l’utilisateur <strong id="deleteUserName"></strong> ? Cette action est irréversible.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <form id="deleteUserForm" method="POST" action="">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var confirmDeleteModal = document.getElementById('confirmDeleteModal');
                if (!confirmDeleteModal) {
                    return;
                }

                confirmDeleteModal.addEventListener('show.bs.modal', function (event) {
                    var button = event.relatedTarget;
                    var deleteUrl = button.getAttribute('data-delete-url');
                    var userName = button.getAttribute('data-user-name');
                    var userNameElement = document.getElementById('deleteUserName');
                    var deleteForm = document.getElementById('deleteUserForm');

                    if (userNameElement) {
                        userNameElement.textContent = userName;
                    }
                    if (deleteForm) {
                        deleteForm.action = deleteUrl;
                    }
                });
            });
        </script>
    </main>
</div>
</body>
</html>
