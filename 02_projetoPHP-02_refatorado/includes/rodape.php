<?php

/**
 * ===============================================================
 * Arquivo: includes/rodape.php 
 * Disciplina: Desenvolvimento Web II (2026-DWII)
 * Aula: 03 - Aruqitetura Web e Introdução ao PHP
 * Autor: RAFAEL HENRIQUE FREIRE
 * ===============================================================
 */
$autor = isset($nome) ? htmlspecialchars($nome) : 'Portfólio';
?>

<footer>
  <?php echo $autor; ?>
  &copy; <?php echo date('Y'); ?>
  | Desenvolvido com PHP
  | IFPR — Ponta Grossa
</footer>