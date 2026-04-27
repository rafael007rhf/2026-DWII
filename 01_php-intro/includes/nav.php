<?php
$estilo_inicio   = ($pagina_atual == "inicio") ? 'style="color:#38bdf8;"' : '';
$estilo_sobre    = ($pagina_atual == "sobre") ? 'style="color:#38bdf8;"' : '';
$estilo_projetos = ($pagina_atual == "projetos") ? 'style="color:#38bdf8;"' : '';
?>

<nav>
    <a href="index.php" <?php echo $estilo_inicio; ?>>🏠 Início</a>
    <a href="sobre.php" <?php echo $estilo_sobre; ?>>👤 Sobre</a>
    <a href="projetos.php" <?php echo $estilo_projetos; ?>>📁 Projetos</a>
</nav>