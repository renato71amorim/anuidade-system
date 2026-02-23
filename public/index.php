<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Anuidade</title>
    <link rel="stylesheet" href="assets/style.css"> <!-- opcional -->
</head>
<body>
    <h1>Formulário de Anuidade</h1>
    <form action="../src/processa_formulario.php" method="POST">
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="cpf_cnpj">CPF ou CNPJ:</label><br>
        <input type="text" id="cpf_cnpj" name="cpf_cnpj" pattern="[0-9]{11,14}" required><br><br>

        <label for="email">E-mail:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="telefone">Telefone (formato +5511999999999):</label><br>
        <input type="text" id="telefone" name="telefone" pattern="^\+[0-9]{1,3}[0-9]{4,14}$" required><br><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>
