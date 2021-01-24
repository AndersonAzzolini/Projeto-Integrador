<!doctype html>
<html lang="pt">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?= base_url('public/css/bootstrap.min.css') ?>">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.min.css">
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <link rel="stylesheet" href="<?= base_url('public/css/main.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('public/css/style.css') ?>">




  <title>Hello, world!</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="<?= base_url("admin/home") ?>"><b>**LOGO**</b></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
        <a class="nav-link" href="<?= base_url('admin/funcionarios/log') ?>">Logs do Sistema</a>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Cardapio</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="<?= base_url('admin/cardapio') ?>">Consultar</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?= base_url('admin/funcionarios/cadastro_funcionario') ?>">Cadastrar</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Funcionários</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="<?= base_url('admin/funcionarios/consulta_funcionario') ?>">Consultar</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?= base_url('admin/funcionarios/cadastro_funcionario') ?>">Cadastrar</a>
            </div>
          </li>
          <a class="nav-link" href="<?= base_url('admin/login/logout') ?>">sair</a>
        </div>
      </div>
    </div>
  </nav>