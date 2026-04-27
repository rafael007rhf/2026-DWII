<?php
$autor = isset($nome) ? htmlspecialchars($nome) : "Murilo Néfi de Faria";
?>
<footer>
    <?php echo $autor; ?>
    &copy; <?php echo date("Y"); ?>
    | Desenvolvido com PHP
    | IFPR — Ponta Grossa
</footer>
