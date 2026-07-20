<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>{{ config('app.name') }} - Contact</title>
  <meta name="description" content="Contactez {{ config('app.name') }} pour retrouver votre équilibre naturel.">
  <meta name="keywords" content="contact bien-être, wellness, support santé">

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

<body class="contact-page">
  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">
      <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto"><img src="{{ asset('logo/logo_Well_Being.jpeg') }}" alt="{{ config('app.name') }} logo"><h1 class="sitename">{{ config('app.name') }}</h1></a>
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ url('/') }}">Accueil</a></li>
          <li><a href="{{ url('/apropos') }}">À propos</a></li>
          <li><a href="{{ route('wellbeing.programmes') }}">Programmes</a></li>
          <li><a href="{{ route('partners.create') }}">Devenir partenaire</a></li>
          <li><a href="{{ url('/contact') }}" class="active">Contact</a></li>
          <li><a href="{{ route('avis.list') }}">Avis</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
      <a class="btn-getstarted" href="{{ url('/contact') }}">Nous rejoindre</a>
    </div>
  </header>

  <main class="main">
    <section id="contact" class="contact section" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
      <div class="container section-title" data-aos="fade-up" data-aos-delay="100">
        <h2>Contact</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div>

      <div class="container" data-aos="fade-up" data-aos-delay="200">

        <div class="row gy-4">

          <div class="col-lg-5">

            <div class="info-wrap">
              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h3>Address</h3>
                  <p>A108 Adam Street, New York, NY 535022</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                <i class="bi bi-telephone flex-shrink-0"></i>
                <div>
                  <h3>Call Us</h3>
                  <p>+1 5589 55488 55</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h3>Email Us</h3>
                  <p>info@example.com</p>
                </div>
              </div><!-- End Info Item -->

              <iframe src="https://www.google.com/maps?q=Centre%20d%27Etat%20Civil%20Kaele%20Maroua%20Cameroun&z=16&output=embed" frameborder="0" style="border:0; width: 100%; height: 270px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>

          <div class="col-lg-7" data-aos="fade-up" data-aos-delay="300">
            @if (session('success'))
              <div class="alert alert-success mb-4" role="status">
                {{ session('success') }}
              </div>
            @endif

            @if ($errors->any())
              <div class="alert alert-danger mb-4" role="alert">
                <ul class="mb-0">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <form action="{{ route('contact.store') }}" method="post" class="php-email-form">
              @csrf
              <div class="row gy-4">

                <div class="col-md-6">
                  <label for="name-field" class="pb-2">Your Name</label>
                  <input type="text" name="name" id="name-field" class="form-control" required>
                </div>

                <div class="col-md-6">
                  <label for="email-field" class="pb-2">Your Email</label>
                  <input type="email" class="form-control" name="email" id="email-field" required>
                </div>

                <div class="col-md-12">
                  <label for="subject-field" class="pb-2">Subject</label>
                  <input type="text" class="form-control" name="subject" id="subject-field" required>
                </div>

                <div class="col-md-12">
                  <label for="message-field" class="pb-2">Message</label>
                  <textarea class="form-control" name="message" rows="10" id="message-field" required></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit">Send Message</button>
                </div>

              </div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>
    </section>
  </main>

  <footer id="footer" class="footer">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-lg-6">
            <h4>Rejoignez notre newsletter</h4>
            <p>Abonnez-vous pour recevoir les dernières nouvelles sur nos activités et programmes.</p>
            <form action="{{ asset('forms/newsletter.php') }}" method="post" class="php-email-form">
              <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="S’abonner"></div>
              <div class="loading">Chargement</div>
              <div class="error-message"></div>
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
            <li><i class="bi bi-chevron-right"></i> <a href="#">Conditions d’utilisation</a></li>
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
      <div class="credits">
        Conçu avec <a href="https://bootstrapmade.com/">BootstrapMade</a> | <a href="https://bootstrapmade.com/tools/">DevTools</a>
      </div>
    </div>

  </footer>

  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
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