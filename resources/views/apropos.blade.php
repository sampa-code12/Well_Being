<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>{{ config('app.name') }} - À propos</title>
  <meta name="description" content="Présentation de {{ config('app.name') }} et de notre vision du bien-être.">
  <meta name="keywords" content="à propos, bien-être, wellness, équipe">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

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

<body class="about-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto">
        <img src="{{ asset('logo/logo_Well_Being.jpeg') }}" alt="{{ config('app.name') }} logo">
        <h1 class="sitename">{{ config('app.name') }}</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ url('/') }}">Accueil</a></li>
          <li><a href="{{ url('/apropos') }}" class="active">À propos</a></li>
          <li><a href="{{ route('wellbeing.programmes') }}">Programmes</a></li>
          <li><a href="{{ route('wellbeing.programmes') }}">Programmes</a></li>
          <li><a href="{{ url('/contact') }}">Contact</a></li>
          <li><a href="{{ route('avis.list') }}">Avis</a></li>
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
            <li><a href="{{ url('/') }}">Home</a></li>
            <li class="current">À propos</li>
          </ol>
        </nav>
        <h1>À propos de Well-Being</h1>
        <p>Une association au service du bien-être et de la solidarité</p>
      </div>
    </div><!-- End Page Title -->

    <!-- About Section -->
    <section id="about" class="about section">
      <div class="container" data-aos="fade-up">
        <div class="row gy-4 align-items-center">
          <div class="col-lg-7">
            <h2>Notre histoire</h2>
            <p>Well-Being est née de la volonté de son fondateur, Josias Einstein, de créer un espace où chacun peut trouver écoute, accompagnement et ressources pour améliorer son bien-être physique, mental et social. Depuis sa création, l'association fédère une communauté grandissante de membres, de bénévoles et de partenaires engagés autour d'une même mission : faire du bien-être un droit accessible à tous.</p>
          </div>

          <div class="col-lg-5">
            <div class="icon-box mb-4">
              <i class="bi bi-heart-pulse"></i>
              <h4>Nos objectifs</h4>
              <p>Accroître la visibilité de l'association et de ses actions.</p>
            </div>
            <div class="icon-box mb-4">
              <i class="bi bi-people"></i>
              <h4>Nos valeurs</h4>
              <p>Solidarité, écoute, engagement et intégrité au cœur de nos actions.</p>
            </div>
            <div class="icon-box">
              <i class="bi bi-stars"></i>
              <h4>Nos membres fondateurs</h4>
              <p>Josias Einstein, fondateur de Well-Being.</p>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End About Section -->

  </main>

  <footer id="footer" class="footer">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-lg-6">
            <h4>Rejoignez notre newsletter</h4>
            <p>Abonnez-vous pour recevoir les dernières nouvelles de nos activités et programmes.</p>
            <form action="{{ asset('forms/newsletter.php') }}" method="post" class="php-email-form">
              <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="S'abonner"></div>
              <div class="loading">Chargement</div>
              <div class="error-message"></div>
              <div class="sent-message">Votre demande d'abonnement a bien été envoyée. Merci !</div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="{{ url('/') }}" class="d-flex align-items-center">
            <span class="sitename">{{ config('app.name') }}</span>
          </a>
          <div class="footer-contact pt-3">
            <p><!-- [À CONFIRMER] Adresse réelle de l'association --></p>
            <p class="mt-3"><strong>Téléphone :</strong> <span><!-- [À CONFIRMER] Téléphone réel de l'association --></span></p>
            <p><strong>Email :</strong> <span><!-- [À CONFIRMER] Email réel de l'association --></span></p>
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
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">{{ config('app.name') }}</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> | <a href="https://bootstrapmade.com/tools/">DevTools</a>
      </div>
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

  <div class="chatbot-widget" id="chatbot-widget">
    <button class="chatbot-button" type="button" id="chatbot-toggle" aria-label="Open chatbot"><i class="bi bi-chat-dots"></i></button>
    <div class="chatbot-panel" id="chatbot-panel" aria-hidden="true">
      <div class="chatbot-header">
        <div>
          <strong>{{ config('app.name') }} Chat</strong>
        </div>
        <button class="chatbot-close" type="button" id="chatbot-close" aria-label="Close chatbot">&times;</button>
      </div>
      <p id="chatbot-subtitle">Assistant service client</p>
      <div class="chatbot-lang-buttons">
        <button type="button" class="chatbot-lang-btn active" data-lang="fr">FR</button>
        <button type="button" class="chatbot-lang-btn" data-lang="en">EN</button>
      </div>
      <div class="chatbot-messages" id="chatbot-messages">
        <div class="chatbot-message bot"><span id="chatbot-welcome">Bonjour ! Je suis votre assistant bien-être. Posez-moi une question.</span></div>
      </div>
      <form class="chatbot-form" id="chatbot-form">
        <input id="chatbot-input" type="text" placeholder="Écrivez un message..." autocomplete="off">
        <button type="submit">Envoyer</button>
      </form>
    </div>
  </div>

</body>

</html>