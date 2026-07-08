<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ config('app.name') }} - Services</title>
  <meta name="description" content="Découvrez les services bien-être conçus pour votre équilibre.">
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
</head>
<body>
  <header class="header d-flex align-items-center sticky-top bg-white shadow-sm">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between py-3">
      <a href="{{ url('/') }}" class="d-flex align-items-center gap-2 text-decoration-none">
        <img src="{{ asset('logo/logo_Well_Being.jpeg') }}" alt="{{ config('app.name') }}" width="40" height="40">
        <span class="h5 mb-0 text-dark">{{ config('app.name') }}</span>
      </a>
      <nav class="d-flex gap-3">
        <a href="{{ url('/') }}" class="text-dark">Accueil</a>
        <a href="{{ url('/apropos') }}" class="text-dark">À propos</a>
        <a href="{{ url('/services') }}" class="text-dark fw-bold">Services</a>
        <a href="{{ url('/contact') }}" class="text-dark">Contact</a>
      </nav>
    </div>
  </header>

  <main class="container py-5">
    <div class="mb-5 text-center">
      <h1 class="mb-3">Nos services</h1>
      <p class="text-muted">Des accompagnements pensés pour votre bien-être, à travers notre communauté et nos actions.</p>
    </div>

    <div class="row g-4">
      @forelse($services as $service)
        <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ 100 + ($loop->index * 50) }}">
          <div class="card h-100 shadow-sm border-0">
            @if($service->image_url)
              <img src="{{ asset($service->image_url) }}" class="card-img-top" alt="{{ $service->titre }}" style="height:220px; object-fit:cover;">
            @endif
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">{{ $service->titre }}</h5>
              <p class="card-text text-muted">{{ \Illuminate\Support\Str::limit($service->description, 150) }}</p>
              <a href="{{ route('services.show', $service) }}" class="mt-auto btn btn-success">Voir le service</a>
            </div>
          </div>
        </div>
      @empty
        <div class="col-12">
          <div class="alert alert-info">Aucun service disponible pour le moment.</div>
        </div>
      @endforelse
    </div>
  </main>

  <footer class="footer bg-light py-4">
    <div class="container text-center text-muted">© {{ date('Y') }} {{ config('app.name') }}. Tous droits réservés.</div>
  </footer>

  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script> AOS.init(); </script>
</body>
</html>
