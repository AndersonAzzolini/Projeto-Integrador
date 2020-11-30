<!doctype html>
<html lang="pt">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?= base_url('public/css/bootstrap.min.css')?>">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <link rel="stylesheet" href="<?= base_url('public/css/style.css')?>">


  <title>Hello, world!</title>

</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container">
      <a class="navbar-brand" href="<?= base_url() ?>"><b>**LOGO**</b></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
          <a class="nav-link" href="<?= base_url('produtos') ?>">Produtos</a>
          <b><a class="nav-link " href="<?= base_url('orcamento') ?>">Orçamento </a></b>
          <a class="nav-link" href="<?= base_url('sobre') ?>">Sobre</a>
          <a class="nav-link" href="<?= base_url('admin/login') ?>">Administração</a>
        </div>
      </div>
    </div>
  </nav>