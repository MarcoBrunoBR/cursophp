<?php
$TituloPagina = 'Adiciona Produto'; 
include ('cabecalho.php'); 
require ('banco-produto.php'); 
require_once('Produto.php');

$produto = new Produto();
$produto->setNome($_POST['nome']);
$produto->setPreco($_POST['preco']);
$produto->setDescricao($_POST['descricao']);
$produto->setCategoria($_POST['categoria_id']);
$produto->setUsado(isset($_POST['usado'])? 1 : 0);

if(insereProduto($conexao, $produto)) {
?>
<p class="alert-sucess">
Produto <?= $produto->getNome() ?>, R$ <?= $produto->getPreco() ?> Cadastrado com sucesso!</p>
<?php
} else {
?>
<p class="alert-danger">O Produto <?= $produto->getNome(); ?> nao foi adicionado</p>
<?= mysqli_error($conexao); ?>
<?php
}
mysqli_close($conexao);
include ('rodape.php') ?>