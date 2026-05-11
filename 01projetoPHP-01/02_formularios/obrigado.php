<?php
$nome = "Rafael Henrique Freire";
$pagina_atual = "contato";
$caminho_raiz = "../";
$titulo_pagina = "Obrigada!";

$nome_visitante = htmlspecialchars ($_GET[ 'nome' ] ?? 'visitante');
$assunto = htmlspecialchars ($_GET[ 'assunto' ] ?? 'sem assunto') ;
?>

    <?php include $caminho_raiz . 'includes/cabecalho.php'; ?>
    <div class="container">
        <h1 class="obrigado">Obrigada, <?php echo $nome_visitante; ?>!</h1>
        <p class="msg">
            Sua mensagem foi enviada. Entrarei em contato em breve.<br>
            Assunto: <?php echo htmlspecialchars($assunto); ?>
        </p>
        <div class="btn">
            <a href="contato.php">Enviar outra mensagem</a>
        </div>
    </div>
<?php include $caminho_raiz . 'includes/rodape.php'; ?>