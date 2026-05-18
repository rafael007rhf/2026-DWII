<?php

function requer_login(): void
{
    if (session_status() === PHP_SESSION_NONE){
        session_start();
    }

    if (!isset($_SESSION['usuario'])){
        header('Location: login.php');
        exit;
    }
}

function redirecionar_se_logado(): void
{
    if (session_status() === PHP_SESSION_NONE){
        session_start();
    }

    if (isset($_SESSION['usuario'])){
        header('Location: painel.php');
        exit;
    }
}


function usuario_logado(): string
{
    return $_SESSION['usuario'] ?? '';
}
?>