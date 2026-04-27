<?php
/**
 * ════════════════════════════════════════════════════════════
 * ARQUIVO    : 04_sessoes/painel.php
 * Autor      : Murilo Néfi de Faria
 * ════════════════════════════════════════════════════════════
 */

session_start();
require __DIR__ . '/includes/auth.php';
requer_login();

$nome = 'Murilo Néfi de Faria';
$pagina_atual = '';
$titulo_pagina = 'Painel – ' . $nome;
$caminho_raiz = '../';

if (!isset($_SESSION['visitas'])) $_SESSION['visitas'] = 0;
$_SESSION['visitas']++;

$flash = $_SESSION['flash'] ?? '';
unset($_SESSION['flash']);

$usuario = usuario_logado();
$horario_login = $_SESSION['horario_login'] ?? date('d/m/Y H:i:s');
$visitas = $_SESSION['visitas'];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include '../includes/cabecalho.php'; ?>
</head>
<body>
    <div class="container">
        <h1 class="titulo-secao">🛡️ Painel de Controle</h1>

        <?php if ($flash !== ''): ?>
            <div class="alerta-sucesso">
                <p><?php echo htmlspecialchars($flash); ?></p>
            </div>
        <?php endif; ?>

        <table class="tabela-detalhe">
            <tr>
                <td>Usuário</td>
                <td><strong><?php echo htmlspecialchars($usuario); ?></strong></td>
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
            <a href="perfil.php" class="btn">Ver Perfil</a>
            <a href="logout.php" class="btn btn-secundario">Sair</a>
        </p>
    </div>
    <?php include '../includes/rodape.php'; ?>
</body>
</html>
