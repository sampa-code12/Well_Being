<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} - Modifier le profil</title>
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <style>
        :root { --primary: #2d6a4f; --primary-dark: #1b4f3a; --border: #e7e7e7; }
        body { font-family: 'Segoe UI', sans-serif; background: #f7f5ef; color: #233240; margin: 0; }
        .dashboard-shell { min-height: 100vh; display: flex; flex-wrap: nowrap; }
        .sidebar { width: 280px; min-width: 280px; background: linear-gradient(180deg, var(--primary-dark), var(--primary)); color: white; padding: 24px; display:flex; flex-direction:column; gap:16px; position:sticky; top:0; height:100vh; overflow-y:auto; transition: transform 0.25s ease; }
        .menu-toggle { display: none; }
        .main-panel { flex: 1; padding: 24px; }
        .card-soft { background: white; border-radius: 12px; padding: 18px; border: 1px solid var(--border); }
        .topbar { display:flex; justify-content:space-between; align-items:center; gap:12px; }
        @media (max-width: 992px) {
            .dashboard-shell { flex-direction: column; }
            .menu-toggle { display: inline-flex; align-items: center; justify-content: center; width: 44px; height: 44px; border-radius: 12px; border: none; background: transparent; color: white; }
            .topbar { padding-top: 8px; padding-bottom: 8px; padding-left: 16px; padding-right: 16px; background: var(--primary); color: white; border-bottom-right-radius: 8px; }
            .sidebar { width: 80%; max-width: 320px; min-width: 80%; position: fixed; top: 0; left: 0; z-index: 1050; transform: translateX(-110%); padding-top: 84px; border-bottom-right-radius: 20px; }
            .sidebar.open { transform: translateX(0); }
            .main-panel { padding: 16px; padding-top: 84px; }
            .backdrop { position: fixed; inset: 0; background: rgba(0,0,0,0.35); z-index: 1040; display: none; }
            .backdrop.show { display: block; }
            .menu-toggle { margin-left: 8px; }
        }
    </style>
</head>
<body>
<div class="dashboard-shell">
    <aside class="sidebar">
        <div class="d-flex align-items-center gap-2 mb-4">
            <img src="{{ asset('logo/logo_Well_Being.jpeg') }}" alt="logo" width="46" height="46" class="rounded-3">
            <div>
                <h5 class="mb-0">Well-Being</h5>
                <small>Membre</small>
            </div>
        </div>
        <nav class="nav flex-column">
            <a class="nav-link" href="{{ route('membre.dashboard') }}"><i class="bi bi-grid"></i> Mon espace</a>
            <a class="nav-link active" href="{{ route('membre.profile') }}"><i class="bi bi-person-circle"></i> Mon profil</a>
            <a class="nav-link" href="{{ route('membre.services') }}"><i class="bi bi-heart-pulse"></i> Mes services</a>
            <a class="nav-link" href="{{ route('membre.messages') }}"><i class="bi bi-chat-left-text"></i> Mes messages</a>
            <a class="nav-link" href="{{ route('membre.favorites') }}"><i class="bi bi-bookmark"></i> Mes favoris</a>
        
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="nav-link btn btn-link text-start p-0"><i class="bi bi-box-arrow-right"></i> Se déconnecter</button>
            </form>
        </nav>
    </aside>
    <div class="backdrop" id="sidebarBackdrop"></div>
    <main class="main-panel">
        <div class="topbar mb-3">
            <div class="d-flex align-items-center gap-2">
                <div class="brand d-flex align-items-center gap-2">
                    <img src="{{ asset('logo/logo_Well_Being.jpeg') }}" alt="logo" width="36" height="36" class="rounded-2">
                    <div>
                        <h5 class="mb-0">Modifier le profil</h5>
                        <small class="text-white-50">Mettez à jour vos informations</small>
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-center gap-2">
                <a href="{{ route('membre.profile') }}" class="btn btn-outline-light d-none d-md-inline">Annuler</a>
                <button class="menu-toggle" id="menuToggle" type="button" aria-label="Ouvrir le menu" aria-expanded="false">
                    <i class="bi bi-list fs-4"></i>
                </button>
            </div>
        </div>

        <div class="card-soft">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('membre.profile.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nom</label>
                        <input name="nom" class="form-control" value="{{ old('nom', $user->nom) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Prénom</label>
                        <input name="prenom" class="form-control" value="{{ old('prenom', $user->prenom) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input name="email" type="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Téléphone</label>
                        <input name="tel" class="form-control" value="{{ old('tel', $user->tel) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Profession</label>
                        <input name="profession" class="form-control" value="{{ old('profession', $user->profession) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Ville</label>
                        <input name="ville" class="form-control" value="{{ old('ville', $user->ville) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Pays</label>
                        <input name="pays" class="form-control" value="{{ old('pays', $user->pays) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Nouveau mot de passe <small class="text-muted">(laisser vide pour conserver)</small></label>
                        <input name="password" type="password" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Confirmer le mot de passe</label>
                        <input name="password_confirmation" type="password" class="form-control">
                    </div>
                </div>

                <div class="d-flex gap-2 mt-3">
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                    <a href="{{ route('membre.profile') }}" class="btn btn-outline-secondary">Annuler</a>
                </div>
            </form>
        </div>
    </main>
</div>
</div>
<script>
    const menuToggle = document.getElementById('menuToggle');
    const sidebar = document.querySelector('.sidebar');
    const backdrop = document.getElementById('sidebarBackdrop');

    if (menuToggle && sidebar && backdrop) {
        const toggleMenu = () => {
            const opened = sidebar.classList.toggle('open');
            backdrop.classList.toggle('show', opened);
            menuToggle.setAttribute('aria-expanded', opened ? 'true' : 'false');
        };

        menuToggle.addEventListener('click', toggleMenu);
        backdrop.addEventListener('click', toggleMenu);

        document.querySelectorAll('.sidebar .nav-link').forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth <= 992) {
                    sidebar.classList.remove('open');
                    backdrop.classList.remove('show');
                    menuToggle.setAttribute('aria-expanded', 'false');
                }
            });
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && sidebar.classList.contains('open')) {
                sidebar.classList.remove('open');
                backdrop.classList.remove('show');
                menuToggle.setAttribute('aria-expanded', 'false');
            }
        });
    }
</script>
</body>
</html>
