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
                                <label for="nomeRefeicao" class="col-form-label col-form-label-sm">Refeição</label>
                                <input type="text" id="nomeRefeicao" name="nomeRefeicao" class="form-control form-control-sm" placeholder="Digite o Nome">
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

</div>