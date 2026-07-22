<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} - Paramètres</title>
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f7f5ef; color: #233240; overflow-x: hidden; }
        .dashboard-shell { min-height: 100vh; display: flex; width: 100%; align-items: stretch; }
        .sidebar { width: 280px; min-height: 100vh; background: linear-gradient(180deg, #1b4f3a 0%, #2d6a4f 100%); color: white; padding: 24px 18px; }
        .sidebar .nav-link { color: rgba(255,255,255,0.9); border-radius: 10px; padding: 10px 12px; }
        .sidebar .nav-link.active, .sidebar .nav-link:hover { background: rgba(255,255,255,0.16); color: white; }
        .main-panel { flex: 1; padding: 24px; min-height: 100vh; overflow-x: hidden; }
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

                <div class="mb-3">
                    <label for="wellbeing_global_objective" class="form-label">Objectif global à 3 ans</label>
                    <textarea class="form-control" id="wellbeing_global_objective" name="wellbeing_global_objective" rows="3" placeholder="Rédigez l’objectif global qui apparaîtra sur la page Programmes">{{ old('wellbeing_global_objective', $settings['wellbeing_global_objective'] ?? '') }}</textarea>
                    <div class="form-text">Ce texte est affiché en haut de la page Programmes.</div>
                </div>

                <div class="mb-4">
                    <h4 class="mb-3">Programmes bien-être</h4>
                    <div id="programmes-editor">
                        @php
                            $storedAxes = old('wellbeing_axes', $settings['wellbeing_axes'] ?? []);
                            if (is_string($storedAxes)) {
                                $storedAxes = json_decode($storedAxes, true) ?: [];
                            }
                        @endphp
                        <div class="accordion" id="programmeAxesAccordion">
                            @forelse($storedAxes as $index => $axe)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading{{ $index }}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="false" aria-controls="collapse{{ $index }}">
                                            Axe {{ $index + 1 }} : {{ $axe['label'] ?? 'Nouveau programme' }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $index }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $index }}" data-bs-parent="#programmeAxesAccordion">
                                        <div class="accordion-body">
                                            <div class="mb-3">
                                                <label class="form-label">Titre</label>
                                                <input type="text" name="wellbeing_axes[{{ $index }}][label]" class="form-control" value="{{ $axe['label'] ?? '' }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Icône Bootstrap</label>
                                                <input type="text" name="wellbeing_axes[{{ $index }}][icon]" class="form-control" value="{{ $axe['icon'] ?? '' }}" placeholder="bi-journal-medical">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Description</label>
                                                <textarea name="wellbeing_axes[{{ $index }}][description]" class="form-control" rows="3">{{ $axe['description'] ?? '' }}</textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Objectifs</label>
                                                <div class="objectives-list">
                                                    @foreach($axe['objectives'] ?? [] as $objIndex => $objective)
                                                        <div class="input-group mb-2">
                                                            <input type="text" name="wellbeing_axes[{{ $index }}][objectives][{{ $objIndex }}]" class="form-control" value="{{ $objective }}" required>
                                                            <button class="btn btn-outline-danger remove-objective" type="button">Supprimer</button>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <button type="button" class="btn btn-outline-success btn-sm add-objective" data-axe-index="{{ $index }}">Ajouter un objectif</button>
                                            </div>
                                            <button type="button" class="btn btn-outline-danger btn-sm remove-axe" data-axe-index="{{ $index }}">Supprimer cet axe</button>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="alert alert-info">Aucun programme configuré. Ajoutez un axe ci-dessous.</div>
                            @endforelse
                        </div>
                    </div>
                    <button type="button" class="btn btn-success btn-sm mt-3" id="add-axe">Ajouter un axe</button>
                </div>

                <button type="submit" class="btn btn-success">Enregistrer les paramètres</button>
            </form>
        </div>
    </main>
</div>

<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script>
    document.addEventListener('click', function (event) {
        if (event.target.matches('.add-objective')) {
            const axeIndex = event.target.dataset.axeIndex;
            const container = event.target.closest('.accordion-body').querySelector('.objectives-list');
            const count = container.querySelectorAll('.input-group').length;
            const template = document.createElement('div');
            template.className = 'input-group mb-2';
            template.innerHTML = `<input type="text" name="wellbeing_axes[${axeIndex}][objectives][${count}]" class="form-control" value="" required><button class="btn btn-outline-danger remove-objective" type="button">Supprimer</button>`;
            container.appendChild(template);
        }

        if (event.target.matches('.remove-objective')) {
            event.target.closest('.input-group').remove();
        }

        if (event.target.matches('#add-axe')) {
            const accordion = document.getElementById('programmeAxesAccordion');
            const index = accordion.children.length;
            const collapseId = 'collapse' + index;
            const newItem = document.createElement('div');
            newItem.className = 'accordion-item';
            newItem.innerHTML = `
                <h2 class="accordion-header" id="heading${index}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#${collapseId}" aria-expanded="false" aria-controls="${collapseId}">
                        Axe ${index + 1} : Nouveau programme
                    </button>
                </h2>
                <div id="${collapseId}" class="accordion-collapse collapse" aria-labelledby="heading${index}" data-bs-parent="#programmeAxesAccordion">
                    <div class="accordion-body">
                        <div class="mb-3">
                            <label class="form-label">Titre</label>
                            <input type="text" name="wellbeing_axes[${index}][label]" class="form-control" value="" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Icône Bootstrap</label>
                            <input type="text" name="wellbeing_axes[${index}][icon]" class="form-control" value="" placeholder="bi-journal-medical">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="wellbeing_axes[${index}][description]" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Objectifs</label>
                            <div class="objectives-list"></div>
                            <button type="button" class="btn btn-outline-success btn-sm add-objective" data-axe-index="${index}">Ajouter un objectif</button>
                        </div>
                        <button type="button" class="btn btn-outline-danger btn-sm remove-axe" data-axe-index="${index}">Supprimer cet axe</button>
                    </div>
                </div>
            `;
            accordion.appendChild(newItem);
        }

        if (event.target.matches('.remove-axe')) {
            const item = event.target.closest('.accordion-item');
            item.remove();
        }
    });
</script>
</body>
</html>
