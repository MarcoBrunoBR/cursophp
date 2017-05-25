<?php
$TituloPagina = 'Cadastro de Categorias';
include('cabecalho.php');
require_once('banco-categoria.php');
require_once('funcoes-login.php');

protegePagina();

$categorias = listaCategorias($conexao);
?>
<!-- Início do body que está no cabecalho.php -->
<h3>Olá <?= strtoupper($_SESSION['login']) ?>, bem vindo a loja!</h3>
<!-- Fim do body que está no rodape.php -->
<?php include('rodape.php'); ?>