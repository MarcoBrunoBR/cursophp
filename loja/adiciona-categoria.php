<?php
$TituloPagina = 'Adiciona Categoria'; 
include ('cabecalho.php'); 
require ('banco-categoria.php'); 

$nome = $_POST['nome_categoria'];

if(insereCategoria($conexao, $nome)) {
?>
<p class="alert-sucess">
Categoria <?= $nome ?>, cadastrada com sucesso!</p>

<?php
header("Location: cadastro_categoria.php");
} else {
?>
<p class="alert-danger">A Categoria <?= $nome; ?> nao foi adicionado</p>
<?php
}
mysqli_close($conexao);
include ('rodape.php') ?>