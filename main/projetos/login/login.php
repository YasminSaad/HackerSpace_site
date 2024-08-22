<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link rel="icon" href="#">
    <title>Login</title>
</head>
<body>
    <form action="dados.php" method="post" class="LoginForm">
        <h2 class="LoginTitulo">Inscrição</h2>

        <label class="legenda_input">Nome completo</label>
        <input type="text" id="nome_aluno" name="nome_aluno" placeholder="Nome" required />

        <label class="legenda_input">Número USP</label>
        <input type="int" id="nusp" name="nusp" placeholder="NUSP" maxlength="8" required />

        <label class="legenda_input">Email</label>
        <input type="text" id="email" name="email" placeholder="Email" required />

        <button class="BtnEnviar" type="submit">ENVIAR</button>
    </form>
</body>
</html> 