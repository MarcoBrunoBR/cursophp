<?php
$TituloPagina = 'Atualização de Produtos';
require_once('cabecalho.php');
require_once('banco-categoria.php');
require_once('banco-produto.php');
require_once('funcoes-login.php');

protegePagina();

$id = $_GET['id'];

$produto = buscaProduto($conexao, $id);
$categorias = listaCategorias($conexao);
?>
<!-- Início do body que está no cabecalho.php -->
<div class="alert alert-info" role="alert">
  <span class="glyphicon glyphicon-shopping-cart"></span> Cadastro de Produtos
</div>
<h1>Visualização de produto!</h1>

<form readonly>
  <div class="form-group">
    <label for="nome">Código: </label>
    <input class="form-control" readonly type="text" name="id" value="<?= $produto->getId() ?>">     
  </div>

  <div class="form-group">
    <label for="nome">Produto: </label>
    <input readonly type="text" class="form-control" id="nome" name="nome" placeholder="Descrição do Produto" value="<?= $produto->getNome() ?>">
  </div>
  
  <div class="form-group">
    <label for="preco">Preço: </label>
    <input readonly type="text" class="form-control" id="preco" name="preco" placeholder="Preço do Produto" size="45" value="<?= $produto->getPreco() ?>">
  </div>

  <div class="form-group">
    <label for="descricao">Descrição: </label>
    <textarea readonly class="form-control" id="descricao" name="descricao"><?= $produto->getDescricao() ?></textarea>
  </div>

  <div class="form-group">
    <label for="preco">Condição do Produto: </label>
    <?php $usado = $produto->getUsado() == 1 ? "Usado": "Novo" ?>
    <input readonly type="text" class="form-control" id="usado" name="usado"value="<?= $usado ?>">
  </div>

  <div class="form-group">
    <label for="preco">Categoria: </label>
            <?php
        foreach($categorias as $categoria) {
          if($categoria->getId() == $produto->getCategoria()->getId()) {
        ?>           
            <input readonly type="text" class="form-control" id="preco" name="preco" placeholder="Preço do Produto" size="45" value="<?= $produto->getCategoria()->getNome() ?>">
        <?php }} ?>
    
  </div>
</form>
<!-- Fim do body que está no rodape.php -->
<?php require_once('rodape.php'); ?>