<?php
/**
 * ════════════════════════════════════════════════════════════
 * ARQUIVO    : 03_pdo/detalhe.php
 * Disciplina : Desenvolvimento Web II (2026-DWII)
 * Aula       : 05 — PHP + MariaDB: persistência de dados via PDO
 * Autor      : Murilo Néfi de Faria
 * ════════════════════════════════════════════════════════════
 */

$caminho_raiz = '../';

require_once 'includes/conexao.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$categoria = trim($_GET['categoria'] ?? '');
$busca = trim($_GET['busca'] ?? '');

if (!$id) {
    header('Location: index.php');
    exit;
}

$stmt = $pdo->prepare('SELECT * FROM tecnologias WHERE id = :id');
$stmt->execute(['id' => $id]);
$tec = $stmt->fetch();

if (!$tec) {
    include '404.php';
    exit;
}

$titulo_pagina = htmlspecialchars($tec['nome']) . ' — Catálogo';
$pagina_atual  = 'catalogo';

$query = [];
if ($categoria !== '') {
    $query['categoria'] = $categoria;
}
if ($busca !== '') {
    $query['busca'] = $busca;
}
$voltar = 'index.php';
if (!empty($query)) {
    $voltar .= '?' . http_build_query($query);
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include 'includes/cab_pdo.php'; ?>
</head>
<body>
    <div class="container">
        <a href="<?php echo htmlspecialchars($voltar); ?>" class="link-voltar">← Voltar ao catálogo</a>

        <div class="card detalhe-card">
            <div class="card-topo">
                <h1><?php echo htmlspecialchars($tec['nome']); ?></h1>
                <span class="tag-categoria"><?php echo htmlspecialchars($tec['categoria']); ?></span>
            </div>

            <p><?php echo htmlspecialchars($tec['descricao']); ?></p>

            <table class="tabela-detalhe">
                <tr>
                    <td>ID</td>
                    <td><?php echo $tec['id']; ?></td>
                </tr>
                <tr>
                    <td>Ano de criação</td>
                    <td><?php echo $tec['ano_criacao']; ?></td>
                </tr>
                <tr>
                    <td>Cadastrado em</td>
                    <td><?php echo date('d/m/Y \à\s H:i', strtotime($tec['criado_em'])); ?></td>
                </tr>
            </table>
        </div>
    </div>

    <?php include 'includes/rod_pdo.php'; ?>
</body>
</html>
