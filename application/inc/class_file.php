<?php
class files
{
    private $dir = 'uploads/img';
    public function __construct()
    {
        if (!is_dir($this->dir)) {
            mkdir($this->dir);
        }
    }
    public function createDir($dir){
        if(!is_dir($dir)){
            mkdir($dir);
        }
    }

    public function setDir($dir){
        $this->dir = $dir;
        $this->createDir($dir);
    }
    public function upload($arquivo)
    {
        $nomeArquivo = md5(time()) . '.' . pathinfo($arquivo['name'], PATHINFO_EXTENSION);
        if(move_uploaded_file($arquivo['tmp_name'], $this->dir . '/' . $nomeArquivo)){
            return $nomeArquivo;
        }else{
            return false;
        }
    }
    public function delete()
    {
    }
}


/*if (isset($_FILES)) {
    extract($_POST);
    $arquivo =  $_FILES['arquivo'];
    if (!empty($arquivo)) {
        $nomeArquivo = md5($arquivo['name'] . date('YmdHis')) . '.' . pathinfo($arquivo['name'], PATHINFO_EXTENSION);
        $caminho = '../public/uploads/' . $nomeArquivo;
        $arquivoDB = $arquivo_auxiliar;
        if (!empty($nomeArquivo)) {
            if (move_uploaded_file($arquivo['tmp_name'], '../public/uploads/' . $nomeArquivo)) {
                unlink('public/uploads/' . $arquivo_auxiliar);
                $arquivoDB = $nomeArquivo;
                if (file_exists($caminho)) {
                    $query = mysqli_query($link, "UPDATE cadastro_funcionario SET arquivo ='$arquivoDB' WHERE id =$idFuncionario");
                    if (mysqli_affected_rows($link) > 0) {
                        $retornoEditaFoto = array(
                            'result' => true,
                            'mensagem' => "Imagem alterada com sucesso",
                            'caminho' => "$arquivoDB"
                        );
                    } else {
                        $retornoEditaFoto = array(
                            'result' => false,
                            'mensagem' => "Erro ao enviar imagem",
                        );
                    }
                }
            } else {
                $retornoEditaFoto = array(
                    'result' => 'erroImage',
                    'mensagem' => 'Nenhum arquivo selecionado'
                );
            }
        }
    }
}*/