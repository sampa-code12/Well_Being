<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>{{ config('app.name') }} - Services</title>
  <meta name="description" content="Découvrez les services bien-être conçus pour votre équilibre.">
  <meta name="keywords" content="services bien-être, coaching, santé, wellness">

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
            <li><a href="{{ url('/') }}">Home</a></li>
            <li class="current">Programmes</li>
          </ol>
        </nav>
        <h1>Nos programmes</h1>
        <p class="section-description">Des accompagnements pensés pour votre bien-être</p>
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