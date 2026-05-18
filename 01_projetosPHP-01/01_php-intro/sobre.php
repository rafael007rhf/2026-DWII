<?php
$pagina_atual = "sobre";
$nome = "Rafael Freire";
$caminho_raiz = "../";
$titulo_pagina = "Sobre";
?>

<!DOCTYPE html>
<html lang="pt-BR">

<?php require_once __DIR__ . '/../includes/cabecalho.php'; ?>

<div class="container">
    <h1>Sobre mim</h1>

    <p>Olá! Sou <strong><?php echo htmlspecialchars($nome); ?></strong>.</p>

    <p>
        Sou estudante do curso Técnico em Informática integrado ao Ensino Médio no IFPR CRPG.
        Tenho interesse em desenvolvimento web, programação, inteligência artificial e projetos que usam tecnologia para resolver problemas reais.
        Neste portfólio, organizo atividades e projetos desenvolvidos na disciplina de Desenvolvimento Web II.
    </p>

    <p>
        Busco evoluir como desenvolvedor, praticando HTML, CSS, PHP, banco de dados, organização de código e criação de sistemas simples, funcionais e bem apresentados.
    </p>

    <a href="index.php" class="btn">Voltar</a>
</div>

<?php require_once __DIR__ . '/../includes/rodape.php'; ?>
