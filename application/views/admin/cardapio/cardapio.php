<div class="container mt-2">
    <button type="button" id="btnCadastraRefeicao" class="mb-2 btn btn-primary">Cadastrar Refeição</button>
    <div class="p-3" id="calendar" style="background-color: white;">
    </div>
    <div class="modal fade" id="modalCadastroCardapio" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="col-xs-12 ">
                        <form name="form-refeicao" id="form-refeicao">
                            <div>
                                <label for="nomeRefeicao" class="col-form-label col-form-label-sm">Nome da Refeição</label>
                                <input type="text" id="nomeRefeicao" name="nomeRefeicao" class="form-control form-control-sm" placeholder="Digite o Nome">
                                <label for="dataInicio" class="col-form-label col-form-label-sm">Data Incial</label>
                                <input type="datetime-local" id="dataInicio" name="dataInicio" class="form-control form-control-sm" placeholder="Digite o Nome">
                                <label for="dataFinal" class="col-form-label col-form-label-sm">Data Final</label>
                                <input type="datetime-local" id="dataFinal" name="dataFinal" class="form-control form-control-sm" placeholder="Digite o Nome">
                                <label for="cardapio" class="col-form-label col-form-label-sm">Cardapio</label><br>
                                <textarea class="form-control form-control-sm" rows="9" id="cardapio" name="cardapio" placeholder="Digite todo o Cardapio"></textarea>
                                <label for="cardapio" class="col-form-label col-form-label-sm">Escolha a cor do Evento</label><br>
                                <input type="color" id="color" name="color" >

                            </div>
                        </form>
                        <div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" id="btnEnviaRefeição">Adicionar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEventos" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="col-xs-12 ">
                        <form name="form-edita-refeicao" id="form-edita-refeicao">
                            <div>
                                <label for="tituloEvento" class="col-form-label col-form-label-sm">Título da refeição</label>
                                <input type="text" id="tituloEvento" name="tituloEvento" class="form-control form-control-sm" placeholder="Digite o título">
                                <label for="inicioEvento" class="col-form-label col-form-label-sm">Data e horario de inicio</label>
                                <input type="datetime-local" id="inicioEvento" name="inicioEvento" class="form-control form-control-sm" placeholder="Digite o Nome">
                                <label for="fimEvento" class="col-form-label col-form-label-sm">Data e horario de término</label>
                                <input type="datetime-local" id="fimEvento" name="fimEvento" class="form-control form-control-sm" placeholder="Digite o Nome">
                                <label for="idEvento" class="col-form-label col-form-label-sm">ID</label>
                                <input type="text" readonly id="idEvento" name="idEvento" class="form-control form-control-sm" placeholder="">
                                <label for="cardapioRefeicao" class="col-form-label col-form-label-sm">Cardapio</label><br>
                                <textarea class="form-control form-control-sm" rows="9" id="cardapioRefeicao" name="cardapioRefeicao" placeholder="Digite todo o Cardapio"></textarea>
                                <br>
                                <label for="favcolor">Selecionar cor do evento</label>
                                <input type="color" id="favcolor" name="favcolor" >
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button class="btn btn-primary" id="btnEditaRefeicao">Salvar Alterações</button>
                </div>
            </div>
        </div>
    </div>
</div>