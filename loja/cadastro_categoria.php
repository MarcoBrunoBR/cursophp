<?php
$TituloPagina = 'Cadastro de Categorias';
include('cabecalho.php');
require_once('banco-categoria.php');
require_once('funcoes-login.php');
require_once('Categoria.php');

protegePagina();

$categorias = listaCategorias($conexao);
?>
<!-- Início do body que está no cabecalho.php -->
<div class="alert alert-info" role="alert">
  <span class="glyphicon glyphicon-shopping-cart"></span> Cadastro de Categorias
</div>

<form class="form-inline" action="adiciona-categoria.php" method="post">
  <div class="form-group">
    <label for="nome_categoria">Nome da Categoria: </label>
    <input type="text" class="form-control" id="nome_categoria" name="nome_categoria" placeholder="Nome da Categoria">
  </div>
  <button type="submit" class="btn btn-default">Cadastrar</button>
</form>
<hr>
<table class="table table-striped table-bordered">

    <thead>
        <tr>
            <th>Código</th>
            <th>Nome</th>
            <th class="alert alert-danger">Excluir</th>
        </tr>
    </thead>
    
    <tbody>

<?php foreach($categorias as $atual) { ?>

        <tr>
            <td><?= $atual->getId(); ?></td>
            <td><?= $atual->getNome(); ?></td>
            <td>
            <form action="remove-categoria.php" method="post">
            <input type="hidden" name="id" value="<?=$atual->getId()?>">
            <button class="btn btn-danger glyphicon glyphicon-trash"></button>
            </form>
            </td>
        </tr>

<?php } ?>

    </tbody>
<?php
    if(array_key_exists("removido", $_GET) && $_GET['removido']=='true') { ?>
        <div class="alert alert-success" role="alert">
            <span class="glyphicon glyphicon-info-sign"></span> Categoria removida com sucesso!
        </div>
    <?php } ?>
</table>
<!-- Fim do body que está no rodape.php -->
<?php include('rodape.php'); ?>