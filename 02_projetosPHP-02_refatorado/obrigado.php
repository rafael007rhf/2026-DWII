<?php


if (session_status() === PHP_SESSION_NONE) session_start();


$titulo_pagina = 'Mensagem enviada | Portfólio DWII';
$caminho_raiz = './';

$nome_visitante = $_SESSION['contato_nome'] ?? null;

if ($nome_visitante === null) {
    header('Location: contato.php');
    exit;
}

unset($_SESSION['contato_nome']);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    
    <?php include __DIR__ . '/includes/cabecalho.php'; ?>
</head>
<body>
    <div class="container">

        <div class="alerta-sucesso">
            <h3>✅ Mensagem enviada com sucesso!</h3>
            <p>Obrigado, <strong><?php echo htmlspecialchars($nome_visitante); ?></strong>! 🎉</p>
            <p>Sua mensagem foi recebida. Retornarei em breve.</p>
        </div>

        
        <div style="margin-top: 20px; display: flex; gap: 12px;">
            <a href="index.php" class="btn-primario">🏠 Voltar ao Início</a>
            <a href="contato.php" class="btn-secundario">📩 Enviar outra mensagem</a>
</div>

</div>
<?php include __DIR__ . '/includes/rodape.php'; ?>
</body>
</html>