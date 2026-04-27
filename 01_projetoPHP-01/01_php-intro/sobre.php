<?php
/**
 * ===============================================================
 * Arquivo: 01_php-intro/sobre.php 
 * Disciplina: Desenvolvimento Web II (2026-DWII)
 * Aula: 03 - Aruqitetura Web e Introdução ao PHP
 * Autor: RAFAEL HENRIQUE FREIRE
 * ===============================================================
 */

    $nome = "RAFAEL HENRIQUE FREIRE";
    $profissao = "Estudante de Tecnologia";
    $curso = "Técnico em Informática - IFPR";
    $pagina_atual = "sobre";
    $caminho_raiz   = "../";
    $titulo_pagina  = "Portfólio – {$nome}";
?>


<?php include '../includes/cabecalho.php'; ?>

    <div class="sobre">
        <h1>👤 Sobre mim</h1>
        <p>
            Olá! Sou <strong><?php echo $nome; ?></strong>, estudante de
            Técnico em Informática no IFPR de Ponta Grossa.
        </p>
        <p>Sou estudante do IFPR no curso Técnico em Informática Integrado ao Ensino Médio. Tenho interesse em tecnologia, programação e desenvolvimento de soluções digitais. Busco aprender continuamente e evoluir em áreas como software, banco de dados e inovação.</p>
    </div>

<?php include '../includes/rodape.php'; ?>

