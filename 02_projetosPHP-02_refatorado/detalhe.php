<?php


if (session_status() === PHP_SESSION_NONE) session_start();
$pagina_atual = 'catalogo';
$titulo_pagina = 'Detalhe | Portfólio DWII';
$caminho_raiz = './';

require_once __DIR__ . '/includes/conexao.php';
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id || $id <= 0) {
    header('Location: catalogo.php');
    exit;
}
$pdo = conectar();
$stmt = $pdo->prepare(
"SELECT * FROM tecnologias
WHERE id = :id
AND status = 'ativo'
LIMIT 1"
);
$stmt->execute([':id' => $id]);
$tec = $stmt->fetch();

if (!$tec) {
    header('Location: catalogo.php');
    exit;
}
$titulo_pagina = htmlspecialchars($tec['nome']) . ' | Portfólio DWII';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<?php include __DIR__ . '/includes/cabecalho.php'; ?>
</head>
<body>
<div class="container">
<a href="catalogo.php" class="btn-secundario"
style="display: inline-block; margin-bottom: 20px;">← Voltar ao catálogo</a>
<div class="card">
<div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 16px;">
<h1 class="titulo-secao" style="margin: 0;">
<?php echo htmlspecialchars($tec['nome']); ?>
</h1>
<span style="background: #e8edf5; color: #3b579d; padding: 4px 12px;
border-radius: 20px; font-size: 14px; white-space: nowrap; margin-left: 12px;">
<?php echo htmlspecialchars($tec['categoria']); ?>
</span>
</div>
<p><?php echo htmlspecialchars($tec['descricao']); ?></p>S
<p style="font-size: 13px; color: #6b7280; margin-top: 16px;">
🗓️ Cadastrado em:
<?php echo date('d/m/Y', strtotime($tec['criado_em'])); ?>
</p>
</div>
</div>

<?php include __DIR__ . '/includes/rodape.php'; ?>
</body>
</html>
