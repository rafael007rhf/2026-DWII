<?php
/**
 * ════════════════════════════════════════════════════════════
 * ARQUIVO    : 05_crud/editar.php
 * Autor      : Murilo Néfi de Faria
 * ════════════════════════════════════════════════════════════
 */

session_start();
require_once __DIR__ . '/includes/conexao.php';

$titulo_pagina = 'Editar Projeto';
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

$nome = $projeto['nome'];
$descricao = $projeto['descricao'];
$tecnologias = $projeto['tecnologias'];
$link_github = $projeto['link_github'] ?? '';
$ano = (int)$projeto['ano'];
$erros = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $descricao = trim($_POST['descricao'] ?? '');
    $tecnologias = trim($_POST['tecnologias'] ?? '');
    $link_github = trim($_POST['link_github'] ?? '');
    $ano = (int)($_POST['ano'] ?? 0);

    if ($nome === '') $erros[] = 'O nome do projeto é obrigatório.';
    elseif (strlen($nome) > 120) $erros[] = 'O nome deve ter no máximo 120 caracteres.';

    if ($descricao === '') $erros[] = 'A descrição é obrigatória.';

    if ($tecnologias === '') $erros[] = 'Informe ao menos uma tecnologia.';
    elseif (strlen($tecnologias) > 200) $erros[] = 'Tecnologias deve ter no máximo 200 caracteres.';

    if ($link_github !== '' && !filter_var($link_github, FILTER_VALIDATE_URL)) {
        $erros[] = 'Informe um link válido para o repositório.';
    }

    if ($ano < 2000 || $ano > (int)date('Y') + 1) {
        $erros[] = 'Informe um ano válido (entre 2000 e ' . ((int)date('Y') + 1) . ').';
    }

    if (empty($erros)) {
        $stmt = $pdo->prepare(
            'UPDATE projetos
             SET nome = :nome,
                 descricao = :descricao,
                 tecnologias = :tecnologias,
                 link_github = :link_github,
                 ano = :ano
             WHERE id = :id'
        );
        $stmt->execute([
            'nome' => $nome,
            'descricao' => $descricao,
            'tecnologias' => $tecnologias,
            'link_github' => $link_github !== '' ? $link_github : null,
            'ano' => $ano,
            'id' => $id,
        ]);

        $_SESSION['flash'] = 'Projeto "' . $nome . '" atualizado com sucesso!';
        header('Location: index.php');
        exit;
    }
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
        <h1 class="titulo-secao">✏️ Editar Projeto</h1>

        <?php if (!empty($erros)): ?>
            <div class="alerta-erro">
                <strong>Corrija os seguintes itens:</strong>
                <ul class="lista-erros">
                    <?php foreach ($erros as $erro): ?>
                        <li>• <?php echo htmlspecialchars($erro); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form class="formulario" action="editar.php" method="post">
            <input type="hidden" name="id" value="<?php echo (int)$id; ?>">

            <label for="nome">Nome do projeto</label>
            <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($nome); ?>" maxlength="120">

            <label for="descricao">Descrição</label>
            <textarea id="descricao" name="descricao" rows="4"><?php echo htmlspecialchars($descricao); ?></textarea>

            <label for="tecnologias">Tecnologias</label>
            <input type="text" id="tecnologias" name="tecnologias"
                   value="<?php echo htmlspecialchars($tecnologias); ?>" maxlength="200">

            <label for="link_github">Link do repositório (opcional)</label>
            <input type="url" id="link_github" name="link_github"
                   value="<?php echo htmlspecialchars($link_github); ?>">

            <label for="ano">Ano</label>
            <input type="number" id="ano" name="ano" value="<?php echo (int)$ano; ?>"
                   min="2000" max="<?php echo (int)date('Y') + 1; ?>">

            <button type="submit" class="btn">Atualizar</button>
        </form>
    </div>
    <?php include '../includes/rodape.php'; ?>
</body>
</html>
