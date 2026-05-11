<?php
    $nome = "Rafael Henrique Freire";
    $pagina_atual = "sobre";
    $caminho_raiz = "../";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $caminho_raiz; ?>includes/estilo.css">
    <title>Sobre - <?php echo $nome; ?></title>
</head>
<body>
    <?php include $caminho_raiz . 'includes/cabecalho.php'; ?>
    
    
    <div class="sobre">
        <h1> Sobre mim</h1>
        <p>Olá! Sou <strong><?php echo $nome; ?></strong>, estudante de
        Técnico em Informática no IFPR de Ponta Grossa.</p>
        <p> Tenho 16 anos, moro em Ponta Grossa, 
            estou cursando o 3º ano do Ensino Médio Técnico em Informática, 
            determinada a construir uma carreira 
            sólida na área de TI.
            Atualmente minha série favorita é Bridgerton,
            eu escolhi a informática porque desde pequena 
            sempre gostei das aulas de robótica, matemática e essas coisas.</p>
    </div>
    <div class="btn">
        <a href="index.php"> Voltar ao início</a>
    </div>
    <?php include $caminho_raiz . 'includes/rodape.php'; ?>
</body>
</html>