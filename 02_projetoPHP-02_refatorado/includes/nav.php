 <?php
 /**
 * ════════════════════════════════════════════════════════════
 * Disciplina : Desenvolvimento Web II (DWII)
 * Projeto    : Portfólio Pessoal — versão refatorada
 * Arquivo    : includes/nav.php
 * Autor      : Rafael Henrique Freire
 * Data       : 19/04/2026
 * Descrição  : Navegação global condicional do projeto.
 *              Links públicos: sempre visíveis.
 *              Links restritos (Painel, Sair): visíveis apenas
 *              quando o usuário está autenticado ($_SESSION).
 *              Link de Login: visível apenas quando NÃO autenticado.
 * ════════════════════════════════════════════════════════════
 */
  if (!isset($pagina_atual)) $pagina_atual = "";
  if (!isset($caminho_raiz)) $caminho_raiz = "./";

  function menu_class (string $item,string $atual): string{
    return ($item===$atual) ? 'class="ativo"' : '';
  } 
  $logado = isset($_SESSION['usuario']);
?>
  
<nav>
  <a href="<?php echo $caminho_raiz; ?>index.php"
    <?php echo menu_class("sumario", $pagina_atual); ?>>
    Sumário
  </a>
  <a href="<?php echo $caminho_raiz; ?>index.php"
    <?php echo menu_class("inicio", $pagina_atual); ?>>
    Início
  </a>
  <a href="<?php echo $caminho_raiz; ?>sobre.php"
    <?php echo menu_class("sobre", $pagina_atual); ?>>
    Sobre
  </a>
  <a href="<?php echo $caminho_raiz; ?>projetos.php"
    <?php echo menu_class("projetos", $pagina_atual); ?>>
    Projetos
  </a>
  <a href="<?php echo $caminho_raiz; ?>contato.php"
    <?php echo menu_class("contato", $pagina_atual); ?>>
    Contato
  </a>
  <a href="<?php echo $caminho_raiz; ?>03_pdo/index.php"
    <?php echo menu_class("catalogo", $pagina_atual); ?>>
    Catálogo
  </a>
  <?php if ($logado): ?>
    <a href="<?php echo $caminho_raiz; ?>04_sessoes/painel.php"
      <?php echo menu_class("Painel Área Restrita", $titulo_pagina); ?>>
      Painel
    </a>
    <a href="<?php echo $caminho_raiz; ?>04_sessoes/logout.php">
      Sair
    </a>
  <?php else: ?>
    <a href="<?php echo $caminho_raiz; ?>04_sessoes/login.php">
      Login
    </a>
    <?php endif; ?>
  </nav>
