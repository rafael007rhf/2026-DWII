<?php


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$pagina_atual  = 'inicio';
$titulo_pagina = 'Portfólio | DWII 2026';
$caminho_raiz  = './';



$nome      = 'Rafael Freire';
$descricao = 'Estudante do curso Técnico em Informática no IFPR CRPG, ' 
           . 'com interesse em desenvolvimento web, inteligência artificial ' 
           . 'e criação de soluções digitais para problemas reais.';
$email     = 'rafa.henrique.freire@gmail.com';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <?php
  
  include __DIR__ . '/includes/cabecalho.php';
  ?>
</head>
<body>

  
  <main>
    <section class="apresentacao">

      
      <div class="foto-container">
        <img
          src="<?php echo $caminho_raiz; ?>./includes/imgs/perfil.jpg"
          alt="Avatar de <?php echo htmlspecialchars($nome); ?>"
          class="foto-perfil">
      </div>

      
      <div class="texto-container">

        <h2>
          Olá, eu sou <?php echo htmlspecialchars($nome); ?>! 👋
        </h2>

        <?php
       
        ?>
        <p><?php echo htmlspecialchars($descricao); ?></p>

        
        <div class="info-cards">

          <div class="info-card">
            <span class="card-icon">🎓</span>
            <span class="card-texto">Técnico em Informática — IFPR CRPG</span>
          </div>

          <div class="info-card">
            <span class="card-icon">💻</span>
            <span class="card-texto">Desenvolvimento Web II — 2026</span>
          </div>

          <div class="info-card">
            <span class="card-icon">📧</span>
            <span class="card-texto">
              <?php echo htmlspecialchars($email); ?>
            </span>
          </div>

        </div>

      </div>

    </section>
  </main>

  <?php include __DIR__ . '/includes/rodape.php'; ?>

</body>
</html>