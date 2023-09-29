<?php 
include('conexao.php');

$sql = "SELECT * FROM lista ";
$sql_query= $mysqli->query($sql) or die($mysqli->error);


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Central</title>
    <link rel="stylesheet" href="estilo.css">
    <link href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    </head>
<body id='tabela_body'>


    <section>
    <table id="tabela" border="1" >
    
    <thead >
        <tr>
            <th>Nome</th>
            <th>Sexo</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Estado</th>
            <th>Profissão</th>
            <th>Mensagem</th>           
        </tr>
    </thead>
    
    <tbody>
        <?php while($dado= $sql_query->fetch_array()){ ?>
        <tr>
            <td><?=$dado['nome']?></td>
            <td><?=$dado['sexo']?></td>
            <td><?=$dado['email']?></td>
            <td><?=$dado['telefone']?></td>
            <td><?=$dado['estados']?></td>
            <td><?=$dado['profissao']?></td>
            <td><?=$dado['mensagem']?></td>
        </tr>
       
        <?php }?>
    </tbody>
    </table>  
    </section>
    <script
    src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
    crossorigin="anonymous">
    </script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
    $(document).ready(function(){
        $('#tabela').DataTable({language: {
        url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json',
    },
        });
    });
    </script>

    
</body>
</html>