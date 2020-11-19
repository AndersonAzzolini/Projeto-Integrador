<!doctype html>
<html lang="pt">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="../public/css/stylelogin.css">


    <title>Hello, world!</title>
</head>

<body class="text-center ">
    <div id="fundoLogin">
    <?php echo validation_errors(); ?>
    <?= !empty($this->session->userdata('mensagem')) ? $this->session->userdata('mensagem') : null; ?>
        <form method="post" action="<?= base_url('admin/login/action') ?>"  class=" form-signin " id="form-login" >
            <img src="public/icons/icon-login.png" alt="" srcset="">
            <div class="form-group">
                <label for="loginEmail" class="sr-only">Email address</label>
                <input type="email" id="loginEmail" class="form-control" name="loginEmail" placeholder="Email" required autofocus>
            </div>
            <div class="form-group">
                <label for="loginSenha" class="sr-only">Senha</label>
                <input type="password" id="loginSenha" class="form-control" name="loginSenha" placeholder="Senha" required>
            </div>
            <button class="btn btn-lg btn-primary mt-2" type="submit">Entrar</button>
            <a href="<?= base_url('/home') ?>" class="btn btn-primary btn-lg">Inicio</a>
        </form>
    </div>
</body>

</html>

<!--<h2>Realize o login</h2>
    <?php echo validation_errors(); ?>
    <?= !empty($this->session->userdata('mensagem')) ? $this->session->userdata('mensagem') : null; ?>
    <form method="post" action="<?= base_url('login/action') ?>">
        E-mail:<input type="email" name="email"><br>
        Senha:<input type="password" name="senha"><br>
        <input type="submit" value="Entrar">
    </form>-->