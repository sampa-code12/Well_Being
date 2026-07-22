<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>{{ config('app.name') }} - Services</title>
  <meta name="description" content="Découvrez les services bien-être conçus pour votre équilibre.">
  <meta name="keywords" content="services bien-être, coaching, santé, wellness">

  <!-- Favicons -->
  <link href="{{ asset('logo/logo_well_being.jpeg') }}" rel="icon">
  <link href="{{ asset('logo/logo_well_being.jpeg') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
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
          <li><a href="{{ route('wellbeing.programmes') }}">Programmes</a></li>
          <li><a href="{{ route('partners.create') }}">Devenir partenaire</a></li>
          <li><a href="{{ url('/contact') }}">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="{{ url('/contact') }}">Nous rejoindre</a>

    </div>
  </header>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="container">
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{ url('/') }}">Accueil</a></li>
            <li class="current">Programmes</li>
          </ol>
        </nav>
        @php
          $backUrl = url()->previous();
          if (!$backUrl || $backUrl === url('/programmes') || $backUrl === url('/services') || $backUrl === url()->current()) {
              $backUrl = url('/');
          }
        @endphp
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
          <div>
            <h1>Nos programmes</h1>
            <p class="section-description">Des accompagnements pensés pour votre bien-être</p>
          </div>
          <a href="{{ $backUrl }}" class="btn btn-outline-success btn-sm">Retour</a>
        </div>
      </div>
    </div><!-- End Page Title -->

    <!-- Services Cards Section -->
    <section id="services" class="services section">
      <div class="container">
        <div class="row gy-4">

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-card p-4 shadow-sm rounded">
              <div class="icon mb-3"><i class="bi bi-heart-pulse fs-2 text-success"></i></div>
              <h3>Accompagnement bien-être</h3>
              <p>Un suivi personnalisé pour vous aider à retrouver équilibre et sérénité au quotidien.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="150">
            <div class="service-card p-4 shadow-sm rounded">
              <div class="icon mb-3"><i class="bi bi-people-fill fs-2 text-success"></i></div>
              <h3>Groupes de parole & entraide</h3>
              <p>Des espaces d'échange bienveillants animés par notre équipe et nos membres, pour partager et avancer ensemble.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-card p-4 shadow-sm rounded">
              <div class="icon mb-3"><i class="bi bi-droplet-half fs-2 text-success"></i></div>
              <h3>Ateliers & sensibilisation</h3>
              <p>Des ateliers thématiques réguliers pour informer, sensibiliser et outiller notre communauté sur les enjeux du bien-être.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="250">
            <div class="service-card p-4 shadow-sm rounded">
              <div class="icon mb-3"><i class="bi bi-brain fs-2 text-success"></i></div>
              <h3>Accompagnement partenaires</h3>
              <p>Un accompagnement dédié aux organisations et institutions souhaitant s'associer à notre mission.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-card p-4 shadow-sm rounded">
              <div class="icon mb-3"><i class="bi bi-calendar-check fs-2 text-success"></i></div>
              <h3>Vous ne trouvez pas ce que vous cherchez ?</h3>
              <p>Contactez-nous directement, notre équipe est à votre écoute pour étudier votre besoin.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="350">
            <div class="service-card p-4 shadow-sm rounded">
              <div class="icon mb-3"><i class="bi bi-stars fs-2 text-success"></i></div>
              <h3>Nous rejoindre</h3>
              <p>Rejoignez Well-Being et participez à un mouvement solidaire autour du bien-être.</p>
            </div>
          </div>

        </div>
      </div>
    </section><!-- End Services Cards Section -->

  </main>

  <footer id="footer" class="footer">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="{{ url('/') }}" class="d-flex align-items-center">
            <span class="sitename">{{ config('app.name') }}</span>
          </a>
          <div class="footer-contact pt-3">
            <p>Kaélé-Maroua-Cameroun</p>
            <p class="mt-3"><strong>Téléphone :</strong> <span>+237 659 00 47 31</span></p>
            <p><strong>WhatsApp :</strong> <span>+237 659 00 47 31</span></p>
            <p><strong>Email :</strong> <span>associationwellbeing@gmail.com</span></p>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Liens utiles</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ url('/') }}">Accueil</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ url('/apropos') }}">À propos</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('wellbeing.programmes') }}">Programmes</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Conditions d'utilisation</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Nos programmes</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Accompagnement bien-être</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Groupes de parole & entraide</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Ateliers & sensibilisation</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Devenir partenaire</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12">
          <h4>Suivez-nous</h4>
          <p>Suivez notre actualité et nos actions sur les réseaux sociaux.</p>
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

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
  <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>


</body>

</html>