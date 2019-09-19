<!doctype html>
<html lang="pt-br">
  
<head>
  <title>Tiny Blog =D</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" href="{{ asset('img/favicon.png') }}" />
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light">
    <div class="container">
  
      <a class="navbar-brand mx-auto" href="{{ route('blog-home') }}">
        Tiny Blog =D
      </a>
    </div>
  </nav>
    
  @yield('content')
  
<footer class="pt-5 bg-primary">
  <div class="container">
    <div class="row justify-content-center pb-5">
      <div class="col-12 col-md-4 mb-4 mb-md-0 text-center align-self-center">
        <img src="{{ asset('img/lg-grau-tecnico-branca.svg') }}" alt="">
      </div>
    </div>
  </div>
</footer>

<script src="{{ asset('js/manifest.js') }}"></script>
<script src="{{ asset('js/vendor.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>

@yield('js')
</body>
</html>