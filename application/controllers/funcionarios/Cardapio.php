<?php

class Cardapio extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('funcionarios/Cardapio_model');
        $this->load->model('funcionarios/Funcionario_model');

    }
    public function index()
    {
        $this->load->view('funcionario/includes/header');
        $this->load->view('funcionario/cardapio/cardapio');
        $this->load->view('funcionario/includes/footer');
    }

    public function list_refeicao()

    {
        $buscaIdEmpresa = $this->Funcionario_model->buscaIdEmpresa($this->session->userdata('id'));
        foreach($buscaIdEmpresa as $rowID){
            $id =  $rowID->id_empresa;
        }
        $buscaBanco  = $this->Cardapio_model->get_cardapio($id);
        foreach ($buscaBanco as $row) {
            $start = $row->start;
            $end = $row->end;
            $color = $row->color;
            $title = $row->title;
            $id = $row->id;
            $teste[] = [
                'title' => $title,
                'start' => $start,
                'end' => $end,
                'color' => $color,
                'id' => $id
            ];
        }
        echo json_encode($teste);
    }
    public function buscaData()
    {
        if ($_POST) {
            extract($_POST);
            $dataIncialFormatada = $this->formataData($inicioEvento);
            $dataFinalFormatada = $this->formataData($fimEvento);
            if ($dataIncialFormatada > $dataFinalFormatada) {
                $retorno = array(
                    'result' => 'dateFalse'
                );
            } else if ($dataIncialFormatada == $dataFinalFormatada) {
                $retorno = false;
            } else {
                $update = array(
                    'start'     => $inicioEvento,
                    'end'       => $fimEvento,
                    'title'     => $tituloEvento,
                    'descricao' => $cardapioRefeicao,
                    'color'     => $favcolor
                );
                $enviaUpdate = $this->Cardapio_model->updateCardapio($idEvento, $update);
                if ($enviaUpdate > 0) {
                    $retorno = true;
                } else {
                    $retorno = 'updateFalse';
                }
            }
            echo json_encode($retorno);
        }
    }

    public function consultaData()
    {
        if ($_POST) {
            extract($_POST);
            $Datas = $this->Cardapio_model->get_datas($id);
            foreach ($Datas as $row) {
                $start = $row->start;
                $end = $row->end;
                $descricao = $row->descricao;
                $retorno = array(
                    'start'     => $start,
                    'end'       => $end,
                    'descricao' => $descricao
                );
            }
            echo json_encode($retorno);
        }
    }

    public function formataData($data)
    {
        $dataFormatada = date("Y-m-d H:i:s", strtotime($data));
        $dataFormatada = (str_replace("-", "", $dataFormatada));
        $dataFormatada = (str_replace(":", "", $dataFormatada));
        $dataFormatada = (str_replace("T", "", $dataFormatada));
        $dataFormatada = (str_replace(" ", "", $dataFormatada));
        return $dataFormatada;
    }
}
