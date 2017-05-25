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
<h1>Alterando produto!</h1>

<form action="altera-produto.php" method="post">

<input type="hidden" name="id" value="<?= $produto->getId() ?>">

  <div class="form-group">
    <label for="nome">Produto: </label>
    <input type="text" class="form-control" id="nome" name="nome" placeholder="Descrição do Produto" value="<?= $produto->getNome() ?>">
  </div>
  
  <div class="form-group">
    <label for="preco">Preço: </label>
    <input type="text" class="form-control" id="preco" name="preco" placeholder="Preço do Produto" size="45" value="<?= $produto->getPreco() ?>">
  </div>

  <div class="form-group">
    <label for="descricao">Descrição: </label>
    <textarea class="form-control" id="descricao" name="descricao"><?= $produto->getDescricao() ?></textarea>
  </div>
<?php $usado = $produto->getUsado() == 1 ? "checked": "" ?>
  <div class="checkbox">
    <label>
      <input type="checkbox" name="usado" <?= $usado ?> value="true"> Usado
    </label>
  </div>

    <div class="form-group">
        <label>Categoria: </label>
          <select class="form-control" name="categoria_id">
        <?php
        foreach($categorias as $categoria) {
          if($categoria->getId() == $produto->getCategoria()->getId()) {
        ?>           
            <option value="<?= $categoria->getId() ?>" selected> <?= $categoria->getNome() ?></option>
            <?php } else { ?>
            <option value="<?= $categoria->getId() ?>"> <?= $categoria->getNome() ?></option>
        <?php }} ?>
          </select>
    </div>   

  <button type="submit" class="btn btn-default">Cadastrar</button>
</form>
<!-- Fim do body que está no rodape.php -->
<?php require_once('rodape.php'); ?>