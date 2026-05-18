<?php
if (session_status() === PHP_SESSION_NONE) session_start();

$nome = "Rafael Freire";
$pagina_atual  = 'sobre';
$titulo_pagina = 'Sobre | Portfólio DWII';
$caminho_raiz  = './';

$formacoes = [
    "Técnico em Informática — IFPR CRPG",
    "Desenvolvimento Web II — 2026",
    "Projetos com PHP, CSS, banco de dados e organização de sistemas"
];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <?php include __DIR__ . '/includes/cabecalho.php'; ?>
</head>
<body>
  <div class="container">
    <h1 class="titulo-secao">👤 Sobre mim</h1>

    <div class="card">
      <h3>Quem sou eu</h3>
      <p>Olá! Sou <strong><?php echo htmlspecialchars($nome); ?></strong>.</p>
      <p>
        Sou estudante do curso Técnico em Informática integrado ao Ensino Médio no IFPR CRPG.
        Tenho interesse em desenvolvimento web, programação, inteligência artificial e criação de soluções digitais.
        Este portfólio reúne atividades e projetos desenvolvidos durante a disciplina de Desenvolvimento Web II.
      </p>
      <p>
        Meu objetivo é evoluir na área de tecnologia, construir projetos mais completos e aplicar programação para resolver problemas reais de forma simples, organizada e eficiente.
      </p>
    </div>

    <div class="card">
      <h3>Formação e interesses</h3>
      <ul class="lista-formacao">
        <?php foreach ($formacoes as $item): ?>
          <li><?php echo htmlspecialchars($item); ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>

  <?php include __DIR__ . '/includes/rodape.php'; ?>
</body>
</html>
