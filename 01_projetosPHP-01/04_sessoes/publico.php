<?php
session_start();
$logado = isset($_SESSION['usuario']);

$titulo_pagina = 'Página Pública';
$caminho_raiz = '../';
$pagina_atual = '';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php require_once __DIR__ . '/../includes/cabecalho.php'; ?>
</head>
<body>

<div class="container" style="text-align: center;">

    <h1 class="titulo-secao">🌐 Página Pública</h1>
    <p>Este conteúdo é visível para qualquer visitante, sem login.</p>

    <?php if ($logado): ?>
    <p>Olá, <strong><?php echo htmlspecialchars($_SESSION['usuario']); ?></strong>!
        Você já está autenticado.</p>
    <a href="<?php echo $caminho_raiz; ?>04_sessoes/painel.php"
       style="background: #3ba34a; color: white; padding: 10px 24px;
              border-radius: 6px; text-decoration: none;
              font-weight: bold;">
        Ir ao Painel
    </a>
<?php else: ?>
    <a href="<?php echo $caminho_raiz; ?>04_sessoes/login.php"
       style="background: #ff3687; color: white; padding: 10px 24px;
              border-radius: 6px; text-decoration: none;
              font-weight: bold;">
        🔐 Acessar Área Restrita
    </a>
<?php endif; ?>


</div>

<?php require_once __DIR__ . '/../includes/rodape.php'; ?>
</body>
</html>