<?php
    session_start(); // verificar se há sessão (mas não exigir)
    $logado = isset($_SESSION['usuario']);

    $titulo_pagina = 'Página Pública';
    $caminho_raiz = '../';
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <?php require_once __DIR__ . '/../includes/cabecalho.php'; ?>
    </head>
    <body>
        <div class="container">
            <h1 class="titulo-secao">Página Pública</h1>
            <p>Este conteúdo é visível para qualquer visitante, sem login.</p>
            <?php if ($logado): ?>
                <p>Olá, <strong><?php echo htmlspecialchars($_SESSION['usuario']); ?></strong>! Você já está autenticado.</p>
                <a class="voltar"href="painel.php">Ir ao Painel</a>
            <?php else: ?>
                <p class=link-volta><a href="login.php"> Acessar Área Restrita</a></p>
            <?php endif; ?>
        </div>
        <?php require_once __DIR__ . '/../includes/rodape.php'; ?>
    </body>
</html>