<?php 
include('conexao.php');

switch (isset($_POST['nome']) || isset($_POST['sexo']) || isset($_POST['email']) 
|| isset($_POST['telefone']) || isset($_POST['estados']) || isset($_POST['prof']) 
|| isset($_POST['mensagem'])) {
  
    case (strlen($_POST['nome'])== 0):
        echo alerta('Escreva seu nome...');
        break;

    case (strlen($_POST['email']) == 0):
        echo alerta("Escreva seu E-mail...");
        break;

    case (strlen($_POST['prof']) ==0):
        alerta("Escreva sua profissão...");
        break;

    case (strlen($_POST['mensagem']) ==0):
        alerta("Escreva sua mensagme...");
        break;

    default:
        # code...
        $nome = $mysqli->real_escape_string($_POST['nome']);
        $sexo = $mysqli->real_escape_string($_POST['sexo']);
        $email = $mysqli->real_escape_string($_POST['email']);
        $telefone = $mysqli->real_escape_string($_POST['telefone']);
        $estados = $mysqli->real_escape_string($_POST['estados']);
        $prof = $mysqli->real_escape_string($_POST['prof']);
        $mensagem = $mysqli->real_escape_string($_POST['mensagem']);


       $sql_insert= "INSERT INTO  lista (nome, sexo, email, telefone, estados, profissao, mensagem) 
       VALUES ('$nome','$sexo','$email','$telefone','$estados', '$prof', '$mensagem')";

        $sql_query = $mysqli->query($sql_insert) or die("Falha ao cadastrar:" . $mysqli->error);

        echo alerta("Enviado com sucesso!");


       
        break;



}


function alerta($msg){
    echo '<script type="text/javascript">alert("'. $msg .'" )</script>';
}



?>
