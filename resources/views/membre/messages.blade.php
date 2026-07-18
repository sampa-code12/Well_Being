<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} - Messages</title>
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

            body { font-family: 'Segoe UI', sans-serif; background: #f7f5ef; color: var(--text); margin: 0; }
            .dashboard-shell { min-height: 100vh; display: flex; flex-wrap: nowrap; }
            .sidebar { width: 280px; min-width: 280px; background: linear-gradient(180deg, var(--primary-dark) 0%, var(--primary) 100%); color: white; padding: 24px 18px; display: flex; flex-direction: column; gap: 16px; position: sticky; top: 0; height: 100vh; overflow-y: auto; transition: transform 0.25s ease; }
            .menu-toggle { display: none; }
            .sidebar .nav-link { color: rgba(255,255,255,0.9); border-radius: 10px; padding: 10px 12px; white-space: nowrap; }
            .sidebar .nav-link.active, .sidebar .nav-link:hover { background: rgba(255,255,255,0.16); color: white; }
            .main-panel { flex: 1; min-width: 0; padding: 24px; overflow-x: hidden; }
            .topbar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; gap: 16px; flex-wrap: wrap; }
            .card-soft { background: white; border-radius: 18px; box-shadow: 0 8px 25px rgba(0,0,0,0.04); border: 1px solid var(--border); }
            @media (max-width: 992px) {
                .dashboard-shell { flex-direction: column; }
                .menu-toggle { display: inline-flex; align-items: center; justify-content: center; width: 44px; height: 44px; border-radius: 12px; border: none; background: transparent; color: white; }
                .topbar { padding-top: 8px; padding-bottom: 8px; padding-left: 16px; padding-right: 16px; background: var(--primary); color: white; border-bottom-left-radius: 0; border-bottom-right-radius: 8px; }
                .topbar .btn { border-color: rgba(255,255,255,0.12); color: white; }
                .sidebar { width: 80%; max-width: 320px; min-width: 80%; height: 100vh; position: fixed; top: 0; left: 0; z-index: 1050; transform: translateX(-110%); padding-top: 84px; border-bottom-right-radius: 20px; background: linear-gradient(180deg, var(--primary-dark) 0%, var(--primary) 100%); }
                .sidebar.open { transform: translateX(0); }
                .main-panel { padding: 16px; padding-top: 84px; }
                .topbar .brand { color: white; }
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
                <img src="{{ asset('logo/logo_Well_Being.jpeg') }}" alt="logo" width="36" height="36" class="rounded-2">
                <div>
                    <h5 class="mb-0">Well-Being</h5>
                    <small class="text-white-50">Espace membre</small>
                </div>
            </div>
            <nav class="nav flex-column">
                <a class="nav-link" href="{{ route('membre.dashboard') }}"><i class="bi bi-grid"></i> Mon espace</a>
                <a class="nav-link" href="{{ route('membre.profile') }}"><i class="bi bi-person-circle"></i> Mon profil</a>
                <a class="nav-link" href="{{ route('wellbeing.programmes') }}"><i class="bi bi-heart-pulse"></i> Mes programmes</a>
                <a class="nav-link active" href="{{ route('membre.messages') }}"><i class="bi bi-chat-left-text"></i> Mes messages</a>
                <a class="nav-link" href="{{ route('membre.favorites') }}"><i class="bi bi-bookmark"></i> Mes favoris</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="nav-link btn btn-link text-start p-0"><i class="bi bi-box-arrow-right"></i> Se déconnecter</button>
                </form>
            </nav>
    </aside>
    <div class="backdrop" id="sidebarBackdrop"></div>
    <main class="main-panel">
        <div class="topbar">
            <div class="d-flex align-items-center gap-2">
                <div class="brand d-flex align-items-center gap-2">
                    <img src="{{ asset('logo/logo_Well_Being.jpeg') }}" alt="logo" width="36" height="36" class="rounded-2">
                    <div>
                        <h5 class="mb-0">Well-Being</h5>
                        <small class="text-white-50">Espace membre</small>
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-center gap-2">
                <a href="{{ route('membre.dashboard') }}" class="btn btn-outline-light d-none d-md-inline">Retour</a>
                <button class="menu-toggle" id="menuToggle" type="button" aria-label="Ouvrir le menu" aria-expanded="false">
                    <i class="bi bi-list fs-4"></i>
                </button>
            </div>
        </div>
        <div class="card-soft p-4 mb-4">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <form method="POST" action="{{ route('membre.messages.send') }}">
                @csrf
                <div class="mb-3">
                    <label for="contenu" class="form-label">Nouveau message</label>
                    <textarea id="contenu" name="contenu" class="form-control" rows="4" required>{{ old('contenu') }}</textarea>
                    @error('contenu')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>

        <div class="card-soft p-4">
            <h5 class="mb-3">Historique des messages</h5>
            @if($messages->isEmpty())
                <p class="text-muted">Aucun message envoyé pour le moment.</p>
            @else
                <div class="list-group">
                    @foreach($messages as $message)
                        <div class="list-group-item">
                            <div class="d-flex justify-content-between align-items-start gap-3">
                                <div>
                                    <p class="mb-1">{{ $message->contenu }}</p>
                                    <small class="text-muted">Envoyé le {{ $message->created_at->format('d/m/Y H:i') }}</small>
                                </div>
                                <span class="badge bg-success">{{ ucfirst($message->envoye_par) }}</span>
                            </div>
                            @if(!empty($message->reponse))
                                <div class="border rounded p-3 mt-3 bg-success-subtle">
                                    <div class="fw-semibold text-success">Réponse de l’administration</div>
                                    <p class="mb-0">{{ $message->reponse }}</p>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </main>
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
