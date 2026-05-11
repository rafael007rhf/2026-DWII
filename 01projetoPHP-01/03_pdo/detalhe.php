<?php
    $caminho_raiz = '../';

    require_once 'includes/conexao.php';

    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    
    if (!$id) {
        header('Location: index.php');
        exit;
    }

    $stmt = $pdo->prepare('SELECT * FROM tecnologias WHERE id = :id');
    $stmt->execute(['id' => $id]);
    $tec = $stmt->fetch(); 

    if (!$tec) {
        require '404.php';
        exit;
    }
    

    $categoria = $_GET['categoria'] ?? '';
    $link_voltar = $categoria ? "index.php?categoria=" . urlencode($categoria) : "index.php";

    $titulo_pagina = htmlspecialchars ($tec['nome'] ) . " - Catalogo";
    $pagina_atual = "catalogo";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include 'includes/cab_pdo.php' ; ?>
</head>
<body>
    <div class="container">
        <a class="voltar" href="<?php echo $link_voltar; ?>">← Voltar ao catálogo</a>
        <div class="card">
            <div>
                <h1>
                    <?php echo htmlspecialchars ($tec['nome']) ; ?>
                </h1>
                <span>
                    <?php echo htmlspecialchars ($tec['categoria']) ; ?>
                </span>
            </div>
            <p>
                <?php echo htmlspecialchars ($tec['descricao']) ; ?>
            </p>
            <table>
                <tr>
                    <td>ID</td>
                    <td>
                        <?php echo htmlspecialchars($tec['id']) ; ?>
                    </td>
                </tr>
                <tr>
                    <td>Ano de criação</td>
                    <td>
                        <?php echo htmlspecialchars($tec['ano_criacao']); ?>
                    </td>
                </tr>
                <tr>
                    <td>Cadastrado em</td>
                    <td>
                        <?php echo date ('d/m/Y \\s H:i', strtotime ($tec ['criado_em'])) ; ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <?php include 'includes/rod_pdo.php' ; ?>
</body>
</html