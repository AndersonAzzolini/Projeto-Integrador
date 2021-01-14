<div class="container mt-2">
    <table class="display dataTable text-center">
        <thead>
            <tr>
                <th>Funcionario</th>
                <th>Situação</th>
                <th>Açoes</th>
                <th>Id</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($funcionario as $s) {
            ?>
                <tr>
                    <td><?= $s->nome ?></td>
                    <td>
                        <?php
                        $situação = $s->usuario_ativo;
                        $id = $s->id;
                        if ($situação > 0) {
                            echo  "<input class='form-check-input' checked  type='checkbox' value='' >";
                            echo  "<label class='form-check-label' id='$id'>Ativo";
                        } else {
                            echo  "<input class='form-check-input'  type='checkbox' value='' >";
                            echo  "<label class='form-check-label' id='$id'>Desativado";
                        }
                        ?>
                    </td>
                    <td></td>
                    <td><?= $s->id ?></td>
                </tr>
            <?php
            };
            ?>
    </table>
</div>