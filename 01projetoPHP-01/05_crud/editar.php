<?php
    require_once __DIR__ . '/../04_sessoes/includes/auth.php'; 
    requer_login();

    require_once __DIR__ . '/includes/conexao.php';

    $id = (int) ($_GET['id'] ?? 0);

    if ($id <= 0) {
        header('Location: index.php?erro=id_invalido');
        exit;
    }


    $pdo = conectar();
    $stmt = $pdo->prepare('SELECT * FROM projetos WHERE id=:id');
    $stmt->execute([':id' => $id]);
    $projeto = $stmt->fetch();

    if (!$projeto) {
        header('Location: index.php?erro=nao_encontrado');
        exit;
    }

    $erro = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = trim($_POST['nome'] ?? '');
    $descricao = trim($_POST['descricao'] ?? '');
    $tecnologias = trim($_POST['tecnologias'] ?? '');
    $link_github = trim($_POST['link_github'] ?? '');
    $ano = (int) ($_POST['ano'] ?? date('Y'));
    
    $anoAtual = date('Y');

    if ($nome === '' || $descricao === '' || $tecnologias === ''){
        $erro = 'Preencha todos os campos obrigatórios.';
    } elseif ($ano < 2000 || $ano > $anoAtual) {
        $erro = 'O ano deve estar entre 2000 e ' . $anoAtual . '.';
    }

    if ($erro === '') {
   
    $sql = 'UPDATE projetos
    SET nome = :nome,
        descricao = :descricao,
        tecnologias = :tecnologias,
        link_github = :link_github,
        ano = :ano
    WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
    ':nome' => $nome,
    ':descricao' => $descricao,
    ':tecnologias' => $tecnologias,
    ':link_github' => $link_github !== '' ? $link_github : null,
    ':ano' => $ano,
    ':id' => $id,
    ]);
    
    header('Location: index.php?editado=ok');
    exit;
    }

    
    $projeto ['nome'] = $nome;
    $projeto ['descricao'] = $descricao;
    $projeto ['tecnologias'] = $tecnologias;
    $projeto ['link_github'] = $link_github;
    $projeto ['ano'] = $ano;
    }
    $titulo_pagina = 'Editar Projeto Portfólio';
    $caminho_raiz = '../';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php require_once __DIR__ . '/../includes/cabecalho.php'; ?>
</head>
<body>
    <div class="container">
        <h1 class="titulo-secao"> Editar Projeto</h1>
        <?php if ($erro): ?>
            <div class="alerta-erro">
                <p style="margin: 0;"> <?php echo htmlspecialchars
                ($erro); ?></p>
            </div>
        <?php endif; ?>
        <div class= "form-container">
            <form action="editar.php?id=<?php echo $id; ?>" method="post">
                    <label>Nome do Projeto *</label>
                    <input type="text" name="nome" value="<?php echo htmlspecialchars($projeto['nome']); ?>">
               
                    <label>Descrição *</label>
                    <textarea name="descricao" rows="4"><?php echo htmlspecialchars($projeto['descricao']); ?></textarea>
               
                    <label>Tecnologias *</label>
                    <input type="text" name="tecnologias" value="<?php echo htmlspecialchars($projeto['tecnologias']); ?>">
                
                    <label>Link GitHub (opcional)</label>
                    <input type="url" name="link_github" value="<?php echo htmlspecialchars($projeto ['link_github'] ?? ''); ?>">
            
                    <label>Ano *</label>
                    <input type="number" name="ano" value="<?php echo (int) $projeto ['ano']; ?>" min="2000" max="2099">
                </div>
                <div>
                    <button type="submit" class="btn-primario">Salvar</button>
                    <a href="index.php" class="voltar">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
    <?php require_once __DIR__ . '/../includes/rodape.php'; ?>
</body>
</html>