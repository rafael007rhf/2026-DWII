<?php
    $pagina_atual = "projetos";
    $nome = "Rafael Henrique Freire";
    $caminho_raiz = "../";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $caminho_raiz; ?>includes/estilo.css">
    <title>Projetos - <?php echo $nome; ?></title>
</head>
<body>
    <?php include $caminho_raiz . 'includes/cabecalho.php'; ?>
    <div class="projetos">
        <h2>Site Portfólio HTML/CSS</h2>
        <p>Primeiro site que criei no DWII. Layout responsivo com HTML e CSS puro.</p>

        <h2>Sistema de Cadastro de Grupos Sociais</h2>
        <p>Projeto final da aula de DWI. Ele gerencia os grupos sociais.</p>

        <h2>Sistema de uma Hamburgueria</h2>
        <p>Projeto final da matéria de programação de sistemas, feito em python, ele faz um CRUD completo.</p>
    </div>
    <?php include $caminho_raiz . 'includes/rodape.php'; ?>
</body>
</html>