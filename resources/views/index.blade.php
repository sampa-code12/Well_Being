<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>{{ config('app.name') }} - Accueil</title>
  <meta name="description" content="{{ config('app.name') }}, une expérience de bien-être moderne et naturelle.">
  <meta name="keywords" content="bien-être, santé, épanouissement, wellness">

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

<body class="index-page" style="background-image: url('{{ asset('logo/logo_Well_Being.jpeg') }}'); background-size: cover; background-position: center center; background-repeat: no-repeat; background-attachment: fixed; background-color: #f7f5ef; min-height: 100vh;">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto">
        <img src="{{ asset('logo/logo_Well_Being.jpeg') }}" alt="{{ config('app.name') }} logo">
        <h1 class="sitename">{{ config('app.name') }}</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ url('/') }}" class="active">Accueil</a></li>
          <li><a href="{{ url('/apropos') }}">À propos</a></li>
          <li><a href="{{ route('wellbeing.programmes') }}">Programmes</a></li>
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
        $dashboardRoute = auth()->user()->estAdmin() ? route('admin.dashboard') : route('membre.dashboard');
      @endphp
      <a class="btn-getstarted" href="{{ $dashboardRoute }}">Mon espace</a>
      @endauth

    </div>
  </header>

  <main class="main">
    @if (session('partner_success'))
    <div class="modal fade" id="partnerSuccessModal" tabindex="-1" aria-labelledby="partnerSuccessModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
          <div class="modal-header bg-success text-white">
            <h5 class="modal-title" id="partnerSuccessModalLabel">Inscription réussie</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
          </div>
          <div class="modal-body">
            <p class="mb-3">Merci pour votre engagement. Votre demande a bien été enregistrée.</p>
            <p class="mb-0">Le lien du groupe WhatsApp sera communiqué très bientôt.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-bs-dismiss="modal">Fermer</button>
          </div>
        </div>
      </div>
    </div>
    @endif

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
            <h1>Bienvenue chez Well-Being</h1>
            <p>Des programmes d'accompagnement, de solidarité et de bien-être conçus pour vous aider à avancer sereinement.</p>
            <div class="alert alert-warning border-0 shadow-sm mb-3" role="alert" style="max-width: 650px;">
              <strong>FONDATEURS DE WELL-BEING :</strong><br>
              <span class="fw-bold text-dark">ALOYS JOSIAS TAPIEMENE TAPONDJOU</span><br>
              <span class="fw-bold text-dark">GEORGETTE INDIRAH MBINACK NSOGA</span>
            </div>
            <div class="d-flex flex-wrap gap-3">
              <a href="{{ route('wellbeing.programmes') }}" class="btn-get-started">Découvrir nos programmes</a>
              <a href="{{ route('wellbeing.programmes') }}" class="btn btn-outline-light">Voir les programmes</a>
