<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ config('app.name') }} - Programmes</title>
  <meta name="description" content="Découvrez les programmes bien-être conçus pour votre équilibre.">
  <meta name="keywords" content="programmes bien-être, accompagnement, santé, wellness">

  <link href="{{ asset('logo/logo_well_being.jpeg') }}" rel="icon">
  <link href="{{ asset('logo/logo_well_being.jpeg') }}" rel="apple-touch-icon">
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

  <style>
    body { background: #f7f5ef; color: #1f2937; }
    .header { background: rgba(255,255,255,0.97); box-shadow: 0 4px 20px rgba(0,0,0,0.06); }
    .page-title { padding: 120px 0 80px; background: linear-gradient(135deg, #1f5e4c 0%, #2f7d5f 100%); color: #fff; }
    .page-title .breadcrumbs a, .page-title .breadcrumbs { color: rgba(255,255,255,0.8); }
    .page-title .breadcrumbs .current { color: #fff; }
    .service-card { background: #fff; border-radius: 20px; padding: 24px; box-shadow: 0 12px 35px rgba(31,94,76,0.08); transition: transform .3s ease, box-shadow .3s ease; }
    .service-card:hover { transform: translateY(-6px); box-shadow: 0 16px 40px rgba(31,94,76,0.13); }
    .service-icon { width: 52px; height: 52px; border-radius: 14px; display: inline-flex; align-items: center; justify-content: center; background: rgba(47,125,95,0.12); color: #2f7d5f; }
    .cta-panel { background: linear-gradient(135deg, #f3fbf7 0%, #eef7f2 100%); border: 1px solid rgba(31,94,76,0.1); border-radius: 24px; }
    .footer { background: #193d31; color: #f5f7f2; }
    .footer a { color: #dcefe6; text-decoration: none; }
    .footer a:hover { color: #fff; }
  </style>
</head>
<body class="service-details-page">
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
          <li><a href="{{ route('avis.list') }}">Avis</a></li>
          <li><a href="{{ route('partners.create') }}">Devenir partenaire</a></li>
          <li><a href="{{ url('/contact') }}">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      @guest
      <a class="btn-getstarted" href="{{ route('login.form') }}">Connexion</a>
      @endguest
      @auth
      @php
      $dashboardRoute =  auth()->user()->estAdmin() ? route('admin.dashboard') : route('membre.dashboard');
      @endphp
      <a class="btn-getstarted" href="{{ $dashboardRoute }}">Mon espace</a>
      @endauth
    </div>
  </header>

  <main class="main">
    <section class="page-title" data-aos="fade">
      <div class="container">
        
        <div class="row gy-4 align-items-center">
          <div class="col-lg-7" data-aos="fade-up">
            <span class="badge rounded-pill bg-light text-success mb-3 px-3 py-2">Nos programmes</span>
            <h1 class="display-5 fw-bold mb-3">Des programmes pensés pour votre équilibre</h1>
            <p class="lead mb-4" style="max-width: 680px; color: rgba(255,255,255,0.9);">
              Découvrez des accompagnements, ateliers et espaces d’échange conçus pour vous aider à avancer avec douceur et confiance.
            </p>
            <div class="d-flex flex-wrap gap-3">
              <a href="{{ url('/contact') }}" class="btn btn-light text-success fw-semibold">Demander un accompagnement</a>
              <a href="{{ url('/apropos') }}" class="btn btn-outline-light">En savoir plus</a>
            </div>
          </div>
          <div class="col-lg-5" data-aos="fade-up" data-aos-delay="100">
            <div class="p-4 rounded-4 bg-white text-dark shadow-sm">
              <h4 class="mb-3">Pourquoi choisir Well-Being ?</h4>
              <ul class="list-unstyled mb-0">
                <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i> Un accompagnement humain et personnalisable</li>
                <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i> Des espaces d’échange bienveillants</li>
                <li><i class="bi bi-check2-circle text-success me-2"></i> Une communauté engagée dans le bien-être</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="services section">
      <div class="container">
        <div class="row g-4">
          @forelse($services as $service)
            @php
              $icons = ['heart-pulse','people','journal-text','chat-dots','flower1','stars'];
              $icon = $icons[$loop->index % count($icons)];
            @endphp
            <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ 100 + ($loop->index * 60) }}">
              <article class="service-card h-100">
                <div class="service-icon mb-3"><i class="bi bi-{{ $icon }} fs-4"></i></div>
                <h3 class="h5 mb-3">{{ $service->titre }}</h3>
                <p class="text-muted mb-4 text-break" style="overflow-wrap: anywhere; word-break: break-word;">{{ \Illuminate\Support\Str::limit($service->description, 140) }}</p>
                @if($service->image_url)
                  <img src="{{ asset($service->image_url) }}" alt="{{ $service->titre }}" class="img-fluid rounded-4 mb-3" style="height: 180px; object-fit: cover; width: 100%;">
                @endif
                <a href="{{ route('wellbeing.programmes') }}" class="btn btn-outline-success">Voir le programme</a>
              </article>
            </div>
          @empty
            <div class="col-12">
              <div class="alert alert-info rounded-4">Aucun programme disponible pour le moment. Revenez bientôt ou contactez-nous directement.</div>
            </div>
          @endforelse
        </div>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="cta-panel p-4 p-lg-5">
          <div class="row align-items-center gy-4">
            <div class="col-lg-8">
              <h3 class="mb-2">Vous ne trouvez pas le programme qui vous correspond ?</h3>
              <p class="mb-0 text-muted">Nous pouvons vous orienter vers la meilleure solution en fonction de votre besoin.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
              <a href="{{ url('/contact') }}" class="btn btn-success px-4">Nous contacter</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <footer id="footer" class="footer">
    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="{{ url('/') }}" class="d-flex align-items-center">
            <span class="sitename">{{ config('app.name') }}</span>
          </a>
          <div class="footer-contact pt-3">
            <p>Une association dédiée au bien-être, à l’accompagnement et à la solidarité.</p>
            <p class="mt-3"><strong>Téléphone :</strong> <span>À compléter</span></p>
            <p><strong>Email :</strong> <span>À compléter</span></p>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Liens utiles</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ url('/') }}">Accueil</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ url('/apropos') }}">À propos</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('wellbeing.programmes') }}">Programmes</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ url('/contact') }}">Contact</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Nos programmes</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('wellbeing.programmes') }}">Accompagnement</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('wellbeing.programmes') }}">Ateliers</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('wellbeing.programmes') }}">Groupes de parole</a></li>
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

  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>

  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script>
  <script>AOS.init();</script>
</body>
</html>
