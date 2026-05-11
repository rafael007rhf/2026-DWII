<?php
    require_once __DIR__ . '/05_crud/includes/conexao.php';
    
    
    $pdo = conectar();
    $busca = $_GET['busca'] ?? '';
    $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

    if ($pagina < 1) {
        $pagina = 1;
    }

    $limite = 3;
    $offset = ($pagina - 1) * $limite;

    if ($busca != '') {
        $stmtTotal = $pdo->prepare("SELECT COUNT(*) FROM projetos WHERE nome LIKE :busca");
        $stmtTotal->bindValue(':busca', "%$busca%");
        $stmtTotal->execute();
        $total = $stmtTotal->fetchColumn();
    } else {
        $total = $pdo->query("SELECT COUNT(*) FROM projetos")->fetchColumn();
    }

    $sql = "SELECT * FROM projetos";

    if ($busca != '') {
        $sql .= " WHERE nome LIKE :busca";
    }

    $sql .= " ORDER BY criado_em DESC LIMIT :limite OFFSET :offset";

    $stmt = $pdo->prepare($sql);

    if ($busca != '') {
        $stmt->bindValue(':busca', "%$busca%");
    }
    $stmt->bindValue(':limite', $limite, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();

    $projetos = $stmt->fetchAll();


    $cadastroOk = isset($_GET['cadastro']) && $_GET['cadastro'] === 'ok';
    $editadoOk = isset($_GET['editado']) && $_GET['editado'] === 'ok';
    $excluidoOk = isset($_GET['excluido']) && $_GET['excluido'] === 'ok';
    $erroMsg = '';

    if (isset($_GET['erro'])) {
        if ($_GET['erro'] === 'nao_encontrado') {
            $erroMsg = 'Projeto não encontrado';
        } elseif ($_GET['erro'] === 'id_invalido') {
            $erroMsg = 'ID inválido';
        } else {
            $erroMsg = 'Ocorreu um erro';
        }
    }

    $titulo_pagina = 'Meus Projetos - Portfólio';
    $caminho_raiz = './';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php require_once __DIR__ . '/includes/cabecalho.php'; ?>
</head>
<body>
    <div class="container">
        <div>
            <h1>Meus Projetos</h1>
            <form method="GET">
                <input type="text" name="busca" placeholder="Buscar...">
                <button type="submit">Buscar</button>
            </form>
        </div>
        <?php if ($erroMsg): ?>
            <div class="alerta-erro">
                <?php echo htmlspecialchars($erroMsg); ?>
            </div>
        <?php endif; ?>       
        <?php if (empty($projetos)): ?>
            <div class="card">
                <p>Nenhum projeto cadastrado ainda.</p>
            </div>
        <?php else: ?>
            <div>
                <?php foreach ($projetos as $projeto): ?>
                    <div class="card">
                        <h3>
                            <?php echo htmlspecialchars($projeto['nome']); ?>
                        </h3>
                        <p>
                            <?php echo htmlspecialchars($projeto['tecnologias']); ?>
                        </p>
                        <a class="detalhes" href="detalhe.php?id=<?php echo (int)$projeto['id']; ?>">
                            Ver detalhes
                        </a>
                        <?php if ($projeto ['link_github']): ?>
                            <a href="<?php echo htmlspecialchars($projeto['link_github']); ?>" target="_blank" class="voltar">
                                Ver no GitHub
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="paginacao">
                <?php if ($pagina > 1): ?>
                    <a href="?pagina=<?php echo $pagina - 1; ?>" class="btn-pag">⬅ Anterior</a>
                <?php endif; ?>

                <?php if ($offset + $limite < $total): ?>
                    <a href="?pagina=<?php echo $pagina + 1; ?>" class="btn-pag proximo">Próximo ➡</a>
                <?php endif; ?>
            </div>
            <p>
                <?php echo count($projetos); ?> projeto(s) cadastrado(s)
            </p>
        <?php endif; ?>
    </div>
    <?php require_once __DIR__ . '/includes/rodape.php'; ?>
</body>
</html>