<button type="button" class="btn btn-light text-success fw-semibold" data-bs-toggle="modal" data-bs-target="#videoMembersModal">
                Voir la vidéo
              </button>
            </div>
          </div>
          <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="200">
            <img src="{{ asset('logo/logo_Well_Being.jpeg') }}" class="img-fluid animated" alt="Illustration Well-Being">
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- Clients Section -->
    <section id="clients" class="clients section light-background">

      <div class="container" data-aos="zoom-in">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 2,
                  "spaceBetween": 40
                },
                "480": {
                  "slidesPerView": 3,
                  "spaceBetween": 60
                },
                "640": {
                  "slidesPerView": 4,
                  "spaceBetween": 80
                },
                "992": {
                  "slidesPerView": 5,
                  "spaceBetween": 120
                },
                "1200": {
                  "slidesPerView": 6,
                  "spaceBetween": 120
                }
              }
            }
          </script>
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><img src="{{ asset('assets/img/clients/clients-1.webp') }}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{ asset('assets/img/clients/clients-2.webp') }}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{ asset('assets/img/clients/clients-3.webp') }}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{ asset('assets/img/clients/clients-4.webp') }}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{ asset('assets/img/clients/clients-5.webp') }}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{ asset('assets/img/clients/clients-6.webp') }}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{ asset('assets/img/clients/clients-7.webp') }}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{ asset('assets/img/clients/clients-8.webp') }}" class="img-fluid" alt=""></div>
          </div>
        </div>

      </div>

    </section><!-- /Clients Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Qui sommes-nous ?</h2>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
            <p>
              Fondée par <span class="fw-bold text-uppercase">Aloys Josias Tapiemene Tapondjou</span> et <span class="fw-bold text-uppercase">Georgette Indirah Mbinack Nsoga</span>, l’association Well-Being travaille pour promouvoir le bien-être physique, mental, social et communautaire au Cameroun et au-delà. Sa mission est d’accompagner les jeunes, les familles et les communautés à travers des actions concrètes de prévention, d’éducation et de solidarité.
            </p>
            <ul>
              <li><i class="bi bi-check2-circle"></i> <span>Des actions de santé, de prévention et d’écoute</span></li>
              <li><i class="bi bi-check2-circle"></i> <span>Un accompagnement au service des jeunes et des familles</span></li>
              <li><i class="bi bi-check2-circle"></i> <span>Des programmes accessibles et orientés impact communautaire</span></li>
            </ul>
          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <div class="p-3 rounded-4 border border-success-subtle bg-white bg-opacity-75 shadow-sm mb-3">
              <p class="mb-2 fw-semibold text-success">Fondateurs de Well-Being</p>
              <p class="mb-0 fw-bold text-dark text-uppercase" style="font-size: 1.05rem; line-height: 1.7;">
                Aloys Josias Tapiemene Tapondjou<br>
                Georgette Indirah Mbinack Nsoga
              </p>
            </div>
            <p>Well-Being s’appuie sur des valeurs de solidarité, d’écoute, d’engagement et de proximité pour créer un environnement favorable au bien-être de chacun, avec un objectif clair : devenir l’association de référence pour le bien-être à Maroua, Cameroun, et au-delà.</p>
            <a href="{{ url('/apropos') }}" class="read-more"><span>En savoir plus</span><i class="bi bi-arrow-right"></i></a>
          </div>

        </div>

      </div>

    </section><!-- /About Section -->

    <!-- Why Us Section -->
    <section id="why-us" class="section why-us light-background" data-builder="section">

      <div class="container-fluid">

        <div class="row gy-4">

          <div class="col-lg-7 d-flex flex-column justify-content-center order-2 order-lg-1">

            <div class="content px-xl-5" data-aos="fade-up" data-aos-delay="100">
              <h3><span>Pourquoi rejoindre Well-Being ?</span><strong>Une communauté qui vous accompagne à chaque étape</strong></h3>
              <p>
                Que vous cherchiez un accompagnement, souhaitiez devenir bénévole ou simplement en apprendre plus sur nos actions, Well-Being vous ouvre ses portes.
              </p>
            </div>

            <div class="faq-container px-xl-5" data-aos="fade-up" data-aos-delay="200">

              <div class="faq-item faq-active">

                <h3><span>01</span> Comment devenir membre de Well-Being ?</h3>
                <div class="faq-content">
                  <p>Il vous suffit de créer un compte sur notre plateforme puis de faire une demande d'adhésion. Un membre de notre équipe traitera votre demande dans les meilleurs délais.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3><span>02</span> Quels programmes propose l'association ?</h3>
                <div class="faq-content">
                  <p>Well-Being propose plusieurs programmes d'accompagnement au bien-être, détaillés dans notre section Programmes. Chaque action peut faire l'objet d'un engagement ou d'un accompagnement direct.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3><span>03</span> Comment soutenir ou devenir partenaire de Well-Being ?</h3>
                <div class="faq-content">
                  <p>Vous pouvez nous soutenir en tant que donateur, bénévole ou partenaire. Contactez-nous via le formulaire dédié pour en discuter avec notre équipe.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

            </div>

          </div>

          <div class="col-lg-5 order-1 order-lg-2 why-us-img">
            <img src="{{ asset('assets/img/why-us.png') }}" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="100">
          </div>
        </div>

      </div>

    </section><!-- /Why Us Section -->

                

             

    <!-- Programmes Section -->
    <section id="programmes" class="services section light-background">
      <div class="container section-title" data-aos="fade-up">
        <h2>Programmes</h2>
        <p>Des actions concrètes autour de la santé, de la prévention, du soutien communautaire et du bien-être global.</p>
      </div>

      <div class="container">
        <div class="row gy-4">
          @foreach($axes as $axe)
          <div class="col-xl-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="{{ 100 + $loop->index * 100 }}">
            <div class="service-item position-relative h-100 w-100 p-4 border rounded-4 bg-white">
              <div class="service-icon mb-3"><i class="bi {{ $axe['icon'] }} fs-4"></i></div>
              <h4>{{ $axe['label'] }}</h4>
              <p class="text-muted">{{ $axe['description'] }}</p>
              <ul class="list-unstyled mb-0">
                @foreach($axe['objectives'] as $objectif)
                  <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i>{{ $objectif }}</li>
                @endforeach
              </ul>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section><!-- /Programmes Section -->

    <!-- Call To Action Section -->
    <section id="call-to-action" class="call-to-action section dark-background">

      <img src="{{ asset('assets/img/bg/bg-8.webp') }}" alt="">

      <div class="container">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-xl-9 text-center text-xl-start">
            <h3>Rejoignez le mouvement Well-Being</h3>
            <p>Devenez membre, bénévole ou partenaire dès aujourd'hui et participez activement à notre mission de bien-être pour tous.</p>
          </div>
          <div class="col-xl-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="{{ url('/contact') }}">Nous rejoindre</a>
          </div>
        </div>

      </div>

    </section><!-- /Call To Action Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>Une question, une demande d'adhésion, un partenariat ? Notre équipe vous répond rapidement.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-5">

            <div class="info-wrap">
              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h3>Adresse</h3>
                  <p><!-- [À CONFIRMER] Adresse réelle de l'association --></p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                <i class="bi bi-telephone flex-shrink-0"></i>
                <div>
                  <h3>Appelez-nous</h3>
                  <p><!-- [À CONFIRMER] Téléphone réel de l'association --></p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h3>Écrivez-nous</h3>
                  <p><!-- [À CONFIRMER] Email réel de l'association --></p>
                </div>
              </div><!-- End Info Item -->

              <iframe src="https://www.google.com/maps?q=Centre%20d%27Etat%20Civil%20Kaele%20Maroua%20Cameroun&z=16&output=embed" frameborder="0" style="border:0; width: 100%; height: 270px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>

          <div class="col-lg-7">
            <form action="{{ asset('forms/contact.php') }}" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
              <div class="row gy-4">

                <div class="col-md-6">
                  <label for="name-field" class="pb-2">Votre nom</label>
                  <input type="text" name="name" id="name-field" class="form-control" required>
                </div>

                <div class="col-md-6">
                  <label for="email-field" class="pb-2">Votre adresse email</label>
                  <input type="email" class="form-control" name="email" id="email-field" required>
                </div>

                <div class="col-md-12">
                  <label for="subject-field" class="pb-2">Objet</label>
                  <input type="text" class="form-control" name="subject" id="subject-field" required>
                </div>

                <div class="col-md-12">
                  <label for="message-field" class="pb-2">Votre message</label>
                  <textarea class="form-control" name="message" rows="10" id="message-field" required></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit">Envoyer</button>
                </div>

                <div class="col-md-12 text-center mt-3">
                  <a href="{{ route('partners.create') }}" class="btn btn-outline-success">Devenir partenaire</a>
                </div>

              </div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-lg-6">
            <h4>Rejoignez notre newsletter</h4>
            <p>Abonnez-vous pour recevoir les dernières nouvelles de nos activités et programmes.</p>
            <form action="#" method="post" class="php-email-form">
              <div class="sent-message">Votre demande d’abonnement a bien été envoyée. Merci !</div>
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
            <p>Centre d’État Civil de Kaélé</p>
            <p>Maroua, Cameroun</p>
            <p class="mt-3"><strong>Téléphone :</strong> <span>À confirmer</span></p>
            <p><strong>Email :</strong> <span>contact@wellbeing.org</span></p>
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
          <h4>Programmes</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Accompagnement bien-être</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Groupes de parole & entraide</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Ateliers & sensibilisation</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('partners.create') }}">Devenir partenaire</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12">
          <h4>Suivez Well-Being</h4>
          <p>Restez informé de nos actions, événements et programmes.</p>
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
      <p>© <span>Copyright</span> <strong class="px-1 sitename">{{ config('app.name') }}</strong> <span>Tous droits réservés</span></p>
    </div>

  </footer>

  <div class="modal fade" id="videoMembersModal" tabindex="-1" aria-labelledby="videoMembersModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="videoMembersModalLabel">Les membres en action</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
        </div>
        <div class="modal-body">
          <div class="ratio ratio-16x9">
            <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="Vidéo des membres en action" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>

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
  @if (session('partner_success'))
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var modal = new bootstrap.Modal(document.getElementById('partnerSuccessModal'));
      modal.show();
    });
  </script>
  @endif

  <div class="chatbot-widget" id="chatbot-widget">
    <button class="chatbot-button" type="button" id="chatbot-toggle" aria-label="Open chatbot"><i class="bi bi-chat-dots"></i></button>
    <div class="chatbot-panel" id="chatbot-panel" aria-hidden="true">
      <div class="chatbot-header">
        <div>
          <strong>{{ config('app.name') }} Chat</strong>
          <p id="chatbot-subtitle">Assistant service client</p>
        </div>
        <button class="chatbot-close" type="button" id="chatbot-close" aria-label="Close chatbot">&times;</button>
      </div>
      <div class="chatbot-lang-actions">
        <button type="button" class="chatbot-lang-btn active" data-lang="fr">FR</button>
        <button type="button" class="chatbot-lang-btn" data-lang="en">EN</button>
      </div>
      <div class="chatbot-messages" id="chatbot-messages">
        <div class="chatbot-message bot"><span id="chatbot-welcome">Bonjour ! Je suis votre assistant Well-Being. Veuillez choisir votre langue : 1 pour Français, 2 pour English.</span></div>
      </div>
      <form class="chatbot-form" id="chatbot-form">
        <input id="chatbot-input" type="text" placeholder="Écrivez un message..." autocomplete="off">
        <button type="submit">Envoyer</button>
      </form>
    </div>
  </div>

</body>

</html>