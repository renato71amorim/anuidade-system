<?php
if (php_sapi_name() !== 'cli' && empty($_SERVER['HTTP_REFERER'])) {
    header("HTTP/1.0 403 Forbidden");
    exit("Acesso direto não permitido.");
}
// Configurações de acesso ao banco de dados
$host = 'localhost';         // ou IP do servidor
$dbname = 'nome_do_banco';   // substitua pelo nome real do banco
$user = 'usuario';           // substitua pelo usuário do banco
$pass = 'senha';             // substitua pela senha do banco

try {
    // Cria a conexão PDO com charset UTF-8
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);

    // Define o modo de erro para exceções
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Opcional: define o modo de busca padrão como associativo
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
} catch (PDOException $e) {
    // Em caso de erro, encerra o script com mensagem segura
    die("Erro ao conectar ao banco de dados.");
}
?>
