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
    <div class="page-title py-4 py-md-5" data-aos="fade">
      <div class="container">
        <nav class="breadcrumbs" aria-label="Fil d’ariane">
          <ol class="breadcrumb mb-3 justify-content-center justify-content-md-start">
            <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-decoration-none text-success">Accueil</a></li>
            <li class="breadcrumb-item active text-white" aria-current="page">À propos</li>
          </ol>
        </nav>
        <h1 class="display-6 fw-bold mb-2">À propos de Well-Being</h1>
        <p class="lead mb-0 text-white-50">Une association engagée pour le bien-être, la santé, la prévention et la solidarité.</p>
      </div>
    </div><!-- End Page Title -->

    <!-- About Section -->
    <section id="about" class="about section py-3 py-md-4">
      <div class="container" data-aos="fade-up">
        <div class="row gy-4 align-items-start">
          <div class="col-lg-7">
            <h2 class="mb-3">Notre histoire</h2>
            <p class="mb-3">Well-Being est une association fondée par Aloys Josias Tapiemene Tapondjou et Georgette Indirah Mbinack Nsoga, animée par la volonté de promouvoir le bien-être global des personnes et des communautés. Elle intervient dans l’extrême nord et à travers le territoire national pour renforcer la santé, la cohésion sociale, l’éducation et la prévention.</p>
            <p class="mb-3">Notre mission est de sensibiliser, accompagner et mobiliser les communautés autour de pratiques favorables au bien-être physique, mental et social. À travers des actions de proximité, l’association met en place des initiatives destinées aux jeunes, aux familles, aux femmes et aux personnes vulnérables.</p>
            <p class="mb-0">Nous travaillons à créer des espaces d’écoute, à lutter contre les tabous, à promouvoir l’accès à des informations essentielles et à construire des partenariats solides avec les collectivités, les écoles, les centres de santé et les acteurs communautaires.</p>
          </div>

          <div class="col-lg-5">
            <div class="icon-box mb-3">
              <i class="bi bi-heart-pulse"></i>
              <h4>Objectif général</h4>
              <p>Devenir l’association de référence à Kaélé pour le bien-être physique, mental et social, en touchant directement 5 000 personnes par an.</p>
            </div>
            <div class="icon-box mb-3">
              <i class="bi bi-people"></i>
              <h4>Nos valeurs</h4>
              <p>Solidarité, écoute, engagement, inclusion et proximité communautaire.</p>
            </div>
            <div class="icon-box mb-3 border-success-subtle">
              <i class="bi bi-stars text-success"></i>
              <h4 class="text-success">Nos membres fondateurs</h4>
              <p class="fw-semibold mb-0" style="font-size: 1.02rem; line-height: 1.7;">
                <span class="d-block text-dark">Aloys Josias Tapiemene Tapondjou</span>
                <span class="d-block text-dark">Georgette Indirah Mbinack Nsoga</span>
              </p>
            </div>
            <div class="icon-box">
              <i class="bi bi-shield-check"></i>
              <h4>Nos priorités</h4>
              <p>Prévention, santé mentale, éducation, autonomisation des femmes et renforcement du tissu social.</p>
            </div>
          </div>
        </div>

        <div class="row g-4 mt-2 mt-md-4">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="card h-100 border-0 shadow-sm">
              <div class="card-body p-4 p-md-5">
                <div class="d-flex flex-column flex-md-row align-items-md-start gap-4">
                  <div class="flex-shrink-0 w-100" style="max-width: 220px;">
                    <div class="bg-light border rounded-4 d-flex align-items-center justify-content-center" style="min-height: 220px; border-style: dashed; border-width: 2px; border-color: #cfe8d8;">
                      <div class="text-center text-muted px-3">
                        <i class="bi bi-person-circle fs-1 d-block mb-2"></i>
                        <span class="fw-semibold">Photo du fondateur</span>
                      </div>
                    </div>
                  </div>
                  <div class="flex-grow-1">
                    <h3 class="h5 fw-bold text-success mb-3">Aloys Josias Tapiemene Tapondjou</h3>
                    <p class="text-muted mb-3">Ajoutez ici une petite biographie, ses parcours, ses motivations et son rôle dans l’association.</p>
                    <p class="mb-0">Vous pouvez insérer un texte court, une courte présentation personnelle et les engagements qui l’animent dans la mission de Well-Being.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <div class="card h-100 border-0 shadow-sm">
              <div class="card-body p-4 p-md-5">
                <div class="d-flex flex-column flex-md-row align-items-md-start gap-4">
                  <div class="flex-shrink-0 w-100" style="max-width: 220px;">
                    <div class="bg-light border rounded-4 d-flex align-items-center justify-content-center" style="min-height: 220px; border-style: dashed; border-width: 2px; border-color: #cfe8d8;">
                      <div class="text-center text-muted px-3">
                        <i class="bi bi-person-circle fs-1 d-block mb-2"></i>
                        <span class="fw-semibold">Photo de la fondatrice</span>
                      </div>
                    </div>
                  </div>
                  <div class="flex-grow-1">
                    <h3 class="h5 fw-bold text-success mb-3">Georgette Indirah Mbinack Nsoga</h3>
                    <p class="text-muted mb-3">Ajoutez ici une petite biographie, son parcours, ses motivations et son rôle dans l’association.</p>
                    <p class="mb-0">Vous pouvez insérer un texte court, une courte présentation personnelle et les engagements qui l’animent dans la mission de Well-Being.</p>
                  </div>
                </div>
              </div>
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