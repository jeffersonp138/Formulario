<?php
include('conexao.php');

// Função para exibir mensagens de alerta
function alerta($msg) {
    echo '<script type="text/javascript">',
         'document.getElementById("mensagemErro").style.display = "block";',
         'document.getElementById("mensagemErro").innerText = "', htmlspecialchars($msg, ENT_QUOTES, 'UTF-8'), '";',
         'document.getElementById("mensagemErro").scrollIntoView({ behavior: "smooth" });',
         '</script>';
}

// Função para validar campos
function validarCampo($campo, $mensagem) {
    return empty(trim($campo)) ? $mensagem : null;
}

// Função para validar e-mails
function validarEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) ? null : 'E-mail inválido...';
}

// Função para validar telefone 
function validarTelefone($telefone) {
    return preg_match("/^\(\d{2}\) \d{5}-\d{4}$/", $telefone) ? null : 'Telefone inválido...';
}

// Função para validar estado
function validarEstado($estado) {
    $estadosPermitidos = ['RN', 'RS', 'RJ', 'SP'];
    return in_array($estado, $estadosPermitidos) ? null : 'Estado inválido...';
}

// Validação dos campos
$erro = validarCampo($_POST['nome'], 'Escreva seu nome...')
     ?? validarEmail($_POST['email'])
     ?? validarCampo($_POST['prof'], 'Escreva sua profissão...')
     ?? validarCampo($_POST['mensagem'], 'Escreva sua mensagem...')
     ?? (!isset($_POST['sexo']) ? 'Selecione seu sexo...' : null)
     ?? validarEstado($_POST['estados'])
     ?? (isset($_POST['telefone']) && validarTelefone($_POST['telefone']) ? 'Telefone inválido...' : null);

if ($erro) {
    alerta($erro);
    exit;
}

try {
    $stmt = $mysqli->prepare("INSERT INTO lista (nome, sexo, email, telefone, estados, profissao, mensagem) VALUES (?, ?, ?, ?, ?, ?, ?)");
    if ($stmt === false) {
        throw new Exception('Falha ao preparar a consulta: ' . $mysqli->error);
    }

    $nome = $mysqli->real_escape_string($_POST['nome']);
    $sexo = $mysqli->real_escape_string($_POST['sexo']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $telefone = isset($_POST['telefone']) ? $mysqli->real_escape_string($_POST['telefone']) : null;
    $estados = $mysqli->real_escape_string($_POST['estados']);
    $prof = $mysqli->real_escape_string($_POST['prof']);
    $mensagem = $mysqli->real_escape_string($_POST['mensagem']);

    $stmt->bind_param("sssssss", $nome, $sexo, $email, $telefone, $estados, $prof, $mensagem);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        alerta("Enviado com sucesso!");
    } else {
        alerta("Falha ao enviar o formulário.");
    }

    $stmt->close();
} catch (Exception $e) {
    alerta('Erro: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8'));
}

$mysqli->close();
?>
