<?php
    $titulo_pagina = "404 - Não encontrado";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include 'includes/cab_pdo.php'; ?>
</head>

<body>

<section class="container">

    <h1>404</h1>

    <p>Tecnologia não encontrada.</p>
    <p>Talvez ela tenha sido removida ou o link esteja incorreto.</p>

    <div class="btn">
        <a href="index.php">Voltar ao catálogo</a>
    </div>

</section>

<?php include 'includes/rod_pdo.php'; ?>

</body>
</html>