<?php
    $nome = "Rafael Henrique Freire";
    $profissao = "Estudante de Tecnologia";
    $curso = "Técnico em Informática IFPR";
    $pagina_atual = "inicio";
    $caminho_raiz = "../";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $caminho_raiz; ?>includes/estilo.css">
    <title>Portfólio - <?php echo $nome; ?></title>  
</head>
<body>
    <?php include $caminho_raiz . 'includes/cabecalho.php'; ?>
    

    <div class="inicio">
        <h1><?php echo $nome; ?></h1>
        <p><?php echo $profissao; ?> | <?php echo $curso; ?></p>
    </div>
    <div class="container">
        <h2>Bem-vindo ao meu portfólio</h2>
        <p>Esta página foi gerada pelo PHP em:
            <strong><?php echo date("d/m/y \à\s H:i:s"); ?></strong></p>
    </div>

    <?php include $caminho_raiz . 'includes/rodape.php'; ?>

</body>
</html>