<div style="height: 100vh; background-color: #f8f8f8; ">
    <div class="container">
        <a href="sobre/editSobre" class="btn btn-primary mt-3">Editar Sobre</a>

        <?php
        foreach ($sobre as $s) {
        ?>
            <div class="row wordbreak m-0" style=" height: 100vh;">
                <div class="col-md-6 col-xs-12 align-self-center text-center" data-aos="flip-left" data-aos-duration="2500">
                    <h1 class="mb-4" style="padding: inherit;">Quem é Silvane Perassoli?</h1>
                    <span id="sobreAdmin"><?= $s->descricao ?></span>
                </div>
                <div class="col align-self-center text-center" data-aos="flip-right" data-aos-duration="3000">
                    <img src="../public/uploads/<?= $s->nome ?>" class=" img-fluid" alt="">
                </div>
            </div>
        <?php
        };
        ?>
    </div>
</div>