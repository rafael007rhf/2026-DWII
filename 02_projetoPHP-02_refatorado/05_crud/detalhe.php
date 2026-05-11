<?php
    require_once __DIR__ . '/../04_sessoes/includes/auth.php';
    requer_login();

    require_once __DIR__ . '/includes/conexao.php';

    $pdo = conectar();

    $id = (int) ($_GET['id'] ?? 0);

    if ($id <= 0) {
        die('ID inválido');
    }

    $stmt = $pdo->prepare("SELECT * FROM projetos WHERE id = :id");
    $stmt->execute([':id' => $id]);

    $projeto = $stmt->fetch();

    if (!$projeto) {
        die('Projeto não encontrado');
    }
?>

<!DOCTYPE html>
<html>
<head>
    <?php require_once __DIR__ . '/../includes/cabecalho.php'; ?>
</head>
<body>
    <div class="container">
        <div class="card">
            <h1><?php echo htmlspecialchars($projeto['nome']); ?></h1>

            <p><?php echo htmlspecialchars($projeto['descricao']); ?></p>

            <p><strong>Tecnologias:</strong> <?php echo htmlspecialchars($projeto['tecnologias']); ?></p>

            <p><strong>Ano:</strong> <?php echo htmlspecialchars($projeto['ano']); ?></p>

            <?php if ($projeto['link_github']): ?>
                <a href="<?php echo htmlspecialchars($projeto['link_github']); ?>" target="_blank">
                    Ver no GitHub
                </a>
            <?php endif; ?>           
        </div>
        <a class="voltar" href="index.php">Voltar</a>
    </div>        
</body>
</html>