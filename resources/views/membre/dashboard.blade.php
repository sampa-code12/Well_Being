<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} - Tableau de bord Membre</title>
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

        body { font-family: 'Open Sans', sans-serif; background: linear-gradient(135deg, #f8f6ef 0%, #f4efe7 100%); color: var(--text); margin: 0; }
        .dashboard-shell { min-height: 100vh; display: flex; flex-wrap: nowrap; }
        .sidebar { width: 280px; min-width: 280px; background: linear-gradient(180deg, var(--primary-dark) 0%, var(--primary) 100%); color: white; padding: 24px 18px; display: flex; flex-direction: column; gap: 16px; position: sticky; top: 0; height: 100vh; overflow-y: auto; transition: transform 0.25s ease; }
        .menu-toggle { display: none; }
        .sidebar .brand { display: flex; align-items: center; gap: 12px; margin-bottom: 12px; }
        .sidebar .brand img { width: 46px; height: 46px; border-radius: 12px; }
        .sidebar .nav-link { color: rgba(255,255,255,0.9); border-radius: 10px; padding: 10px 12px; display: flex; align-items: center; gap: 10px; white-space: nowrap; }
        .sidebar .nav-link.active, .sidebar .nav-link:hover { background: rgba(255,255,255,0.16); color: white; }
        .main-panel { flex: 1; min-width: 0; padding: 24px; overflow-x: hidden; }
        .topbar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; gap: 16px; flex-wrap: wrap; }
        .welcome-card, .profile-card, .stat-card, .panel-card { background: white; border: 1px solid var(--border); border-radius: 18px; box-shadow: 0 8px 25px rgba(0,0,0,0.04); }
        .welcome-card { padding: 24px; background: linear-gradient(120deg, #ffffff 0%, #f8f4eb 100%); margin-bottom: 20px; }
        .profile-card { padding: 20px; display: flex; align-items: center; gap: 14px; margin-bottom: 20px; overflow-wrap: anywhere; }
        .avatar { width: 56px; height: 56px; min-width: 56px; background: var(--accent); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.3rem; color: var(--primary); }
        .stat-card { padding: 18px; height: 100%; overflow-wrap: anywhere; }
        .stat-card .icon { width: 44px; height: 44px; border-radius: 12px; background: rgba(45,106,79,0.1); display: flex; align-items: center; justify-content: center; color: var(--primary); font-size: 1.1rem; margin-bottom: 12px; }
        .panel-card { padding: 20px; overflow-wrap: anywhere; }
        .list-group-item { border-left: 0; border-right: 0; padding-left: 0; padding-right: 0; }
        .text-break-all { overflow-wrap: anywhere; word-break: break-word; }
        @media (max-width: 992px) {
            .dashboard-shell { flex-direction: column; }
            .menu-toggle { display: inline-flex; align-items: center; justify-content: center; width: 44px; height: 44px; border-radius: 12px; border: none; background: transparent; color: white; }
            .topbar { padding-top: 8px; padding-bottom: 8px; padding-left: 16px; padding-right: 16px; background: var(--primary); color: white; border-bottom-left-radius: 0; border-bottom-right-radius: 8px; }
            .topbar .btn { border-color: rgba(255,255,255,0.12); color: white; }
            .sidebar {
                width: 80%; max-width: 320px; min-width: 80%; height: 100vh; position: fixed; top: 0; left: 0; z-index: 1050; transform: translateX(-110%);
                padding-top: 84px; border-bottom-right-radius: 20px; background: linear-gradient(180deg, var(--primary-dark) 0%, var(--primary) 100%);
            }
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
            <div class="brand">
                <img src="{{ asset('logo/logo_Well_Being.jpeg') }}" alt="Well-Being logo">
                <div>
                    <h5 class="mb-0">Well-Being</h5>
                    <small>Membre</small>
                </div>
            </div>

            <nav class="nav flex-column">
                <a class="nav-link active" href="{{ route('membre.dashboard') }}"><i class="bi bi-grid"></i> Mon espace</a>
                <a class="nav-link" href="{{ route('membre.profile') }}"><i class="bi bi-person-circle"></i> Mon profil</a>
                <a class="nav-link" href="{{ route('membre.services') }}"><i class="bi bi-heart-pulse"></i> Mes services</a>
                <a class="nav-link" href="{{ route('membre.messages') }}"><i class="bi bi-chat-left-text"></i> Mes messages</a>
                <a class="nav-link" href="#avisFormCollapse" data-bs-toggle="collapse" aria-expanded="false" aria-controls="avisFormCollapse"><i class="bi bi-pencil-square"></i> Publier un avis</a>
                <a class="nav-link" href="{{ route('membre.favorites') }}"><i class="bi bi-bookmark"></i> Mes favoris</a>
                <a class="nav-link" href="{{ url('/') }}"><i class="fa fa-home"></i> Retour a l'accueil</a>
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
                    <a href="{{ url('/') }}" class="btn btn-outline-light d-none d-md-inline">Retour au site</a>
                    <button class="menu-toggle" id="menuToggle" type="button" aria-label="Ouvrir le menu">
                        <i class="bi bi-list fs-4"></i>
                    </button>
                </div>
            </div>

            <div class="welcome-card">
                <div class="row align-items-center g-4">
                    <div class="col-lg-8">
                        <h3 class="mb-2">Bonjour, {{ $user->prenom }} {{ $user->nom }}</h3>
                        <p class="mb-0 text-muted">Voici un aperçu de vos demandes, avis et activités enregistrées dans la base de données.</p>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <span class="badge bg-success-subtle text-success px-3 py-2">Rôle : {{ ucfirst($user->role->value ?? $user->role) }}</span>
                    </div>
                </div>
            </div>

            <div class="profile-card">
                <div class="avatar"><i class="bi bi-person"></i></div>
                <div class="text-break-all">
                    <h5 class="mb-1">Profil membre</h5>
                    <p class="mb-0 text-muted">{{ $user->profession }} · {{ $user->ville }}, {{ $user->pays }}</p>
                </div>
            </div>

            <div class="row g-4 mb-4">
                <div class="col-md-6 col-xl-3">
                    <div class="stat-card">
                        <div class="icon"><i class="bi bi-calendar-check"></i></div>
                        <h6 class="mb-1">Demandes</h6>
                        <h3 class="mb-0">{{ $demandes->count() }}</h3>
                        <small class="text-muted">Enregistrées pour vous</small>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="stat-card">
                        <div class="icon"><i class="bi bi-heart-pulse"></i></div>
                        <h6 class="mb-1">Services</h6>
                        <h3 class="mb-0">{{ $servicesDisponibles }}</h3>
                        <small class="text-muted">Disponibles dans le site</small>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="stat-card">
                        <div class="icon"><i class="bi bi-clock-history"></i></div>
                        <h6 class="mb-1">En attente</h6>
                        <h3 class="mb-0">{{ $demandesEnAttente }}</h3>
                        <small class="text-muted">Demandes non encore traitées</small>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="stat-card">
                        <div class="icon"><i class="bi bi-check2-circle"></i></div>
                        <h6 class="mb-1">Traitées</h6>
                        <h3 class="mb-0">{{ $demandesTraites }}</h3>
                        <small class="text-muted">Demandes déjà suivies</small>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-7">
                    <div class="panel-card">
                        <h5 class="mb-3">Vos dernières demandes</h5>
                        <div class="list-group list-group-flush">
                            @forelse ($demandes as $demande)
                                <div class="list-group-item d-flex justify-content-between align-items-start gap-3">
                                    <div class="text-break-all">
                                        <div class="fw-semibold">{{ optional($demande->services)->titre ?? 'Service non défini' }}</div>
                                        <small class="text-muted">{{ optional($demande->dateCommande)->format('d/m/Y') }} · {{ $demande->statut_demande }}</small>
                                    </div>
                                    <span class="badge bg-light text-dark">{{ ucfirst(str_replace('_', ' ', $demande->statut_demande)) }}</span>
                                </div>
                            @empty
                                <div class="text-muted">Aucune demande de service n’a encore été enregistrée pour vous.</div>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="panel-card">
                        <h5 class="mb-3">Vos derniers avis</h5>
                        <div class="list-group list-group-flush">
                            @forelse ($avis as $item)
                                <div class="list-group-item">
                                    <div class="fw-semibold text-break-all">{{ \Illuminate\Support\Str::limit($item->contenu, 80) }}</div>
                                    <small class="text-muted">Ajouté le {{ $item->created_at->format('d/m/Y') }}</small>
                                </div>
                            @empty
                                <div class="text-muted">Aucun avis n’a encore été publié par vous.</div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel-card mt-4" id="create-avis">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="mb-0">Publier un avis</h5>
                    <a class="btn btn-outline-success btn-sm" data-bs-toggle="collapse" href="#avisFormCollapse" role="button" aria-expanded="false" aria-controls="avisFormCollapse">
                        <i class="bi bi-plus-circle"></i> Ouvrir
                    </a>
                </div>

                <div class="accordion" id="avisAccordion">
                    <div class="accordion-item border-0">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#avisFormCollapse" aria-expanded="false" aria-controls="avisFormCollapse">
                                Partager votre expérience
                            </button>
                        </h2>
                        <div id="avisFormCollapse" class="accordion-collapse collapse" data-bs-parent="#avisAccordion">
                            <div class="accordion-body px-0">
                                <form action="{{ route('avis.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="contenu" class="form-label">Votre avis</label>
                                        <textarea name="contenu" id="contenu" rows="5" class="form-control" required placeholder="Décrivez votre expérience avec nos services..."></textarea>
                                    </div>
                                    <input type="hidden" name="redirect_to" value="{{ url()->current() }}">
                                    <div class="d-flex gap-2">
                                        <button type="submit" class="btn btn-success">Publier</button>
                                        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="collapse" data-bs-target="#avisFormCollapse">Fermer</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel-card mt-4">
                <h5 class="mb-3">Vos derniers messages</h5>
                <div class="list-group list-group-flush">
                    @forelse ($messages as $message)
                        <div class="list-group-item">
                            <div class="d-flex justify-content-between align-items-start gap-3">
                                <div class="text-break-all">
                                    <div class="fw-semibold">{{ $message->contenu }}</div>
                                    <small class="text-muted">Envoyé le {{ $message->created_at->format('d/m/Y H:i') }}</small>
                                </div>
                                <span class="badge bg-success">{{ ucfirst($message->envoye_par) }}</span>
                            </div>
                            @if(!empty($message->reponse))
                                <div class="mt-3 border rounded p-3 bg-light">
                                    <div class="fw-semibold text-success">Réponse de l’administration</div>
                                    <div class="mt-1 text-break-all">{{ $message->reponse }}</div>
                                </div>
                            @endif
                        </div>
                    @empty
                        <div class="text-muted">Aucun message envoyé pour le moment.</div>
                    @endforelse
                </div>
            </div>
            <!-- Avis creation moved to sidebar modal -->
        </main>
    </div>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        const menuToggle = document.getElementById('menuToggle');
        const sidebar = document.querySelector('.sidebar');
        const backdrop = document.getElementById('sidebarBackdrop');

        if (menuToggle && sidebar && backdrop) {
            const toggleMenu = () => {
                const opened = sidebar.classList.toggle('open');
                backdrop.classList.toggle('show', opened);
                if (opened) menuToggle.setAttribute('aria-expanded', 'true'); else menuToggle.setAttribute('aria-expanded', 'false');
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
            // close on Escape
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
