<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Programmes Well-Being</title>
    <link href="{{ asset('logo/logo_well_being.jpeg') }}" rel="icon">
    <link href="{{ asset('logo/logo_well_being.jpeg') }}" rel="apple-touch-icon">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <style>
        body { background: #f7f5ef; color: #233240; }
        .hero { background: linear-gradient(135deg, #164f3b 0%, #2d6a4f 100%); color: #fff; padding: 90px 0; }
        .hero .badge { background: rgba(255,255,255,.15); color: #fff; }
        .card-soft { background: #fff; border-radius: 18px; box-shadow: 0 10px 30px rgba(0,0,0,.06); }
        .metric { border-left: 4px solid #2d6a4f; }
    </style>
</head>
<body>
<header class="hero">
    <div class="container">
        @php
            $backUrl = url()->previous();
            if (!$backUrl || $backUrl === url('/programmes') || $backUrl === url('/services') || $backUrl === url()->current()) {
                $backUrl = url('/');
            }
        @endphp
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ $backUrl }}" class="btn btn-light btn-sm">Retour</a>
        </div>
        <div class="row align-items-center gy-4">
            <div class="col-lg-8">
                <span class="badge rounded-pill px-3 py-2 mb-3">Mission de Well-Being</span>
                <h1 class="display-6 fw-bold mb-3">Programmes structurés autour des 5 axes de bien-être</h1>
                <p class="lead mb-0">L’association Well-Being agit à Maroua, Cameroun, et sur l’ensemble du territoire national pour promouvoir le bien-être physique, mental, social et communautaire.</p>
            </div>
            <div class="col-lg-4">
                <div class="card-soft p-4">
                    <h5 class="mb-3">Objectif global à 3 ans</h5>
                    <p class="mb-0">{{ $globalObjective }}</p>
                </div>
            </div>
        </div>
    </div>
</header>
<main class="py-5">
    <div class="container">
        <div class="row g-4 mb-4">
            <div class="col-md-6 col-xl-3">
                <div class="card-soft p-4 metric">
                    <div class="text-muted small">Personnes touchées</div>
                    <div class="h3 fw-bold mb-0">{{ $metrics['annualReach'] }}</div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card-soft p-4 metric">
                    <div class="text-muted small">Membres inscrits</div>
                    <div class="h3 fw-bold mb-0">{{ $metrics['members'] }}</div>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card-soft p-4 metric">
                    <div class="text-muted small">Progression cible annuelle</div>
                    <div class="h3 fw-bold mb-0">{{ $metrics['progress'] }}%</div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            @foreach($axes as $axe)
                <div class="col-lg-6">
                    <div class="card-soft p-4 h-100">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="rounded-circle bg-success-subtle p-3 text-success"><i class="bi {{ $axe['icon'] }} fs-4"></i></div>
                            <div>
                                <h4 class="h5 mb-1">{{ $axe['label'] }}</h4>
                                <p class="text-muted mb-0">{{ $axe['description'] }}</p>
                            </div>
                        </div>
                        <ul class="list-unstyled mb-0">
                            @foreach($axe['objectives'] as $objective)
                                <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i>{{ $objective }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="card-soft p-4 mt-4">
            <h3 class="h4 mb-3">Plan d’action opérationnel</h3>
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th>Axe</th>
                            <th>Objectif</th>
                            <th>Priorité</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($objectives as $objective)
                            <tr>
                                <td><i class="bi {{ $objective['icon'] }} me-2 text-success"></i>{{ $objective['axe'] }}</td>
                                <td>{{ $objective['objectif'] }}</td>
                                <td><span class="badge bg-success-subtle text-success">{{ $objective['priorite'] }}</span></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
</body>
</html>
