<?php
$nome = "Rafael Freire";
$subtitulo = "Repositório 2026 - Desenvolvimento Web II";

$aulas = [
    [
    "numero"    => "00",
    "nome"      => "Apresentacao Pessoal",
    "descricao" => "Página estática com HTML e CSS - foto de perfil e layout responsivo",
    "link"      => "00_apresentacao/index.html",
    "icone"     => "👨‍💻",
    "cor"       => "#6b7280",
    "conceitos" => "HTML semântico, CSS Flexbox, responsividade",
    ],
    [
    "numero"    => "03",
    "nome"      => "Portofólio Dinâmico com PHP",
    "descricao" => "Mini-site de portfólio com variáveis, includes e menu dinâmico",
    "link"      => "01_php-intro/index.php",
    "icone"     => "🐘",
    "cor"       => "#3b579d",
    "conceitos" => "Variáveis, echo, include, foreach, operador ternário",
    ],
    [
    "numero"    => "04",
    "nome"      => "Formulário de contato",
    "descricao" => "Formulário com validação no servidor, proteção XSS e padrão PRG.",
    "link"      => "02_formularios/contato.php",
    "icone"     => "📬",
    "cor"       => "#ffb2df",
    "conceitos" => '$_POST, validação, htmlspecialchars(), header() + exit',
    ],
];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($subtitulo); ?></title>
    <link rel="stylesheet" href="includes/style.css">
</head>
<body>
    <header>
        <h1><?php echo htmlspecialchars($nome); ?> 👨‍💻 </h1>
        <p><?php echo htmlspecialchars($subtitulo); ?></p>
    </header>

    <div class="container">
        <div class="box-info" style="margin-top: 0;">
            <h3>▶️ Como executar este repositório</h3>
            <p style="font-size: 14px; color: #374151;">
                Suba o servidor PHP na <strong>raiz</strong> para acessar todas as aulas:
</p>
<div style="background: #010000; color: #a8e6a3; padding: 10px 16px;
border-radius: 6px; margin-top: 10px; font-family: 'Courier New', monospace;
font-size: 13px; line-height: 1.8;">
    cd ~/workspaces/2026-DWII<br>php -S localhost:8000
    </div>
    <p style="font-size: 13px; color: #6b7280; margin-top: 8px;">
    Esta página é o hub de navegação. Use os botões abaixo para acessar cada projeto.
</p>
</div>

<h2 class="secao">📂 Projetos por Aula</h2>

<?php foreach ($aulas as $aula): ?>
    <div class="card-aula"
    style="border-left-color: <?php echo $aula['cor']; ?>;">

    <div class="icone"><?php echo $aula['icone']; ?></div>

    <div class="conteudo">
        <span class="badge">Aula <?php echo htmlspecialchars($aula['numero']); ?>
</span>
        <h3 style="color: <?php echo $aula['cor']; ?>;">
            <?php echo htmlspecialchars($aula['nome']); ?>
</h3>
<p><?php echo htmlspecialchars($aula['descricao']); ?></p>
<span class="conceitos">
    <?php echo htmlspecialchars($aula['conceitos']); ?>
</span><br>
<a href="<?php echo htmlspecialchars($aula['link']); ?>"
class="btn"
style="background: <?php echo $aula['cor']; ?>;">
Abrir →
</a>
</div>


</div>
<?php endforeach; ?>

<p style="text-align: right; font-size: 13px; color: #9ca3af; margin-top: 8px;">
    🕑 Gerado em: <?php echo date("09/03/2026 \à\s 17:30:26"); ?>
</p>

</div>

<footer>
    <?php echo htmlspecialchars($nome); ?>
    &copy; <?php echo date("2026"); ?>
    | Desenvolvido com PHP | IFPR - Ponta Grossa
</footer>

</body>
</html>