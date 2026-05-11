<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
    $pagina_atual = "contato";
    $caminho_raiz = "./";
    $titulo_pagina = "Contato";
    

    $nome_visitante = '';
    $email = '';
    $mensagem = '';
    $assunto = '';
    $erros = [];


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome_visitante = trim($_POST['nome_visitante'] ?? '');
        $mensagem = trim($_POST['mensagem']?? '');
        $email = trim($_POST['email'] ?? '');
        $assunto = trim($_POST['assunto'] ?? '');


        if (empty($nome_visitante)) {
            $erros [] = 'O campo Nome é obrigatório. ' ;
        }
        if (empty ($mensagem) ) {
            $erros [] = 'O campo Mensagem é obrigatório. ' ;
        } 
        elseif (strlen ($mensagem) < 10) {
            $erros [] = 'A mensagem deve ter pelo menos 10 caracteres. ';
        }
        elseif (strlen($mensagem) > 500) {
            $erros[] = 'A mensagem deve ter no máximo 500 caracteres.';
        }
        if (empty ($email) ) {
            $erros [] = 'O campo Email é obrigatório. ' ;
        } 
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $erros[] = 'Digite um email válido.';
        }
        if (empty($assunto)) {
            $erros[] = 'Selecione um assunto.';
        }   

        if (empty ($erros) && $_SERVER['REQUEST_METHOD'] === 'POST' ) {
        header ('Location: obrigado.php?nome=' . urlencode ($nome_visitante) . '&assunto=' . urlencode ($assunto) );
        exit;
        }
    
    }
?>
    <?php include $caminho_raiz . 'includes/cabecalho.php'; ?>

    
    <!--EU COLOQUEI O CÓDIGO DE VALIDAÇÃO DE VOLTA PRO USUÁRIO SABER Q TEM UM ERRO -->
    <?php if (!empty ($erros) ): ?>
        <div class="erro">
            <h3> Corrija os erros :</h3>
            <ul>
                <?php foreach ($erros as $erro) : ?>
                    <li><?php echo htmlspecialchars ($erro); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <div class="container">
        <h1 class="titulo"> Formulário de Contato </h1>

        <form class="form" action="contato.php" method="post">
            <label>Seu nome :</label>
            <input type="text" name="nome_visitante" value="<?php echo htmlspecialchars($nome_visitante); ?>">

            <label>Seu email :</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
            
            <label>Assunto: </label>
            <select name="assunto">
                <option value="">   </option>
                <option value="duvida" <?php if ($assunto === 'duvida') echo 'selected'; ?>>Dúvida</option>
                <option value="proposta" <?php if ($assunto === 'Proposta') echo 'selected'; ?>>Proposta de trabalho</option>
                <option value="colaboracao" <?php if ($assunto === 'colaboracao') echo 'selected'; ?>>Colaboração</option>
                <option value="outro" <?php if ($assunto === 'outro') echo 'selected'; ?>>Outro</option>
            </select>

            <label>Sua mensagem: </label>
            <textarea name="mensagem" rows="4" maxlength="500"><?php echo htmlspecialchars($mensagem); ?></textarea>
            <p class="gerado">
                <?php echo strlen($mensagem); ?>/500
            </p>
            <button type="submit">Enviar</button>
        </form>
    </div>  

 

<?php include $caminho_raiz . 'includes/rodape.php'; ?>