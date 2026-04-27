<?php
/**
 * ════════════════════════════════════════════════════════════
 * ARQUIVO    : 04_sessoes/includes/auth.php
 * Autor      : Murilo Néfi de Faria
 * ════════════════════════════════════════════════════════════
 */

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

function requer_login() {
    if (empty($_SESSION['usuario'])) {
        header('Location: login.php');
        exit;
    }
}

function usuario_logado() {
    return $_SESSION['usuario'] ?? '';
}

function redirecionar_se_logado() {
    if (!empty($_SESSION['usuario'])) {
        header('Location: painel.php');
        exit;
    }
}
