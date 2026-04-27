<?php
/**
 * ════════════════════════════════════════════════════════════
 * ARQUIVO    : 04_sessoes/publico.php
 * Autor      : Murilo Néfi de Faria
 * ════════════════════════════════════════════════════════════
 */

session_start();
require __DIR__ . '/includes/auth.php';

$nome = 'Murilo Néfi de Faria';
$pagina_atual = '';
$titulo_pagina = 'Área Pública – ' . $nome;
$caminho_raiz = '../';

$usuario = usuario_logado();
$esta_logado = $usuario !== '';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include '../includes/cabecalho.php'; ?>
</head>
<body>
    <div class="container" style="text-align:center;">
        <h1 class="titulo-secao">🌐 Área Pública</h1>
        <p>Esta página é acessível a qualquer visitante, sem necessidade de login.</p>

        <?php if ($esta_logado): ?>
            <p style="margin-top:18px;">
                Olá, <strong><?php echo htmlspecialchars($usuario); ?></strong>! Você está autenticado.
            </p>
            <p><a href="painel.php" class="btn">Ir para o Painel</a></p>
        <?php else: ?>
            <p style="margin-top:18px;">
                <a href="login.php" class="btn">Acessar Área Restrita</a>
            </p>
        <?php endif; ?>
    </div>
    <?php include '../includes/rodape.php'; ?>
</body>
</html>
