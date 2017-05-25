<?php
require_once('banco-produto.php');
?>
<?php
$id = $_POST['id'];
removeProduto($conexao, $id);

header("Location: lista-produto.php?removido=true");
die();
?>
<p class="text-success">Produto <?= $id ?> removido!</p>