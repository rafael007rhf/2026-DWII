<?php
session_start();
require_once __DIR__ . '/includes/auth.php';
redirecionar_se_logado();

$pagina_atual = "login";
$USUARIO_VALIDO = 'admin';
$SENHA_VALIDA = 'dwii2026';
$erro = '';
$login = '';
$tempo_restante = 0;


if (!isset($_SESSION['tentativas'])) {
    $_SESSION['tentativas'] = 0;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $login = trim($_POST['usuario'] ?? '');
    $senha = trim($_POST['senha'] ?? '');


if (isset($_SESSION['bloqueado_ate']) && time() < $_SESSION['bloqueado_ate']) {
    $segundos = $_SESSION['bloqueado_ate'] - time();
    $tempo_restante = $segundos ?? 0;
   $erro = "⏳ Muitas tentativas. Aguarde $segundos s.";

} else {



    if ($login === $USUARIO_VALIDO && $senha === $SENHA_VALIDA){
        session_regenerate_id(true);
        $_SESSION['usuario'] = $login;
        $_SESSION['logado_em'] = date('d/m/y \à\s H:i');
        $_SESSION['flash'] = "Bem-vindo, $login!";
        $_SESSION['tentativas'] = 0; 
        unset($_SESSION['bloqueado_ate']);
        header('Location: painel.php');
        exit;
    
    }
    else{
    $_SESSION['tentativas']++;

    if ($_SESSION['tentativas'] >= 3) {
        $_SESSION['bloqueado_ate'] = time() + 60; 
        $_SESSION['tentativas'] = 0;
    }

    $erro = 'Usuário ou senha incorretos.';
}

}
}

$titulo_pagina = 'Login - Área Restrita';
$caminho_raiz = '../';

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php require_once __DIR__ . '/../includes/cabecalho.php';?>
    <link rel="stylesheet" href="../includes/style.css">
</head>
<body>

<div class="container" style="max-width: 420px;"> 
    <div class="form-container"> 
        <h1 class="titulo-secao" style="text-align: center;
        font-size: 22px;"> 
            🔐 Área Restrita
</h1>

<?php if ($erro): ?>
    <div class="alerta-erro"> 
        <p id="contador" style="margin: 0; font-size: 14px;"> 
            🚫 <?php echo htmlspecialchars($erro); ?>
        </p>
    </div>
<?php endif; ?>

<form action="login.php" method="post">
    <label>Usuário:</label>
    <input type="text"
            name="usuario"
            value="<?php echo htmlspecialchars($login); ?>"
            autocomplete="username">

        <label>Senha:</label>
        <input type="password"
                name="senha"
                autocomplete="current-password">

        <button type="submit">Entrar</button>
        </form>
        <p style="text-align: center; margin-top: 20px;
            font-size: 13px; color:lightcoral;"> 
            <a href="../index.php" style="color:lightslategray">← Voltar ao início</a>

        </p>
    </div>
</div>
<?php require_once __DIR__ . '/../includes/rodape.php'; ?>

<script>
let tempo = <?php echo $tempo_restante ?? 0; ?>;

if (tempo > 0) {
    const contador = document.getElementById("contador");

    const intervalo = setInterval(() => {
        tempo--;

        if (tempo <= 0) {
            clearInterval(intervalo);
            contador.innerHTML = "✅ Você pode tentar novamente!";
        } else {
            contador.innerHTML = "⏳ Aguarde " + tempo + " segundos para tentar novamente.";
        }
    }, 1000);
}
</script>

</body>
</html>

