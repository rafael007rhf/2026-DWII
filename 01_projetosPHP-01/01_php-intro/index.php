

<?php
$nome  = "Rafael Freire";
$profissao = "Estudante de Tecnologia";
$curso = "Técnico em Informática – IFPR";
$pagina_atual = "inicio";
$caminho_raiz = "../";
$titulo_pagina = "Início";
?>

<!DOCTYPE html>
<html lang="pt-BR">

    <?php require_once __DIR__ . '/../includes/cabecalho.php';?>

<div class="container">
    <h1><?php echo $nome; ?></h1>
    <p><?php echo $profissao; ?> | <?php echo $curso; ?></p>

    <p>
        Gerado em:
        <strong><?php echo date("d/m/Y \à\s H:i:s"); ?></strong>
    </p>        includes/cabecalho.php
</div>

<?php require_once __DIR__ . '/../includes/rodape.php'; ?>
