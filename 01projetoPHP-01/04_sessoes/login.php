<?php
    session_start();

    require_once __DIR__ . '/includes/auth.php';
    redirecionar_se_logado();

    $USUARIO_VALIDO = 'admin';
    $SENHA_VALIDA = 'dwii2026';

    $erro = '';
    $login = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (isset($_SESSION['bloqueado_ate']) && time() < $_SESSION['bloqueado_ate']) {
            $erro = 'Muitas tentativas. Tente novamente mais tarde.';
        } else {

            $login = trim($_POST['usuario'] ?? '');
            $senha = trim($_POST['senha'] ?? '');

            if ($login === $USUARIO_VALIDO && $senha === $SENHA_VALIDA){
                session_regenerate_id(true);
                $_SESSION['usuario'] = $login;
                $_SESSION['logado_em'] = date('d/m/Y \à\s H:i');
                $_SESSION['flash'] = "Bem-vindo, $login!";

                $_SESSION['tentativas'] = 0;

                header('Location: painel.php');
                exit;
            } else {
                $erro = 'Usuário ou senha incorretos.';

                $_SESSION['tentativas'] = ($_SESSION['tentativas'] ?? 0) + 1;

                if ($_SESSION['tentativas'] >= 3) {
                    $_SESSION['bloqueado_ate'] = time() + 60;
                    $_SESSION['tentativas'] = 0;
                }
            }
        }
    }
    $titulo_pagina = 'Login Área Restrita';
    $caminho_raiz = '../';

?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <?php require_once __DIR__ . '/../includes/cabecalho.php'; ?>
    </head>
    <body>

    <div class="container">
        <div class="form-container">
            <h1 class="titulo-secao"> Área Restrita </h1>
            <?php if ($erro): ?>
                <div class="alerta-erro">
                    <p style="margin: 0; font-size: 14px;">
                        <?php echo htmlspecialchars($erro); ?>
                    </p>
                </div>
            
            <?php endif; ?>
            
            <form action="login.php" method="post">
                <label>Usuário:</label>
                <input type="text" name="usuario" value="<?php echo htmlspecialchars($login); ?>" autocomplete="username">
                <label>Senha:</label>
                <input type="password" name="senha" autocomplete="current-password">
                <button type="submit">Entrar</button>
            </form>

            <p class=link-volta><a href="../index.php">Voltar ao início</a></p>

           
        </div>

    </div>

    <?php require_once __DIR__ . '/../includes/rodape.php'; ?>
</body>
</html>
        

            