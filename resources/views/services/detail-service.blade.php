<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ config('app.name') }} - {{ $service->titre }}</title>
  <meta name="description" content="Découvrez plus en détail ce service proposé par Well-Being.">

  <link href="{{ asset('logo/logo_well_being.jpeg') }}" rel="icon">
  <link href="{{ asset('logo/logo_well_being.jpeg') }}" rel="apple-touch-icon">
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

  <style>
    body { background: #f7f5ef; color: #1f2937; }
    .header { background: rgba(255,255,255,0.97); box-shadow: 0 4px 20px rgba(0,0,0,0.06); }
    .page-hero { padding: 110px 0 70px; background: linear-gradient(135deg, #1f5e4c 0%, #2f7d5f 100%); color: #fff; }
    .content-card, .side-card { background: #fff; border-radius: 24px; box-shadow: 0 12px 35px rgba(31,94,76,0.08); }
    .side-card { border: 1px solid rgba(31,94,76,0.08); }
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
          <li><a href="{{ route('wellbeing.programmes') }}" class="active">Programmes</a></li>
          <li><a href="{{ route('partners.create') }}">Devenir partenaire</a></li>
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
    <section class="page-hero" data-aos="fade">
      <div class="container">
        <a href="{{ route('wellbeing.programmes') }}" class="btn btn-outline-light mb-4"><i class="bi bi-arrow-left me-2"></i>Retour aux programmes</a>
        <div class="row gy-4 align-items-center">
          <div class="col-lg-7" data-aos="fade-up">
            <span class="badge rounded-pill bg-light text-success mb-3 px-3 py-2">Programme Well-Being</span>
            <h1 class="display-5 fw-bold mb-3">{{ $service->titre }}</h1>
            <p class="lead mb-0" style="color: rgba(255,255,255,0.9);">Découvrez ce service en détail et sachez comment l’association peut vous accompagner.</p>
          </div>
          <div class="col-lg-5" data-aos="fade-up" data-aos-delay="100">
            @if($service->image_url)
              <img src="{{ asset($service->image_url) }}" alt="{{ $service->titre }}" class="img-fluid rounded-4 shadow-sm" style="height: 320px; object-fit: cover; width: 100%;">
            @else
              <div class="rounded-4 bg-white/20 d-flex align-items-center justify-content-center" style="height:320px;">
                <span class="fs-5">Illustration indisponible</span>
              </div>
            @endif
          </div>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-8" data-aos="fade-up">
            <div class="content-card p-4 p-lg-5">
              <h2 class="h3 mb-3">À propos de ce service</h2>
              <p class="text-muted mb-4">{!! nl2br(e($service->description)) !!}</p>
              <div class="d-flex flex-wrap gap-2">
                <span class="badge rounded-pill bg-success-subtle text-success px-3 py-2">Accompagnement</span>
                <span class="badge rounded-pill bg-success-subtle text-success px-3 py-2">Bien-être</span>
                <span class="badge rounded-pill bg-success-subtle text-success px-3 py-2">Équipe dédiée</span>
              </div>
            </div>
          </div>

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="side-card p-4 p-lg-4">
              <h3 class="h4 mb-3">Prêt à commencer ?</h3>
              <p class="text-muted mb-4">Vous pouvez nous contacter pour obtenir plus d’informations ou demander un accompagnement adapté à votre situation.</p>
              <a href="{{ url('/contact') }}" class="btn btn-success w-100 mb-2">Nous contacter</a>
              <a href="{{ route('wellbeing.programmes') }}" class="btn btn-outline-success w-100">Voir tous les programmes</a>
            </div>
          </div>
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
            <p>Une association dédiée au bien-être, à l’accompagnement et à la solidarité.</p>
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
            <a href="https://www.facebook.com/profile.php?id=61591147206178" target="_blank" rel="noopener noreferrer"><i class="bi bi-facebook"></i></a>
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
