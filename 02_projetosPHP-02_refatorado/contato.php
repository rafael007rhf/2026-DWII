<?php


if (session_status() === PHP_SESSION_NONE) session_start();

$pagina_atual = 'contato';
$titulo_pagina = 'Contato | Portfólio DWII';
$caminho_raiz = './';

$nome_visitante = '';
$email     = '';
$mensagem  = '';
$erros     = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome_visitante = trim($_POST['nome_visitante'] ?? '');
    $email          = trim($_POST['email'] ?? '');
    $mensagem       = trim($_POST['mensagem'] ?? '');
    if (empty($nome_visitante)) {
        $erros[] = 'O campo Nome é obrigatório.';
    } elseif (strlen($nome_visitante) < 3) {
        $erros[] = 'O nome deve ter pelo menos 3 caracteres.';
    }
    if (empty($email)) {
        $erros[] = 'O campo E-mail é obrigatório.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        
        
        $erros[] = 'Informe um e-mail válido (ex: nome@email.com).';
    }

    if (empty($mensagem)) {
        $erros[] = 'O campo Mensagem é obrigatório.';
    } elseif (strlen($mensagem) < 10) {
        $erros[] = 'A mensagem deve ter pelo menos 10 caracteres.';
    } elseif (strlen($mensagem) > 500) {
        $erros[] = 'A mensagem não pode ultrapassar 500 caracteres.';
    }

    if (empty($erros)) {
        
        $_SESSION['contato_nome'] = $nome_visitante;

        header("Location: obrigado.php");
        exit; 
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>

    <?php include __DIR__ . '/includes/cabecalho.php'; ?>
</head>
<body>
    <div class="container">
        <h1 class="titulo-secao">📩 Entre em Contato</h1>

        <?php if (!empty($erros)) : ?>
            
            <div class="alerta-erro">
                <h3>⚠️ Corrija os erros abaixo:</h3>
                <ul style="margin: 6px 0 0; padding-left: 20px;">
                    <?php foreach ($erros as $erro) : ?>
                        <li><?php echo htmlspecialchars($erro); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

<div class="form-container">
    <form class="formulario" method="post" action="contato.php">
        <div class="campo">
            <label class="label-campo" for="nome_visitante">Nome *</label>
            <input class="input-texto" type="text" id="nome_visitante"
                   name="nome_visitante" placeholder="Seu nome completo"
                   value="<?php
                  
                   echo htmlspecialchars($nome_visitante);
                   ?>">
        </div>
        <div class="campo">
            <label class="label-campo" for="email">E-mail *</label>
            <input class="input-texto" type="email" id="email" name="email"
                   placeholder="seu@email.com"
                   value="<?php echo htmlspecialchars($email); ?>">
        </div>
        <div class="campo">
            <label class="label-campo" for="mensagem">Mensagem *
<span style="color: #6b7280; font-weight: normal; font-size: 13px;">
  (mín. 10, máx. 500 caracteres)
</span>
</label>

<textarea class="input-texto" id="mensagem" name="mensagem"
  rows="5" placeholder="Escreva sua mensagem..."
  maxlength="500"><?php echo htmlspecialchars($mensagem); ?></textarea>
</div>
<button type="submit" class="btn-primario" style="width: 100%;">
  Enviar Mensagem 📩
</button>
</form>
</div>
</div>
<?php include __DIR__ . '/includes/rodape.php'; ?>
</body>
</html>