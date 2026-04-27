<?php
/**
 * ════════════════════════════════════════════════════════════
 * ARQUIVO    : 01_php-intro/index.php
 * Disciplina : Desenvolvimento Web II (2026-DWII)
 * Autor      : Murilo Néfi de Faria
 * ════════════════════════════════════════════════════════════
 */

$nome          = 'Murilo Néfi de Faria';
$profissao     = 'Estudante de Tecnologia';
$curso         = 'Técnico em Informática — IFPR';
$pagina_atual  = 'inicio';
$titulo_pagina = 'Portfólio – ' . $nome;
$caminho_raiz  = '../';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include '../includes/cabecalho.php'; ?>
    <style>
        .hero {
            background: linear-gradient(135deg, #1f1d2b 0%, #463f55 100%);
            color: #fdfcf7;
            text-align: center;
            padding: 80px 24px;
            border-bottom: 6px solid #c9543a;
        }
        .hero h1 {
            font-size: 2.6em;
            margin-bottom: 10px;
            letter-spacing: -0.5px;
        }
        .hero p {
            font-size: 1.1em;
            color: #e6e1d3;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="hero">
        <h1><?php echo htmlspecialchars($nome); ?></h1>
        <p><?php echo htmlspecialchars($profissao); ?> | <?php echo htmlspecialchars($curso); ?></p>
    </div>
    <div class="container">
        <h2 class="titulo-secao">Bem-vindo ao meu portfólio</h2>
        <p>Este portfólio foi modularizado com PHP usando variáveis, includes e menu dinâmico.</p>
        <p>Gerado em: <strong><?php echo date('d/m/Y \às H:i:s'); ?></strong></p>
    </div>
    <?php include '../includes/rodape.php'; ?>
</body>
</html>
