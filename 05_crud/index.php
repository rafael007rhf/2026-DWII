<?php
/**
 * ════════════════════════════════════════════════════════════
 * ARQUIVO    : 05_crud/index.php
 * Autor      : Murilo Néfi de Faria
 * ════════════════════════════════════════════════════════════
 */

session_start();
require_once __DIR__ . '/includes/conexao.php';

$titulo_pagina = 'Meus Projetos';
$pagina_atual = '';
$caminho_raiz = '../';

$flash = $_SESSION['flash'] ?? '';
unset($_SESSION['flash']);

$pdo = conectar();
$busca = trim($_GET['busca'] ?? '');

if ($busca !== '') {
    $stmt = $pdo->prepare(
        'SELECT * FROM projetos
         WHERE nome LIKE :termo
            OR descricao LIKE :termo
            OR tecnologias LIKE :termo
         ORDER BY criado_em DESC'
    );
    $stmt->execute(['termo' => '%' . $busca . '%']);
} else {
    $stmt = $pdo->query('SELECT * FROM projetos ORDER BY criado_em DESC');
}

$projetos = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include '../includes/cabecalho.php'; ?>
</head>
<body>
    <div class="container">
        <h1 class="titulo-secao">📚 Meus Projetos</h1>

        <?php if ($flash !== ''): ?>
            <div class="alerta-sucesso"><p><?php echo htmlspecialchars($flash); ?></p></div>
        <?php endif; ?>

        <p>
            <a href="cadastrar.php" class="btn">+ Novo Projeto</a>
        </p>

        <form class="filtros" action="index.php" method="get">
            <div>
                <label for="busca">Buscar</label>
                <input type="text" id="busca" name="busca" value="<?php echo htmlspecialchars($busca); ?>"
                       placeholder="nome, descrição ou tecnologia">
            </div>
            <button type="submit" class="btn">Filtrar</button>
            <a href="index.php" class="btn btn-secundario">Limpar</a>
        </form>

        <p class="contador"><?php echo count($projetos); ?> projeto(s) encontrado(s)</p>

        <?php if (empty($projetos)): ?>
            <p>Nenhum projeto cadastrado ainda.</p>
        <?php endif; ?>

        <?php foreach ($projetos as $proj): ?>
            <div class="card">
                <div class="card-topo">
                    <h3><?php echo htmlspecialchars($proj['nome']); ?></h3>
                    <span class="tag-categoria"><?php echo (int)$proj['ano']; ?></span>
                </div>
                <p><?php echo htmlspecialchars($proj['descricao']); ?></p>
                <p><strong>Tecnologias:</strong> <?php echo htmlspecialchars($proj['tecnologias']); ?></p>
                <?php if (!empty($proj['link_github'])): ?>
                    <p>
                        <a class="link-detalhe" href="<?php echo htmlspecialchars($proj['link_github']); ?>" target="_blank" rel="noopener">
                            🔗 Repositório
                        </a>
                    </p>
                <?php endif; ?>
                <p style="margin-top:12px;">
                    <a href="editar.php?id=<?php echo (int)$proj['id']; ?>" class="btn btn-secundario">Editar</a>
                    <a href="excluir.php?id=<?php echo (int)$proj['id']; ?>" class="btn btn-secundario">Excluir</a>
                </p>
            </div>
        <?php endforeach; ?>
    </div>
    <?php include '../includes/rodape.php'; ?>
</body>
</html>
