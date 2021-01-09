<div class="container">
    <div class="col text-center ">
        <h1 id="h1-categorias">Alteração de sobre</h1>
    </div>
    <form enctype="multipart/form-data" id="form-sobre" action="<?= base_url('admin/sobre/atualizar') ?>" method="POST">
        <div class="col m-auto">
            <div class="col-md-6 ">
                <?php
                foreach ($sobre as $s) {
                ?>
                    <div class="form-group">
                        <label for="sobre">Sobre</label>
                        <textarea rows="15" class="form-control" name="assunto_sobre" id="sobre"><?= $s->descricao ?></textarea>
                    </div>
                    <div class="col">
                        <div class="row">
                            <button type="submit" class="btn btn-primary mr-1">Atualizar</button>
                            <input type="file" name="arquivo"><br>
                            <?php
                            if (!empty($arquivo)) {
                                echo "<img src='" . base_url("public/uploads/{$arquivo}") . "' width='150'>";
                                echo "<input type='hidden' value='{$arquivo}' name='arquivo_aux'>";
                            }
                            ?>

                        </div>
                    </div>
            </div>
        <?php
                };
        ?>
        </div>
    </form>

</div>