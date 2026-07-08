<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ config('app.name') }} - {{ $service->titre }}</title>
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
</head>
<body>
  <div class="container py-5">
    <a href="{{ route('services.list') }}" class="btn btn-link mb-4">← Retour aux services</a>
    <div class="row gy-4">
      <div class="col-lg-6">
        @if($service->image_url)
          <img src="{{ asset($service->image_url) }}" class="img-fluid rounded" alt="{{ $service->titre }}">
        @else
          <div class="bg-secondary rounded" style="height:320px;"></div>
        @endif
      </div>
      <div class="col-lg-6">
        <h1>{{ $service->titre }}</h1>
        <p class="text-muted">{{ $service->description }}</p>
        <a href="{{ url('/contact') }}" class="btn btn-success">Nous contacter</a>
      </div>
    </div>
  </div>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
