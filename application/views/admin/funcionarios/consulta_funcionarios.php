<div class="container mt-2">
    <table class="display compact dataTable text-center">
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
                    <td>
                        <a data-target="#modal-permissao-usuarios" class="btn-permissoes-user" href="#"><i data-toggle="tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Permissões" class="fas fa-user-lock" style="color: black;"></i></a>
                        <a data-target="#modal-edita-usuarios" class="btn-edita-user" href="#"><i data-toggle="tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar usúario" class="fas fa-user-edit" style="color: green;"></i></a>

                    </td>
                    <td><?= $s->id ?></td>
                </tr>
            <?php
            };
            ?>
    </table>

    <div class="modal fade" id="modal-permissao-usuarios" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="col-xs-12 ">
                        <h3 class="text-center">Permissões</h3>
                        <div>
                            <form name="form-permissoes" id="form-permissoes" method="post">
                                <div class="col">
                                    <input type="text" hidden>
                                    <label for="selectPermissaoCadastro" class="col-form-label col-form-label-sm">Cadastrar Funcionário</label>
                                    <select id="selectPermissaoCadastro" class="form-control">
                                        <option id="primeiroOptionCadastro" name="primeiroOptionCadastro" value="" selected></option>
                                        <option id="segundoOptionCadastro" name="segundoOptionCadastro" value=""></option>
                                    </select>
                                    <label for="selectPermissaoRefeicao" class="col-form-label col-form-label-sm">Cadastrar Refeição</label>
                                    <select id="selectPermissaoRefeicao" class="form-control">
                                        <option id="primeiroOptionRefeicao" name="primeiroOptionRefeicao" value="" selected></option>
                                        <option id="segundoOptionRefeicao" name="segundoOptionRefeicao" value=""></option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="btnFechaModalPermissoes" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary col-xs-12" id="btnAtualzaPermissao">Atualizar Permissões</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-edita-usuarios" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center">
                        <h4>informações do usúario</h4>
                    </div>
                    <div class="col-xs-12 ">
                        <form name="form-update-usuario" id="form-update-usuario">
                            <div>
                                <label for="nomeFuncionario" class="col-form-label col-form-label-sm">Nome</label>
                                <input type="text" id="nomeFuncionario" name="nomeFuncionario" class="form-control form-control-sm" placeholder="Digite o Nome">
                                <label for="sobrenomeFuncionario" class="col-form-label col-form-label-sm">Sobrenome</label>
                                <input type="text" id="sobrenomeFuncionario" name="sobrenomeFuncionario" class="form-control form-control-sm" placeholder="Digite o Sobrenome">
                                <label for="emailFuncionario" class="col-form-label col-form-label-sm">Email</label>
                                <input type="email" id="emailFuncionario" name="emailFuncionario" class="form-control form-control-sm" placeholder="Digite o Email">
                                <label for="senhaFuncionario" class="col-form-label col-form-label-sm">Senha</label>
                                <input type="password" id="senhaFuncionario" name="senhaFuncionario" class="form-control form-control-sm" placeholder="Digite a Senha">
                                <input type="text" id="idFuncionario" name="idFuncionario" class="form-control form-control-sm" readonly hidden>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                <button type="button" class="btn btn-primary" id="btn-update-usuario">Adicionar</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>