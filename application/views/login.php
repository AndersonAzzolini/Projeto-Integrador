<!doctype html>
<html lang="pt">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="public/css/stylelogin.css">


    <title>Hello, world!</title>
</head>

<body class="text-center ">
    <div id="fundoLogin">
        <form class=" form-signin">
            <img src="public/icons/icon-login.png" alt="" srcset="">
            <div class="form-group">
                <label for="inputEmail" class="sr-only">Email address</label>
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
            </div>
            <div class="form-group">
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
            </div>
            <button class="btn btn-lg btn-primary mt-2" type="submit">Sign in</button>
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