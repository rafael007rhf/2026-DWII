<?php
  if (!isset($pagina_atual)) $pagina_atual = "";
  if (!isset($caminho_raiz)) $caminho_raiz = "../";

  function menu_class ($item,$atual){
    return ($item===$atual) ? 'class="ativo"' : '';
  }  
?>
  
<nav>
  <a href="<?php echo $caminho_raiz; ?>index.php"
    <?php echo menu_class("sumario", $pagina_atual); ?>>
    Sumário
  </a>
  <a href="<?php echo $caminho_raiz; ?>01_php-intro/index.php"
    <?php echo menu_class("inicio", $pagina_atual); ?>>
    Início
  </a>
  <a href="<?php echo $caminho_raiz; ?>01_php-intro/sobre.php"
    <?php echo menu_class("sobre", $pagina_atual); ?>>
    Sobre
  </a>
  <a href="<?php echo $caminho_raiz; ?>01_php-intro/projetos.php"
    <?php echo menu_class("projetos", $pagina_atual); ?>>
    Projetos
  </a>
  <a href="<?php echo $caminho_raiz; ?>02_formularios/contato.php"
    <?php echo menu_class("contato", $pagina_atual); ?>>
    Contato
  </a>
  <a href="<?php echo $caminho_raiz; ?>03_pdo/index.php"
    <?php echo menu_class("catalogo", $pagina_atual); ?>>
    Catálogo
  </a>
  <a href="<?php echo $caminho_raiz; ?>04_sessoes/publico.php"
    <?php echo menu_class("Página Pública", $titulo_pagina); ?>>
    Público
  </a>
  <a href="<?php echo $caminho_raiz; ?>04_sessoes/login.php"
    <?php echo menu_class("Login Área Restrita", $titulo_pagina); ?>>
    Login
  </a>
  <a href="<?php echo $caminho_raiz; ?>05_crud/index.php"
    <?php echo menu_class("Meus Projetos - Portfólio", $titulo_pagina); ?>>
      Portifólio
  </a>
</nav>
