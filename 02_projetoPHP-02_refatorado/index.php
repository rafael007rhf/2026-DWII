<?php
/**
 * ════════════════════════════════════════════════════════════
 * Disciplina : Desenvolvimento Web II (DWII)
 * Projeto    : Portfólio Pessoal — versão refatorada
 * Arquivo    : index.php  (homepage do portfólio)
 * Autor      : Rafael Henrique Freire
 * Data       : 19/04/2026
 * Descrição  : Homepage do portfólio pessoal.
 *              Converte a apresentação estática (HTML puro) em
 *              PHP dinâmico, integrando cabeçalho, navegação e
 *              rodapé globais via includes.
 * ════════════════════════════════════════════════════════════
 */

// ── Variáveis de controle do cabecalho ──────────────────────
// $pagina_atual → lida pelo nav.php para destacar o item ativo
// $caminho_raiz → prefixo para caminhos de CSS e links do menu
//                 './' = estamos na raiz do projeto
// $titulo_pagina → aparece na aba do navegador

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

$pagina_atual  = 'inicio';
$caminho_raiz  = './';
$titulo_pagina = 'Portfólio — Rafael Henrique Freire';

// ── Dados de apresentação ────────────────────────────────────
// Centralizamos o conteúdo em variáveis PHP.
// Para personalizar o portfólio: edite APENAS estas variáveis.
// O HTML abaixo não precisa ser alterado.
$nome      = 'Rafael Henrique Freire';
$descricao = 'Estudante do Ensino Médio Integrado ao Técnico em Informática no IFPR, '
           . 'com interesse em desenvolvimento web, tecnologia e soluções digitais. '
           . 'Este portfólio documenta minha jornada de aprendizado '
           . 'ao longo da disciplina de Desenvolvimento Web II.';
$email     = 'rafa.henrique.freire@gmail.com';
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

  <!-- ── SEÇÃO DE APRESENTAÇÃO ─────────────────────────────
       Layout com foto à esquerda e texto à direita.
       O CSS desta seção está definido em includes/style.css:
       .apresentacao usa flexbox para posicionar os elementos.
  -->
  <main>
    <section class="apresentacao">

      <!-- Foto de perfil -->
      <div class="foto-container">
        <img
          src="<?php echo $caminho_raiz; ?>includes/imgs/ft.jpg"
          alt="Foto de <?php echo htmlspecialchars($nome); ?>"
          class="foto-perfil">
      </div>

      <!-- Bloco de texto + cards informativos -->
      <div class="texto-container">

        <h2>
          Olá, eu sou <?php echo htmlspecialchars($nome); ?>!
        </h2>

        <?php
        /*
         * htmlspecialchars() converte caracteres especiais em
         * entidades HTML antes de exibir qualquer variável.
         * Exemplo: < vira &lt; | > vira &gt; | " vira &quot;
         * Isso previne ataques XSS (Cross-Site Scripting).
         * REGRA: sempre use htmlspecialchars() ao exibir dados variáveis.
         */
        ?>
        <p><?php echo htmlspecialchars($descricao); ?></p>

        <!-- Cards de informação rápida
             Cada card tem um ícone e um texto descritivo.
             As classes .info-cards e .info-card estão no style.css -->
        <div class="info-cards">

          <div class="info-card">
            <span class="card-texto">Técnico em Informática — IFPR CRPG</span>
          </div>

          <div class="info-card">
            <span class="card-texto">Desenvolvimento Web II — 2026</span>
          </div>

          <div class="info-card">
            <span class="card-texto">
              <?php echo htmlspecialchars($email); ?>
            </span>
          </div>

        </div><!-- /info-cards -->

      </div><!-- /texto-container -->

    </section>
  </main>

  <?php include __DIR__ . '/includes/rodape.php'; ?>

</body>
</html>