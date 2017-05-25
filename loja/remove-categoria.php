<?php
require_once('banco-categoria.php');
?>
<?php
$id = $_POST['id'];
removeCategoria($conexao, $id);

header("Location: cadastro_categoria.php?removido=true");
die();
?>
<p class="text-success">Categoria <?= $id ?> removida!</p>