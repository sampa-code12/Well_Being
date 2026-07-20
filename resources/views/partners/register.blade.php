<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>{{ config('app.name') }} - Devenir partenaire</title>
  <meta name="description" content="Formulaire d'inscription des partenaires de Well-Being.">
  <link href="{{ asset('logo/logo_well_being.jpeg') }}" rel="icon">
  <link href="{{ asset('logo/logo_well_being.jpeg') }}" rel="apple-touch-icon">
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
</head>
<body class="index-page auth-page">
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">
      <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto">
        <img src="{{ asset('logo/logo_Well_Being.jpeg') }}" alt="{{ config('app.name') }} logo">
        <h1 class="sitename">{{ config('app.name') }}</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ url('/') }}">Accueil</a></li>
          <li><a href="{{ url('/apropos') }}">À propos</a></li>
          <li><a href="{{ route('wellbeing.programmes') }}">Programmes</a></li>
          <li><a href="{{ route('partners.create') }}">Devenir partenaire</a></li>
          <li><a href="{{ url('/contact') }}">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>

  <main class="main d-flex align-items-center justify-content-center auth-main">
    <section class="container py-5 auth-section">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
          <div class="card shadow-lg border-0 rounded-4 auth-card">
            <div class="card-body p-4 p-md-5">
              <div class="text-center mb-4">
                <h2 class="mb-2">Devenir partenaire</h2>
                <p class="text-muted">Inscrivez votre structure pour soutenir la mission de Well-Being.</p>
              </div>

              @if ($errors->any())
                <div class="alert alert-danger rounded-3">
                  <ul class="mb-0 ps-3">
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif

              <form action="{{ route('partners.store') }}" method="post">
                @csrf
                <div class="row g-3">
                  <div class="col-md-6">
                    <label for="nom_entreprise" class="form-label">Nom de l’entreprise</label>
                    <input type="text" class="form-control" id="nom_entreprise" name="nom_entreprise" value="{{ old('nom_entreprise') }}" required>
                  </div>
                  <div class="col-md-6">
                    <label for="nom_contact" class="form-label">Nom du contact</label>
                    <input type="text" class="form-control" id="nom_contact" name="nom_contact" value="{{ old('nom_contact') }}" required>
                  </div>
                  <div class="col-md-6">
                    <label for="email" class="form-label">Adresse email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                  </div>
                  <div class="col-md-6">
                    <label for="telephone" class="form-label">Téléphone</label>
                    <input type="text" class="form-control" id="telephone" name="telephone" value="{{ old('telephone') }}" required>
                  </div>
                  <div class="col-md-6">
                    <label for="pays" class="form-label">Pays</label>
                    <input type="text" class="form-control" id="pays" name="pays" value="{{ old('pays') }}" required>
                  </div>
                  <div class="col-md-6">
                    <label for="ville" class="form-label">Ville</label>
                    <input type="text" class="form-control" id="ville" name="ville" value="{{ old('ville') }}" required>
                  </div>
                  <div class="col-md-12">
                    <label for="type_partenariat" class="form-label">Type de partenariat</label>
                    <select class="form-select" id="type_partenariat" name="type_partenariat" required>
                      <option value="">Sélectionnez</option>
                      <option value="finance" {{ old('type_partenariat') === 'finance' ? 'selected' : '' }}>Financement</option>
                      <option value="materiel" {{ old('type_partenariat') === 'materiel' ? 'selected' : '' }}>Matériel</option>
                      <option value="logistique" {{ old('type_partenariat') === 'logistique' ? 'selected' : '' }}>Logistique</option>
                      <option value="communication" {{ old('type_partenariat') === 'communication' ? 'selected' : '' }}>Communication</option>
                      <option value="autre" {{ old('type_partenariat') === 'autre' ? 'selected' : '' }}>Autre</option>
                    </select>
                  </div>
                  <div class="col-md-12">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="4">{{ old('message') }}</textarea>
                  </div>
                </div>

                <button type="submit" class="btn auth-btn w-100 mt-4">S’inscrire comme partenaire</button>
              </form>

              <div class="mt-4 p-3 rounded-4 border border-warning-subtle bg-light">
                <h5 class="fw-semibold mb-3">Paiements et transactions</h5>
                <div class="row g-3">
                  <div class="col-md-6">
                    <div class="d-flex align-items-center gap-2 p-2 rounded-3 bg-white border">
                      <img src="{{ asset('logo/mtn.png') }}" alt="MTN Mobile Money" width="40" height="40" style="object-fit:contain;">
                      <div>
                        <div class="fw-semibold">Mobile Money</div>
                        <div class="text-muted small">+237 6XX XXX XXX</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="d-flex align-items-center gap-2 p-2 rounded-3 bg-white border">
                      <img src="{{ asset('logo/orange.png') }}" alt="Orange Money" width="40" height="40" style="object-fit:contain;">
                      <div>
                        <div class="fw-semibold">Orange Money</div>
                        <div class="text-muted small">+237 6XX XXX XXX</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
