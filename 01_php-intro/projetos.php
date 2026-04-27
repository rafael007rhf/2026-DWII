<?php
/**
 * ════════════════════════════════════════════════════════════
 * ARQUIVO    : 01_php-intro/projetos.php
 * Disciplina : Desenvolvimento Web II (2026-DWII)
 * Autor      : Murilo Néfi de Faria
 * ════════════════════════════════════════════════════════════
 */

$nome          = 'Murilo Néfi de Faria';
$pagina_atual  = 'projetos';
$titulo_pagina = 'Projetos – ' . $nome;
$caminho_raiz  = '../';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include '../includes/cabecalho.php'; ?>
</head>
<body>
    <div class="container">
        <h1 class="titulo-secao">📁 Meus Projetos</h1>

        <h2>Página de Apresentação Pessoal</h2>
        <p>
            Primeira atividade prática, feita apenas com HTML e CSS. Inclui foto,
            uma seção de bio com texto curto e layout responsivo para celular.
            Serviu como base para experimentar Flexbox e propriedades de tipografia.
        </p>

        <h2>Portfólio Modular em PHP</h2>
        <p>
            Versão dinâmica do portfólio, separada em páginas (Início, Sobre, Projetos)
            e reaproveitando cabeçalho, navegação e rodapé via <code>include</code>.
            Aqui comecei a usar variáveis, foreach e operador ternário no PHP.
        </p>

        <h2>Formulário de Contato com Validação</h2>
        <p>
            Mini-aplicação que recebe nome, e-mail, assunto e mensagem, valida tudo
            do lado do servidor, escapa HTML para evitar XSS e segue o padrão
            Post/Redirect/Get para evitar reenvio ao recarregar a página.
        </p>

        <h2>Catálogo de Tecnologias com PDO</h2>
        <p>
            Página que conecta no MariaDB via PDO, lista tecnologias cadastradas e
            permite filtrar por categoria e busca livre. Usei prepared statements
            para não correr risco de SQL injection.
        </p>

        <h2>CRUD de Projetos</h2>
        <p>
            Aplicação completa para cadastrar, listar, editar e excluir registros
            de projetos no banco de dados, com mensagens flash, busca e validação
            tanto na criação quanto na edição.
        </p>
    </div>

    <?php include '../includes/rodape.php'; ?>
</body>
</html>
