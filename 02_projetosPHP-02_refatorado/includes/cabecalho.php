<?php













if (session_status() === PHP_SESSION_NONE) {
    session_start();
}





if (!isset($titulo_pagina)) $titulo_pagina = 'Portfólio DWII';
if (!isset($caminho_raiz))  $caminho_raiz  = './';
if (!isset($pagina_atual))  $pagina_atual  = '';
?>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo htmlspecialchars($titulo_pagina); ?></title>


<link rel="stylesheet" href="<?php echo $caminho_raiz; ?>includes/style.css">

<?php




include __DIR__ . '/nav.php';
?>