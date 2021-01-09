<?php
require 'class_db.php';

class CRUD extends DB
{

    public function create($table, $fields)
    {
        $campos = implode(',', array_keys($fields));
        $valores = implode("','", array_values($fields));
        mysqli_query($this->con, "INSERT INTO $table ($campos) VALUES ('$valores')");
        return mysqli_affected_rows($this->con);
    }

    public function read($table,$where=null){
        if(!empty($where)){
            $where = ' WHERE '.$where;
        }
        $query = mysqli_query($this->con,"SELECT * FROM $table $where");
        $result = [];
        while($row = mysqli_fetch_object($query)){
            $result[] = $row;
        }
        return $result;
    }


    public function update($table,$fields,$condicao){
        $set = [];
        foreach ($fields as $field=>$value){
            $set[] = $field.'="'.$value.'"';
        }
        $fields = implode(',',$set);
        $update = 'UPDATE ' . $table . ' SET ' . $fields . ' WHERE ' . $condicao;
        mysqli_query($this->con, $update);
        return mysqli_affected_rows($this->con);
    }
    public function delete($table, $condicao)
    {
        if (!empty($table)  && !empty($condicao)) {
            mysqli_query($this->con, "DELETE FROM $table WHERE $condicao ");
            return mysqli_affected_rows($this->con);
        }else{
            return false;
        }
    }
}
 

/*
$contato = [
    'nome' => 'Anderson',
    'email' => 'teste@teste.com.br'
];

$arrayUpdate =[
    'nome' => 'Jonatan',
    'email'=> 'teste@deuboa.com'
];



$crud = new CRUD();
$crud->update('contatos', $arrayUpdate,"id=4");
$cru->read('contatos', "nome='Anderson'");
$retorno = $crud->read('contatos');
foreach ($retorno as $item){
    echo $item->nome;
    echo $item->email;
}
$crud = new CRUD();
$crud->create('contatos', $contato);
$crud->disconnect();
$crud = new CRUD();

$crud->create('contatos', $contato);



//$insert = new CRUD();
//$insert->create('contatos', $contato);*/
