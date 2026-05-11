<?php
/**
 * ════════════════════════════════════════════════════════════
 * Disciplina : Desenvolvimento Web II (DWII)
 * Projeto    : Portfólio Pessoal — versão refatorada
 * Arquivo    : includes/rodape.php
 * Autor      : Rafael Henrique Freire
 * Data       : 19/04/2026
 * Descrição  : Rodapé global do projeto.
 *              Exibe o nome do autor e o ano atual (gerado
 *              dinamicamente por date()). Se $nome não estiver
 *              definida na página, usa 'Portfólio' como fallback.
 * ════════════════════════════════════════════════════════════
 */

// ── Fallback defensivo ───────────────────────────────────────
//
// Operador ternário: condição ? valor_se_verdadeiro : valor_se_falso
//
// isset($nome) → true  : $autor = htmlspecialchars($nome)
// isset($nome) → false : $autor = 'Portfólio'
//
// Páginas que não definem $nome (ex.: catálogo, login) ainda
// terão um rodapé funcional — apenas com texto genérico.
$autor = isset($nome) ? htmlspecialchars($nome) : 'Portfólio';
?>

<!-- <footer> sem style inline: visual controlado pelo style.css -->
<footer>
  <?php echo $autor; ?>
  &copy; <?php echo date('Y'); ?>
  | Desenvolvido com PHP
  | IFPR — Ponta Grossa
</footer>