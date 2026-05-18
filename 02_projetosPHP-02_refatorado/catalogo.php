<?php




if (session_status() === PHP_SESSION_NONE) session_start();

$pagina_atual = 'catalogo';
$titulo_pagina = 'Catálogo de Tecnologias | Portfólio DWII';
$caminho_raiz = './';

require_once __DIR__ . '/includes/conexao.php';
$pdo = conectar();
$stmt = $pdo->query(
"SELECT * FROM tecnologias
WHERE status = 'ativo'
ORDER BY nome ASC"
);
$tecnologias = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>

<?php
include __DIR__ . '/includes/cabecalho.php';
?>
</head>
<body>
<div class="container">
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
<h1 class="titulo-secao" style="margin: 0;">🗄️ Catálogo de Tecnologias</h1>
<span style="color: #6b7280; font-size: 14px;">
<?php echo count($tecnologias); ?> tecnologia(s)
</span>
</div>

<?php if (empty($tecnologias)): ?>

<div class="card" style="text-align: center; padding: 40px 20px; color: #6b7280;">
    <p style="font-size: 40px; margin: 0 0 12px;">📭</p>
    <p style="font-size: 16px; margin: 0;">Nenhuma tecnologia ativa.</p>
</div>

<?php else: ?>
<?php foreach ($tecnologias as $tec): ?>
<div class="card">
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
<h3 style="margin: 0;">
<?php

echo htmlspecialchars($tec['nome']);
?>
</h3>
<span style="background: #e8edf5; color: #3b579d; padding: 3px 10px;
border-radius: 20px; font-size: 13px; white-space: nowrap;">
<?php echo htmlspecialchars($tec['categoria']); ?>
</span>
</div>
<p style="margin: 0 0 10px;">
    <?php echo htmlspecialchars($tec['descricao']); ?>
</p>

<a href="detalhe.php?id=<?php echo (int) $tec['id']; ?>"
class="btn-secundario">Ver detalhes →</a>
</div>

<?php endforeach; ?>
<?php endif; ?>
</div>
<?php include __DIR__ . '/includes/rodape.php'; ?>
</body>
</html>
