<?php

http_response_code(404);

$titulo_pagina = "404 - Não encontrado";
$pagina_atual = "";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include 'includes/cab_pdo.php'; ?>
    <link rel="stylesheet" href="../includes/style.css">
</head>
<body>
    <div class="container" style="text-align: center; margin-top: 50px;">
        <h1 style="color: #ef4444;">404 😢</h1>
        <p style="font-size: 18px; margin: 20px 0;">
            Tecnologia não encontrada
        </p>

        <a href="index.php" style="color: #3b579d; font-weight: bold;">
            ← Voltar ao catálogo
        </a>
    </div>

    <?php include 'includes/rod_pdo.php'; ?>
</body>
</html>
