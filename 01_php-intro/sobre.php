<?php
/**
 * ════════════════════════════════════════════════════════════
 * ARQUIVO    : 01_php-intro/sobre.php
 * Disciplina : Desenvolvimento Web II (2026-DWII)
 * Autor      : Murilo Néfi de Faria
 * ════════════════════════════════════════════════════════════
 */

$nome          = 'Murilo Néfi de Faria';
$pagina_atual  = 'sobre';
$titulo_pagina = 'Sobre – ' . $nome;
$caminho_raiz  = '../';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include '../includes/cabecalho.php'; ?>
</head>
<body>
    <div class="container">
        <h1 class="titulo-secao">👤 Sobre mim</h1>

        <p>
            Olá! Sou <strong><?php echo htmlspecialchars($nome); ?></strong>,
            estudante do Técnico em Informática no IFPR de Ponta Grossa. Comecei
            a me interessar por programação na escola e desde então venho
            mergulhando aos poucos em desenvolvimento web, banco de dados e
            ferramentas de versionamento.
        </p>

        <p>
            No momento estou focado em fortalecer a base de back-end com PHP e
            MariaDB, exatamente o que estamos vendo na disciplina de
            Desenvolvimento Web II. Gosto da ideia de transformar formulários
            simples em fluxos completos, com validação, mensagens claras de erro
            e armazenamento dos dados de forma segura.
        </p>

        <p>
            Fora da sala de aula, costumo testar pequenos projetos por conta
            própria, ler documentação e participar de comunidades online. Espero
            que este portfólio mostre não só o que aprendi, mas também a forma
            como gosto de organizar e documentar o que produzo.
        </p>

        <p><a href="index.php" class="link-voltar">← Voltar ao início</a></p>
    </div>
    <?php include '../includes/rodape.php'; ?>
</body>
</html>
