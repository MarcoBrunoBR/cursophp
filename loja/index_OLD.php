<?php
$TituloPagina = 'Lista de Produtos';
include('cabecalho.php');
require_once('banco-produto.php');
?>
<!-- Início do body que está no cabecalho.php -->
<div class="alert alert-info" role="alert">
  <span class="glyphicon glyphicon-list-alt"></span> Lista de Produtos
</div>

<?php
$produtos = listaProduto($conexao);
?>
<table class="table table-striped table-bordered">

    <thead>
        <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Preço</th>
            <th class="alert alert-danger">Excluir</th>
        </tr>
    </thead>
    
    <tbody>

<?php foreach($produtos as $atual) { ?>

        <tr>
            <td><?php echo $atual['id']; ?></td>
            <td><?php echo $atual['nome']; ?></td>
            <td><?php echo $atual['preco']; ?></td>
            <td><a class="btn btn-danger glyphicon glyphicon-trash" href="remove-produto.php?id=<?= $atual['id']; ?>"></a></td>
        </tr>

<?php } ?>

    </tbody>
<?php
    if(array_key_exists("removido", $_GET) && $_GET['removido']=='true') { ?>
    <h3 class="alert-success">Produto removido com sucesso!</h3>
    <?php } ?>
</table>

<!-- Fim do body que está no rodape.php -->
<?php include('rodape.php'); ?>