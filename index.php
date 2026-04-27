<?php
/**
 * ════════════════════════════════════════════════════════════
 * ARQUIVO    : index.php
 * Disciplina : Desenvolvimento Web II (2026-DWII)
 * Autor      : Murilo Néfi de Faria
 * ════════════════════════════════════════════════════════════
 */

$nome = "Murilo Néfi de Faria";
$subtitulo = "Repositório 2026 - Desenvolvimento Web II";

$aulas = [
  ["numero"=>"00","nome"=>"Apresentação Pessoal","descricao"=>"Página estática com HTML e CSS com foto de perfil e layout responsivo.","link"=>"00_apresentacao/index.html","icone"=>"👤","cor"=>"#667280","conceitos"=>"HTML semântico, CSS Flexbox, responsividade"],
  ["numero"=>"03","nome"=>"Portfólio Dinâmico com PHP","descricao"=>"Mini-site de portfólio com variáveis, includes e menu dinâmico.","link"=>"01_php-intro/index.php","icone"=>"💻","cor"=>"#3b579d","conceitos"=>"Variáveis, echo, include, foreach, operador ternário"],
  ["numero"=>"04","nome"=>"Formulário de Contato","descricao"=>"Formulário com validação no servidor, proteção XSS e padrão PRG.","link"=>"02_formularios/contato.php","icone"=>"📩","cor"=>"#3ba34a","conceitos"=>"\$_POST, validação, htmlspecialchars(), header() + exit"],
];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($nome); ?> — Portfólio DWII</title>
    <style>
        :root {
            --bg: #fdfcf7;
            --texto: #1f1d2b;
            --secundaria: #5c5870;
            --destaque: #c9543a;
            --linha: #e6e1d3;
            --card: #ffffff;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Georgia', 'Times New Roman', serif;
            background: var(--bg);
            color: var(--texto);
            line-height: 1.7;
            min-height: 100vh;
        }
        header {
            padding: 80px 24px 60px;
            text-align: center;
            border-bottom: 3px double var(--linha);
            background: var(--bg);
        }
        header h1 {
            font-size: 2.6em;
            letter-spacing: -0.5px;
            margin-bottom: 12px;
            color: var(--texto);
        }
        header p {
            color: var(--secundaria);
            font-style: italic;
            font-size: 1.15em;
        }
        main {
            max-width: 980px;
            margin: 60px auto;
            padding: 0 24px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(290px, 1fr));
            gap: 28px;
        }
        .card-aula {
            background: var(--card);
            border: 1px solid var(--linha);
            padding: 28px;
            border-radius: 4px;
            transition: transform 0.2s, box-shadow 0.2s;
            display: flex;
            flex-direction: column;
        }
        .card-aula:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 18px rgba(31,29,43,0.12);
        }
        .card-aula .icone {
            font-size: 2.4em;
            margin-bottom: 12px;
        }
        .card-aula .numero {
            font-family: 'Courier New', monospace;
            font-size: 0.85em;
            color: var(--destaque);
            letter-spacing: 2px;
            margin-bottom: 6px;
        }
        .card-aula h2 {
            font-size: 1.35em;
            margin-bottom: 12px;
        }
        .card-aula p {
            color: var(--secundaria);
            margin-bottom: 14px;
            flex-grow: 1;
        }
        .conceitos {
            font-size: 0.85em;
            color: var(--secundaria);
            border-top: 1px dotted var(--linha);
            padding-top: 12px;
            margin-bottom: 16px;
            font-style: italic;
        }
        .abrir {
            display: inline-block;
            padding: 10px 20px;
            background: var(--texto);
            color: var(--bg);
            text-decoration: none;
            border-radius: 2px;
            font-size: 0.9em;
            letter-spacing: 1px;
            text-transform: uppercase;
            align-self: flex-start;
        }
        .abrir:hover { background: var(--destaque); }
        footer {
            border-top: 3px double var(--linha);
            padding: 30px 20px;
            text-align: center;
            color: var(--secundaria);
            font-size: 0.95em;
            margin-top: 60px;
        }
    </style>
</head>
<body>
    <header>
        <h1><?php echo htmlspecialchars($nome); ?></h1>
        <p><?php echo htmlspecialchars($subtitulo); ?></p>
    </header>

    <main>
        <?php foreach ($aulas as $aula): ?>
            <article class="card-aula" style="border-top: 4px solid <?php echo htmlspecialchars($aula['cor']); ?>;">
                <span class="icone"><?php echo $aula['icone']; ?></span>
                <span class="numero">Aula <?php echo htmlspecialchars($aula['numero']); ?></span>
                <h2><?php echo htmlspecialchars($aula['nome']); ?></h2>
                <p><?php echo htmlspecialchars($aula['descricao']); ?></p>
                <p class="conceitos"><?php echo htmlspecialchars($aula['conceitos']); ?></p>
                <a class="abrir" href="<?php echo htmlspecialchars($aula['link']); ?>">Abrir</a>
            </article>
        <?php endforeach; ?>
    </main>

    <footer>
        <?php echo htmlspecialchars($nome); ?> &copy; <?php echo date("Y"); ?> | IFPR — Ponta Grossa
    </footer>
</body>
</html>
