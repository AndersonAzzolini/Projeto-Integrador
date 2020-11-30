<div style="height: 75vh; background-color: #E1DFD4; ">
    <div class="container">
        <?php
        foreach ($sobre as $s) {
        ?>
            <div class="row wordbreak m-0" style=" height: 75vh; padding: inherit; ">
                <div class="col-md-6 col-xs-12 align-self-center text-center" data-aos="flip-left" data-aos-duration="2500">
                    <h1 class="mb-4" style="padding: inherit;">Quem é Silvane Perassoli?</h1>
                    <span id="sobreAdmin"><?= $s->descricao ?></span>
                </div>
                <div class="col d-none d-md-block d-xl-block align-self-center text-center" data-aos="flip-right" data-aos-duration="3000">
                    <img src="public/uploads/<?= $s->nome ?>" class="img-fluid" alt="">
                </div>
            </div>
        <?php
        };
        ?>
    </div>
</div>
<div class="my-3 " style="background-color: #E6E3E1;">
    <div class="container">
        <div class="col text-center ">
            <h1 id="h1-categorias" >As mais diversas categorias</h1>
        </div>
    </div>
</div>

<div style=" background-color: #E6E3E1;">
    <div class="container ">
        <div class="carousel-inner">
            <div class="carrousel">
                <?php
                foreach ($cards as $c) {
                ?>
                    <div class="mt-5 ">
                        <div class="card mx-3 mb-5 col-xs-12" >
                            <a href='<?= base_url("categorias/$c->nome") ?>'></a>
                            <img class="img-fluid" src="public/uploads/<?= $c->arquivo ?>" alt="Imagem Categoria" style="height:300px;">
                            <div class="card-body text-center">
                                <h5 class="card-title"><?= $c->titulo ?></h5>
                                <p class="card-text" style="height: 60px;"><?= $c->descricao ?></p>
                                <a href='<?= base_url("categorias/$c->nome") ?>' class="btn btn-primary text-center">Veja Mais!</a>
                            </div>
                        </div>
                    </div>
                <?php
                };
                ?>
            </div>
            <a class="carousel-control-next btn"><img src="public/icons/divisa-direita.png" id="btn-next-slide"></a>
            <a class="carousel-control-prev btn"><img src="public/icons/divisa-esquerda.png" id="btn-previus-slide"></a>
        </div>
    </div>
</div>