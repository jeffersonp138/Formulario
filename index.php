<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modelo de formulario</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>formulário</h1>
    <h2>Um formulário simples</h2>
    <section>
        <div id="mensagemErro" class="mensagem-erro" style="display:none;"></div>
        <form action="lista.php" method="post" id="form">
            <label for="nome">Nome completo:</label>
            <input type="text" name="nome" id="nome" placeholder="Seu nome" required>

            <div id="sexo">
            <input type="radio" id="feminino" name="sexo" value="Feminino">
            <label for="feminino" id="fieldset">Feminino </label><br>
            <input type="radio" id=indefinido name="sexo" value="Indefinido" checked>
            <label for="indefinido" id="fieldset">Indefinido</label><br>
            <input type="radio" id="masculino" name="sexo" value="Masculino">
            <label for="masculino" id="fieldset">Masculino</label><br>
            </div>

            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" placeholder="EX: SeuNome@gmail.com" required>

            <label for="telefone">Telefone:</label>
            <input type="tel" name="telefone" id="telefone" placeholder="(99) 99999-9999" pattern="\(\d{2}\) \d{5}-\d{4}">

            <label for="estados" id="id_estado">Estado:</label>
            <select name="estados" required>
                <option value="" disabled selected>Selecione seu estado</option>
                <option value="RN">RN</option>
                <option value="RS">RS</option>
                <option value="RJ">RJ</option>
                <option value="SP">SP</option>
            </select> <br>
            
            <label for="prof">Profissão:</label>
            <input type="text" name="prof" id="prof" list="listprof" placeholder="Dev PHP" required>
            <datalist id="listprof">
                <option>Dev</option>
                <option>Vendedor</option>
                <option>Gerente</option>
                <option>Suporte técnico</option>
            </datalist><br>

            <label for="mensagem">Mensagem:</label>
            <textarea name="mensagem" id="mensagem" cols="30" rows="10" required></textarea>

            
        <input type="submit" value="Enviar formulário">
    </form>
    </section>
    <script>
        function mostrarErro(mensagem) {
            var erroDiv = document.getElementById('mensagemErro');
            erroDiv.style.display = 'block';
            erroDiv.innerText = mensagem;
            erroDiv.scrollIntoView({ behavior: 'smooth' });
        }
    </script>
</body>
</html>