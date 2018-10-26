<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Michael Cezar">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href='/images/favicon.png' rel='shortcut icon' />
    <title>SAC | @yield('pageTitle')</title>
    <link href="/css/bootstrap.css"                   rel="stylesheet" type="text/css">
    <link href="/js/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="/css/custom.css"                      rel="stylesheet" type="text/css">
    @yield('extraCSS')
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark" id="mainNavBar">
      <a class="navbar-brand" href="#">SAC </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item" id='inicio'>
            <a class="nav-link" href="../../"><i class="fas fa-home fa-fw"></i> Início </a>
          </li>
          <li class="nav-item dropdown" id='clientes'>
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user-tie fa-fw"></i>  Cliente
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="../../cliente/novo"><i class="fas fa-user-plus fa-fw"></i>  Novo</a>
              <a class="dropdown-item" href="../../cliente/listar"><i class="far fa-list-alt fa-fw"></i>  Listar</a>
            </div>
          </li>
          <li class="nav-item dropdown" id='pedidos'>
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-cart-arrow-down fa-fw"></i>  Pedido
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="../../pedido/novo"><i class="fas fa-cart-plus fa-fw"></i>  Novo</a>
              <a class="dropdown-item" href="../../pedido/listar"><i class="far fa-list-alt fa-fw"></i>  Listar</a>
            </div>
          </li>
          <li class="nav-item dropdown" id='chamados'>
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-headset fa-fw"></i>  Chamado
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="../../chamado/novo"><i class="fas fa-plus-circle fa-fw"></i>  Novo</a>
              <a class="dropdown-item" href="../../chamado/relatorio"><i class="fas fa-file-invoice fa-fw"></i>  Relatório</a>
              <a class="dropdown-item" href="../../chamado/listar"><i class="far fa-list-alt fa-fw"></i>  Listar</a>
            </div>
          </li>

        </ul>
      </div>
    </nav>
    <main role="main" class="container-fluid">
      <div class='container-fluid'>
        <div class="content">
          <div id="areaModal"></div>
          @yield('pageContent')
        </div>
      </div>
    </main>
    <br/>
    <footer class="footer d-print-none">
      <div class="container text-center">
        <span class="text-muted">Michael Cezar - 2018</span>
      </div>
    </footer>
    <script src="/js/jquery.min.js"                          type="text/javascript"></script>
    <script src="/js/popper.min.js"                          type="text/javascript"></script>
    <script src="/js/bootstrap.js"                           type="text/javascript"></script>
    <script src="/js/fontawesome-free/js/fontawesome.min.js" type="text/javascript"></script>
    <script src="/js/bootstrap-notify.min.js"                type="text/javascript"></script>
    <script src="/js/validator.js"                           type="text/javascript"></script>
    <script src="/js/custom.js"                              type="text/javascript"></script>
    @yield('extraJavaScript')
  </body>
</html>