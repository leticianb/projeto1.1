<?php

require_once '../../../new/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

include('../../conexao/conn.php');
session_start();
 

$sql = "SELECT * FROM disciplina WHERE id_alunos=".$_SESSION['id']."";
 

$resultado = mysqli_query($conecta, $sql);
 

if($resultado && mysqli_num_rows($resultado)>0){
    

while($print = mysqli_fetch_array($resultado)){
    $dompdf->loadHtml('<p>'.$print['nome'].'-'.$print['professor'].'-'.$print['nota'].'<p>'
    );
}
}else{
$dados = array('erro' => 'Não foi possível buscar resultados');
}
 
//echo json_encode($dados);

//$dompdf->loadHtml('
//<h1>Ola Mundo</h1>
  //  <p>Meu PDF Meu PDF Meu PDF Meu PDF </p>
    //<p>Meu PDF Meu PDF Meu PDF Meu PDF</p>
    //<p>Meu PDF Meu PDF Meu PDF Meu PDF</p>
//');

$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

$dompdf->stream("boletim.pdf", array(true));



