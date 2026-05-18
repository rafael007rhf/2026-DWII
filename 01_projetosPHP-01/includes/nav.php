<?php
if (!isset($pagina_atual)) $pagina_atual = "";
if (!isset($caminho_raiz)) $caminho_raiz = "../";

function menu_class($item, $atual) {
    return ($item === $atual) ? 'class="ativo"' : '';
}
?>

<nav>

<a href="<?php echo $caminho_raiz; ?>01_php-intro/index.php"
<?php echo menu_class("inicio", $pagina_atual); ?>>
🏠 Início
</a>

<a href="<?php echo $caminho_raiz; ?>01_php-intro/sobre.php"
<?php echo menu_class("sobre", $pagina_atual); ?>>
👤 Sobre
</a>

<a href="<?php echo $caminho_raiz; ?>01_php-intro/projetos.php"
<?php echo menu_class("projetos", $pagina_atual); ?>>
🚀 Projetos
</a>

<a href="<?php echo $caminho_raiz; ?>02_formularios/contato.php"
<?php echo menu_class("contato", $pagina_atual); ?>>
📫 Contato
</a>

<a href="<?php echo $caminho_raiz; ?>03_pdo/index.php"
<?php echo menu_class("catalogo", $pagina_atual); ?>>
🗄️ Catálogo
</a>

<a href="<?php echo $caminho_raiz; ?>04_sessoes/login.php"
<?php echo menu_class("login", $pagina_atual); ?>>
🔐 Login
</a>

<?php if (isset($_SESSION['usuario'])): ?>
<a href="<?php echo $caminho_raiz; ?>05_crud/cadastrar.php"
<?php echo menu_class("cadastrar", $pagina_atual); ?>>
➕ Cadastrar
</a>
<?php endif; ?>

</nav>
