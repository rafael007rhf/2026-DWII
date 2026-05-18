<?php



if (!isset($_GET['nome']) || !isset($_GET['assunto'])) {
    header('Location: contato.php');
    exit;
}


$nome = "Rafael Freire";
$pagina_atual = "contato";
$caminho_raiz = "../";
$titulo_pagina = "Obrigado!";


$nome_visitante = htmlspecialchars($_GET['nome']);
$assunto = htmlspecialchars($_GET['assunto']);
?>

<?php include $caminho_raiz . 'includes/cabecalho.php'; ?>

<div class="container confirmacao">

    <p class="confirmacao-icone">✅</p>

    <h1 class="confirmacao-titulo">
        Obrigado, <?php echo $nome_visitante; ?>!
    </h1>

    <p class="confirmacao-texto">
        Recebemos sua mensagem sobre <strong><?php echo $assunto; ?></strong>.
    </p>

    <p class="confirmacao-texto">
        Entrarei em contato em breve.
    </p>

    <a href="contato.php" class="btn">← Enviar outra mensagem</a>

</div>

<?php include $caminho_raiz . 'includes/rodape.php'; ?>