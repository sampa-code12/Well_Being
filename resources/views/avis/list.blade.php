<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ config('app.name') }} - Avis des membres</title>
  <meta name="description" content="Consultez les avis des membres de Well-Being.">

  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

  <style>
    body { background: #f7f5ef; color: #1f2937; }
    .header { background: rgba(255,255,255,0.97); box-shadow: 0 4px 20px rgba(0,0,0,0.06); }
    .hero-section { background: linear-gradient(135deg, #1f5e4c 0%, #2f7d5f 100%); color: #fff; padding: 110px 0 80px; }
    .review-card { background: #fff; border-radius: 20px; box-shadow: 0 12px 35px rgba(31,94,76,0.08); border: 1px solid rgba(31,94,76,0.06); }
    .review-card:hover { transform: translateY(-3px); transition: all .25s ease; }
    .avatar { width: 48px; height: 48px; border-radius: 50%; background: linear-gradient(135deg, #2f7d5f, #1f5e4c); color: #fff; display: inline-flex; align-items: center; justify-content: center; font-weight: 700; }
    .footer { background: #193d31; color: #f5f7f2; }
    .footer a { color: #dcefe6; text-decoration: none; }
    .footer a:hover { color: #fff; }
  </style>
</head>
<body>
  <header id="header" class="header d-flex align-items-center sticky-top">
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
          <li><a href="{{ url('/contact') }}">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      @guest
      <a class="btn-getstarted" href="{{ route('login.form') }}">Connexion</a>
      @endguest
      @auth
      <a class="btn-getstarted" href="{{ route('membre.dashboard') }}">Mon espace</a>
      @endauth
    </div>
  </header>

  <main class="main">
    <section class="hero-section" data-aos="fade">
      <div class="container">
        <div class="row align-items-center gy-4">
          <div class="col-lg-8">
            <span class="badge rounded-pill bg-light text-success mb-3 px-3 py-2">Témoignages</span>
            <h1 class="display-5 fw-bold mb-3">Ce que nos membres disent de Well-Being</h1>
            <p class="lead mb-0" style="color: rgba(255,255,255,0.9);">Découvrez les avis partagés par ceux qui ont bénéficié de nos programmes et de notre accompagnement.</p>
          </div>
          <div class="col-lg-4 text-lg-end">
            <a href="{{ url('/contact') }}" class="btn btn-light text-success fw-semibold">Partager votre expérience</a>
          </div>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="review-card p-4 mb-4" data-aos="fade-up">
          @auth
            <h3 class="h5 mb-3">Laisser un avis</h3>
            <p class="text-muted">Pour publier un avis, rendez-vous dans votre espace membre.</p>
            <a href="{{ route('membre.dashboard') }}#create-avis" class="btn btn-success">Aller à mon espace</a>
          @else
            <h3 class="h5 mb-3">Laisser un avis</h3>
            <p class="text-muted">Vous devez être connecté pour publier un avis.</p>
            <a href="{{ route('login.form') }}" class="btn btn-outline-success">Se connecter</a>
          @endauth
        </div>

        <div class="review-card p-4 mb-4" data-aos="fade-up">
          <form method="GET" action="{{ route('avis.list') }}" class="row g-3 align-items-end">
            <div class="col-md-5">
              <label for="date" class="form-label">Filtrer par date</label>
              <input type="date" name="date" id="date" class="form-control" value="{{ request('date') }}">
            </div>
            <div class="col-md-5">
              <label for="status" class="form-label">Filtrer par statut</label>
              <select name="status" id="status" class="form-select">
                <option value="">Tous les statuts</option>
                @foreach($statuses as $value => $label)
                  <option value="{{ $value }}" {{ request('status') === $value ? 'selected' : '' }}>{{ $label }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-2 d-grid">
              <button type="submit" class="btn btn-success">Appliquer</button>
            </div>
          </form>
        </div>

        <div class="row g-4">
          @forelse($toutAvis as $avis)
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="{{ 100 + ($loop->index * 60) }}">
              <article class="review-card p-4 h-100">
                <div class="d-flex align-items-center gap-3 mb-3">
                  <div class="avatar">
                    {{ strtoupper(substr(optional($avis->user)->prenom ?? 'M', 0, 1)) }}{{ strtoupper(substr(optional($avis->user)->nom ?? 'M', 0, 1)) }}
                  </div>
                  <div>
                    <h5 class="mb-1">{{ optional($avis->user)->prenom }} {{ optional($avis->user)->nom }}</h5>
                    <p class="text-muted mb-0">Membre Well-Being</p>
                  </div>
                </div>
                <p class="mb-0 text-break" style="line-height: 1.8; overflow-wrap: anywhere; word-break: break-word;">“{{ $avis->contenu }}”</p>
                <div class="mt-3 d-flex justify-content-between align-items-center">
                  <span class="badge rounded-pill bg-light text-success">{{ $avis->created_at ? $avis->created_at->translatedFormat('d M Y') : '' }}</span>
                  <span class="badge rounded-pill bg-success-subtle text-success">{{ $statuses[$avis->status_avis] ?? $avis->status_avis }}</span>
                </div>
              </article>
            </div>
          @empty
            <div class="col-12">
              <div class="alert alert-info rounded-4">Aucun avis n’a encore été publié.</div>
            </div>
          @endforelse
        </div>
      </div>
    </section>
  </main>

  <footer id="footer" class="footer">
    <div class="container footer-top py-5">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="{{ url('/') }}" class="d-flex align-items-center">
            <span class="sitename">{{ config('app.name') }}</span>
          </a>
          <div class="footer-contact pt-3">
            <p>Vos expériences comptent pour nous et inspirent notre communauté.</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 footer-links">
          <h4>Navigation</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ url('/') }}">Accueil</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ url('/apropos') }}">À propos</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('wellbeing.programmes') }}">Programmes</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ url('/contact') }}">Contact</a></li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-12">
          <h4>Suivez-nous</h4>
          <p>Retrouvez nos actualités et nos initiatives autour du bien-être.</p>
          <div class="social-links d-flex">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>
      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">{{ config('app.name') }}</strong> <span>All Rights Reserved</span></p>
    </div>
  </footer>

  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script>AOS.init();</script>
</body>
</html>
