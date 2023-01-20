<!DOCTYPE html>
<html lang="es-cl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('../css/style.css') }}">
    @yield('header')
    <title>Valor Uf</title>
</head>
<body>
    <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Uf</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      <div class="collapse navbar-collapsed d-flex justify-content-end" id="navbarColor02">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('datos') }}">Datos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('grafico') }}">Grafico</a>
          </li>
         </ul>
      </div>
  </div>
</nav>
@error('fecha')
<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
  <strong>Se necesita fecha</strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@enderror
@error('valor')
<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
  <strong>Se necesita valor</strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@enderror
@if(session('mensaje'))
<div class="alert alert-primary alert-dismissible fade show text-center" role="alert">
  <strong>{{session('mensaje')}}</strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
    </header>
    <section class= "container text-center">
      @yield('content')
    </section>
    <footer class= "text-center bg-success text-white">
      <section>
        <p>Page by A.O.L</p>
      </section>
    </footer>
    @yield('js')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

  </body>
</html>