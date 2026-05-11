<?php
    require_once __DIR__ . '/../04_sessoes/includes/auth.php';
    requer_login();

    require_once __DIR__ . '/includes/conexao.php';
    $erro = '';
    $sucesso = '';

    $form = [
        'nome' => '',
        'descricao' => '',
        'tecnologias' => '',
        'link_github' => '',
        'ano' => date('Y'),
    ];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $form['nome'] = trim($_POST['nome'] ?? '');
        $form['descricao'] = trim($_POST['descricao'] ?? '');
        $form['tecnologias'] = trim($_POST['tecnologias'] ?? '');
        $form['link_github'] = trim($_POST['link_github'] ?? '');
        $form['ano'] = (int) ($_POST['ano'] ?? date ('Y'));
        
        if ($form['nome'] === '') {
            $erro = 'O nome do projeto é obrigatório.';
        } elseif ($form['descricao'] === '') {
            $erro = 'A descrição é obrigatória.';
        } elseif ($form['tecnologias'] === '') {
            $erro = 'Informe ao menos uma tecnologia.';
        } elseif ($form['ano'] < 2000 || $form['ano'] > (int) date ('Y') + 1) {
            $erro = 'Ano inválido.';
        }

        if ($erro === '') {
            $pdo = conectar();
            $sql = 'INSERT INTO projetos (nome, descricao, tecnologias, link_github, ano)
                    VALUES (:nome, :descricao, :tecnologias, :link_github, :ano)';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':nome' => $form['nome'],
                ':descricao' => $form['descricao'], 
                ':tecnologias' => $form['tecnologias'],
                ':link_github' => $form['link_github'] !== '' ? $form['link_github']: null,
                ':ano' => $form['ano'],
            ]);
            header('Location: index.php?cadastro=ok');
            exit;
        }
    }
    $titulo_pagina = 'Cadastrar Projeto - Portfólio';
    $caminho_raiz = '../';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php require_once __DIR__ . '/../includes/cabecalho.php'; ?>
</head>
<body>
    <div class="container">
        <h1>+ Cadastrar Novo Projeto</h1>
        <?php if ($erro): ?>
            <div>
                <p> <?php echo htmlspecialchars($erro); ?></p>
            </div>
        <?php endif; ?>
        <div class="form-container">
            <form action="cadastrar.php" method="post">
                <label for="nome">Nome do Projeto: <span">*</span></label>
                <input type="text"
                        id="nome"
                        name="nome"
                        value="<?php echo htmlspecialchars($form['nome']); ?>"
                        placeholder="Ex.: Sistema de Login com PHP" maxlength="120">

                <label for="descricao">Descrição: <span>*</span></label>
                <textarea id="descricao"
                            name="descricao"
                            rows="4"
                            placeholder="Descreva o projeto em 2-3 frases..."><?php echo htmlspecialchars($form ['descricao']); ?></textarea>
                <label for="tecnologias">Tecnologias usadas: <span>*</span></label>
                <input type="text"
                        id="tecnologias"
                        name="tecnologias"
                        value="<?php echo htmlspecialchars($form['tecnologias']); ?>"
                        placeholder="Ex.: PHP, MariaDB, HTML, CSS"
                        maxlength="200">
                <label for="link_github">Link do GitHub: <span>(opcional)</span></label>
                <input type="url"
                        id="link_github"
                        name="link_github"
                        value="<?php echo htmlspecialchars($form ['link_github']); ?>"
                        placeholder="https://github.com/usuario/repositorio">
                <label for="ano">Ano: <span>*</span></label>
                <input type="number"
                        id="ano"
                        name="ano"
                        value="<?php echo htmlspecialchars($form
                        ['ano']); ?>"
                        min="2000"
                        max="<?php echo date('Y') + 1; ?>">
                <button type="submit">Salvar Projeto</button>
            </form>
        </div>
        <p>
            <a class="voltar" href="index.php">Voltar à listagem</a>
        </p>
    </div>
    <?php require_once __DIR__ . '/../includes/rodape.php'; ?>
</body>
</html>