<?php
$TituloPagina = 'Lista de Produtos';
include('cabecalho.php');
require_once('banco-produto.php');
require_once('banco-categoria.php');
require_once('funcoes-login.php');
require_once('Categoria.php');
require_once('Produto.php');

session_start();
protegePagina();
?>
<!-- Início do body que está no cabecalho.php -->
<div class="alert alert-info" role="alert">
  <span class="glyphicon glyphicon-list"></span> Lista de Produtos Loja
</div>
<table class="table table-striped table-bordered">

    <thead>
        <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Preço com Desconto</th>
            <th>Categoria</th>
            <th>Descrição</th>
            <th>Condição do Produto</th>
            <th class="panel panel-warning">Excluir</th>
            <th class="alert alert-warning">Alterar</th>
            <th class="alert alert-info">Visualizar</th>
        </tr>
    </thead>
    
    <tbody>
<?php
$produtos = listaProduto($conexao);
$categorias = listaCategorias($conexao);
foreach($produtos as $prod)
{ ?>
        <tr>
            <td><?= $prod->getId() ?></td>
            <td><?= $prod->getNome() ?></td>
            <td><?= $prod->getPreco() ?></td>
            <td><?= $prod->subtraiDesconto(0.1) ?></td>
            <td><?= $prod->getCategoria()->getNome() ?></td>
            <td><?= substr($prod->getDescricao(), 0, 40) ?>...</td>
            <td><?= $prod->getUsado() == 1?"Usado":"Novo" ?></td>
            <!-- EXCLUIR -->
            <td>
            <form action="remove-produto.php" method="post">
            <input type="hidden" name="id" value="<?= $prod->getId() ?>">
            <button class="btn btn-danger glyphicon glyphicon-trash"></button>
            </form>
            </td>
            <!-- ALTERAR -->
            <td>
            <a class="btn btn-warning glyphicon glyphicon-pencil" href="produto-altera-formulario.php?id=<?= $prod->getId() ?>"</a>
            </td>
            <!-- VISUALIZAR -->
            <td>
            <a class="btn btn-info glyphicon glyphicon-search" href="produto-visualiza.php?id=<?= $prod->getId() ?>"</a>
            </td>            
        </tr>

<?php } ?>

    </tbody>
<?php
    if(array_key_exists("removido", $_GET) && $_GET['removido']=='true') { ?>
        <div class="alert alert-success" role="alert">
            <span class="glyphicon glyphicon-info-sign"></span> Produto removido com sucesso!
        </div>
    <?php } ?>
</table>

<!-- Fim do body que está no rodape.php -->
<?php include('rodape.php'); ?>