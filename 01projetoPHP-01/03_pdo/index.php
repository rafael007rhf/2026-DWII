<?php
    $titulo_pagina = "Catálogo de Tecnologias";
    $pagina_atual = "catalogo";
    
    require_once 'includes/conexao.php';

    // Capturar o filtro da URL (vazio se não existir)
    $categoria = trim($_GET['categoria'] ?? '');
    $busca = trim($_GET['busca'] ?? '');
    
    if ($busca) {

        $stmt = $pdo->prepare(
            "SELECT * FROM tecnologias 
            WHERE nome LIKE :termo1
            OR descricao LIKE :termo2
            ORDER BY nome"
        );

        $stmt->execute([
            'termo1' => "%$busca%",
            'termo2' => "%$busca%"
        ]);

    }elseif ($categoria) {
        // Com filtro — prepare() porque tem variável do usuário
        $stmt = $pdo->prepare(
            'SELECT * FROM tecnologias WHERE categoria = :cat ORDER BY nome'
        );
        $stmt->execute(['cat' => $categoria]);
    } else {
        // Sem filtro — query() porque não tem variável externa
        $stmt = $pdo->query('SELECT * FROM tecnologias ORDER BY nome');
    }
    $tecnologias = $stmt->fetchAll();
    $stmtCat = $pdo->query("SELECT DISTINCT categoria FROM tecnologias ORDER BY categoria");
    $categorias = $stmtCat->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include 'includes/cab_pdo.php'; ?>
</head>
<body>

    <div class="container">
        <h1 class="titulo-secao"> Catálogo de Tecnologias</h1>
        <p>
            <?php echo count($tecnologias); ?> tecnologia (s) cadastrada (s)
        </p>
        <form method="GET" style="margin-bottom:20px;">
            <input 
                type="text" 
                name="busca"
                placeholder="Buscar tecnologia..."
                value="<?php echo htmlspecialchars($busca); ?>">
            <button type="submit">Buscar</button>
        </form>
        <div class="filtros-categorias">
            <a href="index.php">Todas</a>

            <?php foreach ($categorias as $cat): ?>

                <a href="index.php?categoria=<?php echo urlencode($cat['categoria']); ?>">
                    <?php echo htmlspecialchars($cat['categoria']); ?>
                </a>

            <?php endforeach; ?>
        </div>
        <?php foreach ($tecnologias as $tec): ?>
        <div class="card">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h3><?php echo htmlspecialchars($tec['nome']); ?></h3>
                <span>
                    <?php echo htmlspecialchars($tec['categoria']); ?>
                </span>
            </div>
            <p><?php echo htmlspecialchars($tec['descricao']); ?></p>
            <a href="/03_pdo/detalhe.php?id=<?php echo $tec['id']; ?>">
                Ver detalhes
            </a>
        </div>
    <?php endforeach; ?>
    </div>
    <?php include 'includes/rod_pdo.php'; ?>
</body>
</html>