<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modelo de formulario</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>formulario</h1>
    <h2>Um formulario simples</h2>
    <section>
        <form action="index.php" method="post">

            <label for="nome">Nome completo:</label>
            <input type="text" name="nome" value="" placeholder="Seu nome">

            <fieldset> <legend>Sexo:</legend>
            <input type="radio" id="feminino" name="sexo" value="Feminino">
            <label for="feminino">Feminino</label>
            <input type="radio" id=indefinido name="sexo" value="Indefinido" checked>
            <label for="indefinido">Indefinido</label>
            <label for="masculino">Masculino</label>
            <input type="radio" id="masculino" name="sexo" value="Masculino">
            </fieldset>

            <label for="email">E-mail:</label>
            <input type="email" name="nome" value="" placeholder="EX: SeuNome@gmail.com">

            <label for="telefone">Telefone:</label>
            <input type="tel" name="telefone" value="" placeholder="(99) 99999-9999">

            <label for="estados">Estado:</label>
            <select name="estados">
                <option value=""></option>
                <option value="RN">RN</option>
                <option value="RS">RS</option>
                <option value="RJ">RJ</option>
                <option value="SP">SP</option>
            </select> <br>
            
            <label for="prof">Profissão:</label>
            <input type="text" name="prof" id="input-prof" list="listprof" placeholder="Dev PHP">
            <datalist id="listprof">
                <option>Dev</option>
                <option>Vendedor</option>
                <option>Gerente</option>
                <option>Suporte técnico</option>
            </datalist><br>

            <label for="mensagem">Mensagem:</label>
            <textarea name="mensagem" id="principal" cols="30" rows="10"></textarea>

            
        <input type="submit" value="Enviar formulário">
    </form>
    </section>
</body>
</html>