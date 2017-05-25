<?php
$TituloPagina = 'Cadastro de Produtos';
require_once('cabecalho.php');
require_once('banco-categoria.php');
require_once('banco-produto.php');
require_once('funcoes-login.php');
require_once('Categoria.php');
require_once('Produto.php');

protegePagina();

$produto = new Produto();
$produto->setCategoria(new Categoria());

$ehAlteracao = false;
$action = "adiciona-produto.php";
if(array_key_exists('id', $_GET)) {
  $id = $_GET['id'];
  $produto = buscaProduto($conexao, $id);
  $ehAlteracao = true;
  $action = "altera-produto.php";
}

$categorias = listaCategorias($conexao);
$usado = $produto->getUsado() ? "checked='checked'" : "";
?>
<!-- Início do body que está no cabecalho.php -->
<div class="alert alert-info" role="alert">
  <span class="glyphicon glyphicon-shopping-cart"></span> Cadastro de Produtos
</div>
<h1><?= $ehAlteracao ? "Alterando" : "Adicionando" ?> produto!</h1>

<form action="<?= $action ?>" method="post">

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

  <div class="checkbox">
    <label>
      <input type="checkbox" name="usado" <?= $usado ?> value="true"> Usado
    </label>
  </div>

    <div class="form-group">
        <label>Categoria: </label>
          <select class="form-control" name="categoria_id">
          <option>Selecione</option>
        <?php
        foreach($categorias as $categoria) : $essaEhACategoria = $produto->getCategoria()->getId() == $categoria->getId();
        $selecao = $essaEhACategoria ? "selected='selected'" : "";?>           
            <option value="<?= $categoria->getId() ?>"<?= $selecao ?>> <?= $categoria->getNome() ?></option>
        <?php endforeach ?>
          </select>
    </div>  

  <button type="submit" class="btn btn-default">Cadastrar</button>
</form>
<!-- Fim do body que está no rodape.php -->
<?php require_once('rodape.php'); ?>