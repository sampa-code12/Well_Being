<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>{{ config('app.name') }} - Inscription</title>
  <meta name="description" content="Créez votre compte Well-Being.">
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/auth-register.css') }}" rel="stylesheet">
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

      <a class="btn-getstarted" href="{{ url('/login') }}">Se connecter</a>
    </div>
  </header>

  <main class="main d-flex align-items-center justify-content-center auth-main">
    <section class="container py-5 auth-section">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <div class="card shadow-lg border-0 rounded-4 auth-card">
            <div class="card-body p-4 p-md-5">
              <div class="text-center mb-4">
                <h2 class="mb-2">Créer un compte</h2>
                <p class="text-muted">Rejoignez Well-Being et participez à notre mission.</p>
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

              @if (session('succes'))
                  <div class="alert alert-success rounded-3">
                      {{ session('succes') }}
                  </div>
              @endif

              <form action="{{ route('register.post') }}" method="post">
                @csrf
                <div class="row g-3">
                  <div class="col-md-6">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom') }}" required>
                  </div>
                  <div class="col-md-6">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" value="{{ old('prenom') }}" required>
                  </div>
                  <div class="col-md-6">
                    <label for="tel" class="form-label">Téléphone</label>
                    <input type="text" class="form-control" id="tel" name="tel" value="{{ old('tel') }}" required>
                  </div>
                  <div class="col-md-6">
                    <label for="profession" class="form-label">Profession</label>
                    <input type="text" class="form-control" id="profession" name="profession" value="{{ old('profession') }}" required>
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
                    <label for="email" class="form-label">Adresse email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                  </div>
                  <div class="col-md-6">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                  </div>
                  <div class="col-md-6">
                    <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                  </div>
                </div>

                <button type="submit" class="btn auth-btn w-100 mt-4">S'inscrire</button>
              </form>

              <div class="text-center mt-3">
                <p class="mb-0">Vous avez déjà un compte ? <a href="{{ url('/login') }}">Se connecter</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
