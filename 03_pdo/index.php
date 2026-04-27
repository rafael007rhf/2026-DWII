<?php
/**
 * ════════════════════════════════════════════════════════════
 * ARQUIVO    : 03_pdo/index.php
 * Disciplina : Desenvolvimento Web II (2026-DWII)
 * Aula       : 05 — PHP + MariaDB: persistência de dados via PDO
 * Autor      : Murilo Néfi de Faria
 * ════════════════════════════════════════════════════════════
 */

$titulo_pagina = 'Catálogo de Tecnologias';
$pagina_atual  = 'catalogo';

require_once 'includes/conexao.php';

$categoria = trim($_GET['categoria'] ?? '');
$busca = trim($_GET['busca'] ?? '');

$stmtCategorias = $pdo->query('SELECT DISTINCT categoria FROM tecnologias ORDER BY categoria ASC');
$categorias = $stmtCategorias->fetchAll();

if ($categoria !== '' && $busca !== '') {
    $stmt = $pdo->prepare(
        'SELECT * FROM tecnologias
         WHERE categoria = :cat
           AND (nome LIKE :termo OR descricao LIKE :termo)
         ORDER BY nome ASC'
    );
    $stmt->execute([
        'cat' => $categoria,
        'termo' => '%' . $busca . '%',
    ]);
} elseif ($categoria !== '') {
    $stmt = $pdo->prepare('SELECT * FROM tecnologias WHERE categoria = :cat ORDER BY nome ASC');
    $stmt->execute(['cat' => $categoria]);
} elseif ($busca !== '') {
    $stmt = $pdo->prepare(
        'SELECT * FROM tecnologias
         WHERE nome LIKE :termo OR descricao LIKE :termo
         ORDER BY nome ASC'
    );
    $stmt->execute(['termo' => '%' . $busca . '%']);
} else {
    $stmt = $pdo->query('SELECT * FROM tecnologias ORDER BY nome ASC');
}

$tecnologias = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include 'includes/cab_pdo.php'; ?>
</head>
<body>
    <div class="container">
        <h1 class="titulo-secao">🗄️ Catálogo de Tecnologias</h1>

        <form class="filtros" action="index.php" method="get">
            <div>
                <label for="categoria">Categoria</label>
                <select id="categoria" name="categoria">
                    <option value="">Todas</option>
                    <?php foreach ($categorias as $item): ?>
                        <option value="<?php echo htmlspecialchars($item['categoria']); ?>"
                            <?php echo $categoria === $item['categoria'] ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($item['categoria']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <label for="busca">Busca</label>
                <input type="text" id="busca" name="busca" value="<?php echo htmlspecialchars($busca); ?>">
            </div>

            <button type="submit" class="btn">Filtrar</button>
            <a href="index.php" class="btn btn-secundario">Limpar</a>
        </form>

        <p class="contador"><?php echo count($tecnologias); ?> item(s) encontrado(s)</p>

        <div class="categorias-topo">
            <?php foreach ($categorias as $item): ?>
                <a class="tag-categoria" href="?categoria=<?php echo urlencode($item['categoria']); ?>">
                    <?php echo htmlspecialchars($item['categoria']); ?>
                </a>
            <?php endforeach; ?>
        </div>

        <?php foreach ($tecnologias as $tec): ?>
            <div class="card">
                <div class="card-topo">
                    <h3><?php echo htmlspecialchars($tec['nome']); ?></h3>
                    <span class="tag-categoria"><?php echo htmlspecialchars($tec['categoria']); ?></span>
                </div>
                <p><?php echo htmlspecialchars($tec['descricao']); ?></p>
                <a class="link-detalhe" href="detalhe.php?id=<?php echo $tec['id']; ?><?php echo $categoria !== '' ? '&categoria=' . urlencode($categoria) : ''; ?><?php echo $busca !== '' ? '&busca=' . urlencode($busca) : ''; ?>">
                    Ver detalhes →
                </a>
            </div>
        <?php endforeach; ?>
    </div>

    <?php include 'includes/rod_pdo.php'; ?>
</body>
</html>
