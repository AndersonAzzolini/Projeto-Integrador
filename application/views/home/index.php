<div style="height: 100vh; background-color: red;">
    <div class="container ">
        <div class="row">
            <div class="col-md-6 text-center" style="height: 100vh;">
                <h1>teste </h1>
            </div>
            <div class="col-md-6 text-center " style="height: 100vh;">
                <h1>teste </h1>
            </div>
        </div>
    </div>
</div>


<!--<div style="height: 100vh; background-color: red; ">
    <div class="container">
        <?php
        foreach ($sobre as $s) {
        ?>
            <div class="row wordbreak m-0" style="padding: inherit;">
                <div class="col-md-6 col-xs-12  m-auto text-center">
                    <h1 class="mb-4" style="padding: inherit;">Quem é Silvane Perassoli?</h1>
                    <span id="sobreAdmin"><?= $s->descricao ?></span>
                </div>
                <div class="col-md-6 col-xs-12 text-center">
                    <img src="public/uploads/<?= $s->nome ?>" class=" img-fluid" alt="">
                </div>
            </div>
        <?php
        };
        ?>
    </div>
</div>
<div class="container">
    <div class="col text-center ">
        <h1 class="font-weight-normal">Conheça nossa linha de produção</h1>
    </div>
</div>
<div class="row " style="height: 100vh; margin: auto;">
    <div class="carrousel w-100 ">
        <?php
        foreach ($cards as $c) {
        ?>
            <div class="col my-2 rounded" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                <div class="card">
                    <a href="#"> <img src="public/uploads/<?= $c->arquivo ?>" class="card-img-top img-fluid slide" alt="" style="height: 450px"> </a>
                    <div class="card-body p-0 my-2">
                        <h5 class="card-title text-center"><?= $c->titulo ?></h5>
                    </div>
                </div>
            </div>

        <?php
        };
        ?>

    </div>
</div>
<div class="container">
    <div class="row mt-3 buttons-carrousel">

        <div class="col-6 text-center">
            <img src="public/icons/iconfinder_arrow-left-01_186410.svg" class="float-right image-fluid mr-4 btn" alt="Slide anterior" id="previus-carrousel-categorias">
        </div>
        <div class="col-6 text-center">
            <img src="public/icons/iconfinder_arrow-right-01_186409.svg" alt="Próximo Slide" class="float-left image-fluid ml-4 btn" id="next-carrousel-categorias">
        </div>

    </div>
</div>-->