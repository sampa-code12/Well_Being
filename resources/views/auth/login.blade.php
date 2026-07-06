<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>{{ config('app.name') }} - Connexion</title>
  <meta name="description" content="Connectez-vous à votre espace Well-Being.">
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/auth-login.css') }}" rel="stylesheet">
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
          <li><a href="{{ url('/services') }}">Services</a></li>
          <li><a href="{{ url('/contact') }}">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="{{ url('/register') }}">Créer un compte</a>
    </div>
  </header>

  <main class="main d-flex align-items-center justify-content-center auth-main">
    <section class="container py-5 auth-section">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card shadow-lg border-0 rounded-4 auth-card">
            <div class="card-body p-4 p-md-5">
              <div class="text-center mb-4">
                <h2 class="mb-2">Connexion</h2>
                <p class="text-muted">Accédez à votre espace Well-Being.</p>
              </div>

              <form action="{{ url('/login') }}" method="post">
                @csrf
                <div class="mb-3">
                  <label for="email" class="form-label">Adresse email</label>
                  <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-3">
                  <label for="password" class="form-label">Mot de passe</label>
                  <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <div class="form-check mb-3">
                  <input class="form-check-input" type="checkbox" id="remember">
                  <label class="form-check-label" for="remember">Se souvenir de moi</label>
                </div>

                <button type="submit" class="btn auth-btn w-100">Se connecter</button>
              </form>

              <div class="text-center mt-3">
                <p class="mb-0">Pas encore membre ? <a href="{{ url('/register') }}">Créer un compte</a></p>
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
