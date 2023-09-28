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
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <table border="1">
        <tr>
            <td>Código</td>
            <td>nome</td>
            <td>Sexo</td>
            <td>E-mail</td>
            <td>Telefone</td>
            <td>Estado</td>
            <td>Profissão</td>
            <td>Mensagem</td>
            <td>Opções</td>
        </tr>
        <?php while($dado= $sql_query->fetch_array()){ ?>
        <tr>
            <td><?=$dado['id']?></td>
            <td><?=$dado['nome']?></td>
            <td><?=$dado['sexo']?></td>
            <td><?=$dado['email']?></td>
            <td><?=$dado['telefone']?></td>
            <td><?=$dado['estados']?></td>
            <td><?=$dado['profissao']?></td>
            <td><?=$dado['mensagem']?></td>
            <td><a href="editar.php?codigo=<?php echo $dado['id']; ?>">Editar</a> 
            <a href="excluir.php?codigo=<?php echo $dado['id']; ?>">Excluir</a> </td>
        </tr>
       
        <?php }?>
    </table> 
        

    </table>
</body>
</html>