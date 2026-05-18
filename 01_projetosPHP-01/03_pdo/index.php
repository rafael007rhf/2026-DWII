<<<<<<< HEAD
<?php echo 'PDO funcionando'; ?>
=======
<?php

$titulo_pagina = "Catálogo de Tecnologias";
$pagina_atual  = "catalogo";
require_once 'includes/conexao.php';
$busca = trim($_GET['busca'] ?? '');
$categoria = trim($_GET['categoria'] ?? '');
$cats = $pdo->query("SELECT DISTINCT categoria FROM tecnologias ORDER BY categoria")->fetchAll();
$sql = "SELECT * FROM tecnologias WHERE 1=1";
$params = [];

if ($busca) {
    $sql .= " AND (nome LIKE :termo1 OR descricao LIKE :termo2)";
    $params['termo1'] = "%$busca%";
    $params['termo2'] = "%$busca%";
}

if ($categoria) {
    $sql .= " AND categoria = :cat";
    $params['cat'] = $categoria;
}

$sql .= " ORDER BY nome ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$tecnologias = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include 'includes/cab_pdo.php'; ?>
    <link rel="stylesheet" href="../includes/style.css">
</head>
<body>
    <div class="container">
        <h1 class="titulo-secao">🗄️ Catálogo de Tecnologias</h1>
        <form method="GET" style="margin-bottom: 20px;">
    <input type="text" name="busca" placeholder="Buscar tecnologia..."
        value="<?php echo htmlspecialchars($busca); ?>"
        style="padding: 8px; width: 250px;">

    <button type="submit">Buscar</button>
</form>
<div style="margin-bottom: 20px;">
    <strong>Categorias:</strong>

    <a href="index.php">Todas</a>

    <?php foreach ($cats as $c): ?>
        | <a href="?categoria=<?php echo urlencode($c['categoria']); ?>&busca=<?php echo urlencode($busca); ?>">
            <?php echo htmlspecialchars($c['categoria']); ?>
        </a>
    <?php endforeach; ?>
</div>

        <p style="color: #6b7280; margin-bottom: 20px">
            <?php echo count($tecnologias); ?> item(s) encontrado(s)

</p>
    <?php foreach ($tecnologias as $tec): ?>
        <div class="card">
        <div style="display: flex; justify-content: space-between; align-items: center;">
        <h3><?php echo htmlspecialchars($tec['nome']); ?></h3>
        <span style="background: #e8edf5; color: #3b579d; padding: 3px 10px;
        border-radius: 20px; font-size: 13px;">
        <?php echo htmlspecialchars($tec['categoria']); ?>
    </span>
    </div>
    <p><?php echo htmlspecialchars($tec['descricao']); ?></p>
    <a href="detalhe.php?id=<?php echo $tec['id']; ?>&categoria=<?php echo urlencode($categoria); ?>&busca=<?php echo urlencode($busca); ?>"
    style="color: #3b579d; font-size: 14px; font-weight: bold; display: inline-block; margin-top: 10px;">
    Ver detalhes →
</a>
    </div>
    <?php endforeach; ?>
    </div>

    <?php include 'includes/rod_pdo.php'; ?>

</body>
</html>
>>>>>>> 7e8a38318de1c5bbbc7b498d61e39e12fd531cfc
