<?php
    require_once __DIR__ . '/includes/auth.php';
    requer_login();

    if (!isset($_SESSION['visitas'])) {
        $_SESSION['visitas'] = 0;
    }
    $_SESSION['visitas']++;

    $flash = $_SESSION['flash'] ?? null;
    unset($_SESSION['flash']);

    $titulo_pagina = 'Painel Área Restrita';
    $caminho_raiz = '../';
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <?php require_once __DIR__ . '/../includes/cabecalho.php'; ?>
    </head>
    <body>
        <div class="container">
            <?php if ($flash): ?>
                    <div class="alerta-sucesso">
                        <p><?php echo htmlspecialchars($flash); ?></p>
                    </div>
                <?php endif; ?>
            <div class="alerta-sucesso">
                <h3> Você está autenticado!</h3>
                <p><strong>Login realizado em:</strong>
                    <?php echo htmlspecialchars($_SESSION['logado_em'] ??'-'); ?>
                </p>
            </div>
            <p><strong>Visitas nesta sessão:</strong>
                <?php echo $_SESSION['visitas']; ?>
            </p>
            <div class="card">
                <h3> Painel de controle</h3>
                <p>Este conteúdo só é visível para usuários autenticados.</p>
                <a href="../05_crud/index.php"> Gerenciar Projetos</a>
            </div>
            <p class=link-volta><a href="logout.php"> Sair </a></p>
        </div>
        <?php require_once __DIR__ . '/../includes/rodape.php'; ?>
</body>
</html>