<?php
$TituloPagina = 'Formulário de Produto';
include('cabecalho.php');
?>
<!-- Início do body que está no cabecalho.php -->
<h3>Bem Vindo a Loja (Formulário de Produto)</h3>
<form action="adiciona-produto.php">
  <div class="form-group">
    <label for="nome">Produto: </label>
    <input type="text" class="form-control" id="nome" name="nome" placeholder="Descrição do Produto">
  </div>
  
  <div class="form-group">
    <label for="preco">Preço: </label>
    <input type="text" class="form-control" id="preco" name="preco" placeholder="Preço do Produto" size="45">
  </div>

  <div class="form-group">
    <label for="descricao">Descrição: </label>
    <textarea class="form-control" id="descricao" name="descricao"></textarea>
  </div>

  <button type="submit" class="btn btn-default">Cadastrar</button>
</form>  
<!-- Fim do body que está no rodape.php -->
<?php include('rodape.php') ?>