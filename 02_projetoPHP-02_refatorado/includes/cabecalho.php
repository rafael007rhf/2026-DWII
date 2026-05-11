<?php
/**
 * ════════════════════════════════════════════════════════════
 * Disciplina : Desenvolvimento Web II (DWII)
 * Projeto    : Portfólio Pessoal — versão refatorada
 * Arquivo    : includes/cabecalho.php
 * Autor      : Rafael Henrique Freire
 * Data       : 19/04/2026
 * Descrição  : Cabeçalho global do projeto.
 *              Responsabilidades:
 *              1. Iniciar sessão de forma segura (session_start)
 *              2. Gerar <meta>, <title> e <link> para o CSS
 *              3. Incluir nav.php (navegação condicional)
 *
 * Variáveis esperadas na página que inclui este arquivo:
 *   $titulo_pagina — string: texto da aba do navegador
 *   $caminho_raiz  — string: caminho relativo até a raiz ('.')
 *   $pagina_atual  — string: nome da página atual (para o nav)
 *                    Ex.: 'inicio' | 'sobre' | 'projetos' |
 *                         'contato' | 'catalogo' | 'login' | ''
 * ════════════════════════════════════════════════════════════
 */

// ── 1. Iniciar sessão de forma segura ────────────────────────
//
// session_status() retorna uma constante que indica o estado atual:
//   PHP_SESSION_NONE    → sem sessão ativa (podemos iniciar)
//   PHP_SESSION_ACTIVE  → sessão já ativa (NÃO chamar novamente)
//   PHP_SESSION_DISABLED→ sessões desabilitadas no servidor
//
// Verificar antes de chamar session_start() evita o erro:
//   "Notice: session_start(): Session already started"
// que ocorreria se uma página chamasse session_start() antes
// de incluir este cabecalho.

// ── 2. Fallbacks defensivos ──────────────────────────────────
// isset() verifica se a variável foi definida antes de usá-la.
// Se a página esquecer de declarar alguma variável, usamos
// um valor padrão seguro em vez de gerar avisos PHP.
if (!isset($titulo_pagina)) $titulo_pagina = 'Portfólio DWII';
if (!isset($caminho_raiz))  $caminho_raiz  = './';
if (!isset($pagina_atual))  $pagina_atual  = '';
?>
<!-- ── 3. Tags do <head> ──────────────────────────────────── -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo htmlspecialchars($titulo_pagina); ?></title>

<!--
  <link> aponta para o CSS usando $caminho_raiz.
  Como todas as páginas do projeto refatorado estão na raiz,
  $caminho_raiz será sempre './' → './includes/style.css'.
  O padrão único elimina a necessidade de ajustar caminhos
  conforme a profundidade da pasta.
-->
<link rel="stylesheet" href="<?php echo $caminho_raiz; ?>includes/estilo.css">

<?php
// ── 4. Incluir a navegação ───────────────────────────────────
// __DIR__ retorna o caminho absoluto do diretório deste arquivo.
// Usando __DIR__, o include funciona corretamente independente
// de qual página fez o include do cabecalho.php.
include __DIR__ . '/nav.php';
?>