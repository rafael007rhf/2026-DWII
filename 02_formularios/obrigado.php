<?php
/**
 * ════════════════════════════════════════════════════════════
 * ARQUIVO    : 02_formularios/obrigado.php
 * Disciplina : Desenvolvimento Web II (2026-DWII)
 * Aula       : 04 — PHP para Web: formulários, métodos GET e POST
 * Autor      : Murilo Néfi de Faria
 * Conceitos  : PRG, $_GET, htmlspecialchars()
 * ════════════════════════════════════════════════════════════
 */

$nome = 'Murilo Néfi de Faria';
$pagina_atual = 'contato';
$titulo_pagina = 'Obrigado – ' . $nome;
$caminho_raiz = '../';

$nome_visitante = trim($_GET['nome'] ?? 'Visitante');
$assunto = trim($_GET['assunto'] ?? 'Não informado');

if ($nome_visitante === '') {
    $nome_visitante = 'Visitante';
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include '../includes/cabecalho.php'; ?>
</head>
<body>
    <div class="confirmacao">
        <h1>Obrigado, <?php echo htmlspecialchars($nome_visitante); ?>!</h1>
        <p>Sua mensagem foi recebida com sucesso.</p>
        <p><strong>Assunto:</strong> <?php echo htmlspecialchars($assunto); ?></p>
        <p><a href="contato.php" class="btn">Enviar outra mensagem</a></p>
    </div>

    <?php include '../includes/rodape.php'; ?>
</body>
</html>
