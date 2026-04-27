<?php
/**
 * ════════════════════════════════════════════════════════════
 * ARQUIVO    : 04_sessoes/login.php
 * Autor      : Murilo Néfi de Faria
 * ════════════════════════════════════════════════════════════
 */

session_start();
require __DIR__ . '/includes/auth.php';
redirecionar_se_logado();

$nome = 'Murilo Néfi de Faria';
$pagina_atual = '';
$titulo_pagina = 'Login – ' . $nome;
$caminho_raiz = '../';

$usuario_digitado = '';
$mensagem_erro = '';
$agora = time();

if (!isset($_SESSION['tentativas'])) $_SESSION['tentativas'] = 0;
if (!isset($_SESSION['bloqueado_ate'])) $_SESSION['bloqueado_ate'] = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario_digitado = trim($_POST['usuario'] ?? '');
    $senha = $_POST['senha'] ?? '';

    if ($_SESSION['bloqueado_ate'] > $agora) {
        $segundos_restantes = $_SESSION['bloqueado_ate'] - $agora;
        $mensagem_erro = 'Acesso temporariamente bloqueado. Tente novamente em ' . $segundos_restantes . ' segundos.';
    } else {
        if ($usuario_digitado === 'admin' && $senha === 'dwii2026') {
            session_regenerate_id(true);
            $_SESSION['usuario'] = $usuario_digitado;
            $_SESSION['horario_login'] = date('d/m/Y H:i:s');
            $_SESSION['visitas'] = 0;
            $_SESSION['tentativas'] = 0;
            $_SESSION['bloqueado_ate'] = 0;
            $_SESSION['flash'] = 'Bem-vindo, ' . $usuario_digitado . '!';
            header('Location: painel.php');
            exit;
        }

        $_SESSION['tentativas']++;
        $mensagem_erro = 'Usuário ou senha inválidos.';
        if ($_SESSION['tentativas'] >= 3) {
            $_SESSION['bloqueado_ate'] = $agora + 60;
            $mensagem_erro = 'Acesso temporariamente bloqueado. Tente novamente em 60 segundos.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include '../includes/cabecalho.php'; ?>
</head>
<body>
    <div class="container" style="max-width: 460px;">
        <h1 class="titulo-secao">🔐 Área Restrita</h1>

        <?php if ($mensagem_erro !== ''): ?>
            <div class="alerta-erro">
                <p><?php echo htmlspecialchars($mensagem_erro); ?></p>
            </div>
        <?php endif; ?>

        <form class="formulario" action="login.php" method="post">
            <label for="usuario">Usuário</label>
            <input type="text" id="usuario" name="usuario"
                   value="<?php echo htmlspecialchars($usuario_digitado); ?>"
                   autocomplete="username">

            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" autocomplete="current-password">

            <button type="submit" class="btn">Entrar</button>
        </form>

        <p style="text-align:center; margin-top:18px;">
            <a href="publico.php" class="link-voltar">← Voltar ao início</a>
        </p>
    </div>
    <?php include '../includes/rodape.php'; ?>
</body>
</html>
