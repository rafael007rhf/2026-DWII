<?php
/**
 * ════════════════════════════════════════════════════════════
 * ARQUIVO    : 04_sessoes/perfil.php
 * Autor      : Murilo Néfi de Faria
 * ════════════════════════════════════════════════════════════
 */

session_start();
require __DIR__ . '/includes/auth.php';
requer_login();

$nome = 'Murilo Néfi de Faria';
$pagina_atual = '';
$titulo_pagina = 'Perfil – ' . $nome;
$caminho_raiz = '../';

$usuario = usuario_logado();
$horario_login = $_SESSION['horario_login'] ?? date('d/m/Y H:i:s');
$visitas = $_SESSION['visitas'] ?? 0;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include '../includes/cabecalho.php'; ?>
</head>
<body>
    <div class="container">
        <h1 class="titulo-secao">👤 Perfil do Usuário</h1>

        <table class="tabela-detalhe">
            <tr>
                <td>Usuário</td>
                <td><?php echo htmlspecialchars($usuario); ?></td>
            </tr>
            <tr>
                <td>Status</td>
                <td><strong style="color:#2e7d52;">Autenticado</strong></td>
            </tr>
            <tr>
                <td>Horário do login</td>
                <td><?php echo htmlspecialchars($horario_login); ?></td>
            </tr>
            <tr>
                <td>Visitas nesta sessão</td>
                <td><?php echo (int)$visitas; ?></td>
            </tr>
        </table>

        <p style="margin-top:24px;">
            <a href="painel.php" class="link-voltar">← Voltar ao painel</a>
        </p>
    </div>
    <?php include '../includes/rodape.php'; ?>
</body>
</html>
