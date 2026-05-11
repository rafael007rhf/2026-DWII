<?php
    require_once __DIR__ . '/../04_sessoes/includes/auth.php';
    requer_login();
   
    require_once __DIR__ . '/includes/conexao.php';
    
    $id = (int) ($_GET['id'] ?? 0);
    if ($id <= 0) {
        header('Location: index.php?erro=id_invalido');
        exit;
    }

    $pdo = conectar();
    $stmt = $pdo->prepare('SELECT nome FROM projetos WHERE id = :id');
    $stmt->execute([':id' => $id]);
    $projeto = $stmt->fetch();

    if (!$projeto) {
        header('Location: index.php?erro=nao_encontrado');
        exit;
    }
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $stmt = $pdo->prepare('DELETE FROM projetos WHERE id = :id');
        $stmt->execute([':id' => $id]);
        
        header('Location: index.php?excluido=ok');
        exit;
    }
    
    $titulo_pagina = 'Excluir Projeto Portfólio';
    $caminho_raiz = '../';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php require_once __DIR__ . '/../includes/cabecalho.php'; ?>
</head>
<body>
    <div class="container">
        <h1 class="titulo-secao"> Confirmar Exclusão</h1>

        <div class="card">
            <p>
                Você está prestes a excluir o projeto:
            </p>
            <p>
                <?php echo htmlspecialchars($projeto ['nome']); ?>
            </p>
            <p>
                Esta ação <strong>NÃO</strong> pode ser desfeita.
            </p>
            <form action="excluir.php?id=<?php echo $id; ?>"method="post">
                <div>
                    <button type="submit" class="btn-perigo">Excluir</button>
                    <a href="index.php" class="btn-secundario">Cancelar</a>
                </div>
            </form>
            </div>
        </div>
        <?php require_once __DIR__ . '/../includes/rodape.php'; ?>
</body>
</html>