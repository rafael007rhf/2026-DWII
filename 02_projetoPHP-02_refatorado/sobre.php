<?php
/**
 * ════════════════════════════════════════════════════════════
 * Disciplina : Desenvolvimento Web II (DWII)
 * Projeto    : Portfólio Pessoal — versão refatorada
 * Arquivo    : sobre.php
 * Autor      : Rafael Henrique Freire
 * Data       : 19/04/2026
 * Descrição  : Página "Sobre" com informações acadêmicas
 *              organizadas em estrutura de dados (array).
 * ════════════════════════════════════════════════════════════
 */
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$pagina_atual = 'sobre';
$caminho_raiz = './';
$titulo_pagina = 'Sobre — Rafael Freire';

$formacoes = [
    [
        'curso' => 'Ensino Médio Integrado ao Técnico em Informática',
        'instituicao' => 'IFPR - Centro de Referência de Ponta Grossa',
        'ano' => '2024 - 2027'
    ]
];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <?php
  /*
   * include injeta o conteúdo de cabecalho.php aqui dentro.
   * Ele gera: <meta>, <title>, <link rel="stylesheet"> e o <nav>.
   * __DIR__ garante o caminho correto independente de onde este
   * arquivo está sendo executado.
   */
  include __DIR__ . '/includes/cabecalho.php';
  ?>
</head>
<body>
<main>
    <section class="sobre">
        <h1>Sobre mim</h1>

        <p>
            Olá! Sou <strong>Rafael Henrique Freire</strong>, estudante do
            Ensino Médio Integrado ao curso Técnico em Informática no IFPR — Centro de Referência de Ponta Grossa.
        </p>

        <p>
            Tenho interesse em desenvolvimento web, tecnologia, inteligência artificial e criação
            de soluções digitais aplicadas a problemas reais.
        </p>

        <h2>Formação acadêmica</h2>

        <?php foreach ($formacoes as $f): ?>
            <p>
                <?= $f['curso'] ?> — <?= $f['instituicao'] ?>
                (<?= $f['ano'] ?>)
            </p>
        <?php endforeach; ?>

        <div class="btn">
            <a href="index.php">Voltar ao início</a>
        </div>
    </section>
</main>
<?php include __DIR__ . '/includes/rodape.php'; ?>
</body>
</html>