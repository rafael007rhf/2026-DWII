<?php
/**
 * ════════════════════════════════════════════════════════════
 * ARQUIVO    : 03_pdo/404.php
 * Autor      : Murilo Néfi de Faria
 * ════════════════════════════════════════════════════════════
 */

http_response_code(404);
$titulo_pagina = '404 — Catálogo';
$pagina_atual = 'catalogo';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head><?php include 'includes/cab_pdo.php'; ?></head>
<body>
    <div class="container">
        <h1 class="titulo-secao">404</h1>
        <p>Tecnologia não encontrada.</p>
        <p><a href="index.php" class="btn">Voltar ao catálogo</a></p>
    </div>
    <?php include 'includes/rod_pdo.php'; ?>
</body>
</html>
