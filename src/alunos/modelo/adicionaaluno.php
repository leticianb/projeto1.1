<?php
 
 
include('../../conexao/conn.php');
 
$nome = $_REQUEST['nome'];
$curso = $_REQUEST['curso'];
$tipo = $_REQUEST['tipo'];
 
 
if(strlen($nome) == 0 || strlen($curso) == 0){
$dados = array(
'tipo' => 'alert-warning',
'mensagem' => 'Por favor preencha todo o formulário!'
);
}else{

$sql = "INSERT INTO alunos (nome, curso, tipo) VALUES ('".$nome."', '".$curso."', ".$tipo.")";

if(mysqli_query($conecta, $sql)){
$dados = array(
'tipo' => 'alert-success',
'mensagem' => 'O aluno '.$nome.', foi salvo com sucesso!'
);
}else{
$dados = array(
'tipo' => 'alert-danger',
'mensagem' => 'Deu ruim....'.mysqli_error($conecta)
);
}
}
 
echo json_encode($dados);