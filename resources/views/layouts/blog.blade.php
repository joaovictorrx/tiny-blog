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
  <nav class="navbar navbar-expand-sm navbar-light bg-light shadow">
    <div class="container">
      <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('blog.home') }}">Tiny <strong>Blog</strong> 🤘</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">Login</a>
        </li>
      </ul>
    </div>
  </nav>

  @yield('content')
 
  
<footer class="py-5 bg-primary">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h4>João Victor Xavier</h4>
        <h5>Desenvolvedor</h5>
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