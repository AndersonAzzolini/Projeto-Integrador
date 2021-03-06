<?php

class Cardapio extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Cardapio_model');
    }
    public function index()
    {
        $this->load->view('admin/includes/header');
        $this->load->view('admin/cardapio/cardapio');
        $this->load->view('admin/includes/footer');
    }

    public function cadastro_refeicao()
    {
        if ($_POST) {
            extract($_POST);
            if (($nomeRefeicao == null) || ($cardapio  == null) || ($dataInicio  == null) || ($dataFinal  == null)) {
                $retorno = null;
            } else {
                $dataIncialFormatada = $this->formataData($dataInicio);
                $dataFinalFormatada = $this->formataData($dataFinal);
                if ($dataIncialFormatada > $dataFinalFormatada) {
                    $retorno = array(
                        'result' => 'dateFalse'
                    );
                } else if ($dataIncialFormatada == $dataFinalFormatada) {
                    $retorno = false;
                } else {
                    $insert = array(
                        'start'      => $dataInicio,
                        'end'        => $dataFinal,
                        'title'      => $nomeRefeicao,
                        'descricao'  => $cardapio,
                        'color'      => $color,
                        'id_empresa'=> $this->session->userdata('id')
                    );
                    $enviaInsert = $this->Cardapio_model->cadastraCardapio($insert);
                    if ($enviaInsert > 0) {
                        $retorno = true;
                    } else {
                        $retorno = 'insertFalse';
                    }
                }
            }
            echo json_encode($retorno);
        }
    }
    public function list_refeicao()

    {
        $buscaBanco  = $this->Cardapio_model->get_cardapio($this->session->userdata('id'));
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
