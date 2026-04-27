<?php
/**
 * ════════════════════════════════════════════════════════════
 * ARQUIVO    : 05_crud/excluir.php
 * Autor      : Murilo Néfi de Faria
 * ════════════════════════════════════════════════════════════
 */

session_start();
require_once __DIR__ . '/includes/conexao.php';

$titulo_pagina = 'Excluir Projeto';
$pagina_atual = '';
$caminho_raiz = '../';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
}

if (!$id) {
    header('Location: index.php');
    exit;
}

$pdo = conectar();
$stmt = $pdo->prepare('SELECT * FROM projetos WHERE id = :id');
$stmt->execute(['id' => $id]);
$projeto = $stmt->fetch();

if (!$projeto) {
    $_SESSION['flash'] = 'Projeto não encontrado.';
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare('DELETE FROM projetos WHERE id = :id');
    $stmt->execute(['id' => $id]);

    $_SESSION['flash'] = 'Projeto "' . $projeto['nome'] . '" excluído com sucesso!';
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include '../includes/cabecalho.php'; ?>
</head>
<body>
    <div class="container">
        <a href="index.php" class="link-voltar">← Voltar à lista</a>
        <h1 class="titulo-secao">🗑️ Excluir Projeto</h1>

        <div class="alerta-erro">
            <p>
                Tem certeza que deseja excluir o projeto
                <strong>"<?php echo htmlspecialchars($projeto['nome']); ?>"</strong>?
                Esta ação não pode ser desfeita.
            </p>
        </div>

        <table class="tabela-detalhe">
            <tr>
                <td>Nome</td>
                <td><?php echo htmlspecialchars($projeto['nome']); ?></td>
            </tr>
            <tr>
                <td>Descrição</td>
                <td><?php echo htmlspecialchars($projeto['descricao']); ?></td>
            </tr>
            <tr>
                <td>Tecnologias</td>
                <td><?php echo htmlspecialchars($projeto['tecnologias']); ?></td>
            </tr>
            <tr>
                <td>Ano</td>
                <td><?php echo (int)$projeto['ano']; ?></td>
            </tr>
        </table>

        <form action="excluir.php" method="post" style="margin-top:24px;">
            <input type="hidden" name="id" value="<?php echo (int)$id; ?>">
            <button type="submit" class="btn">Confirmar exclusão</button>
            <a href="index.php" class="btn btn-secundario">Cancelar</a>
        </form>
    </div>
    <?php include '../includes/rodape.php'; ?>
</body>
</html>
