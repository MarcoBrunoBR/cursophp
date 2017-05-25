<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $TituloPagina; ?></title>
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="bootstrap/css/loja.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div class="container">
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<ul class="nav nav-pills">
					<li><a href="loja.php">Loja</a></li>
					<li><a href="produto-formulario.php">Adiciona Produto</a></li>
					<li><a href="cadastro_categoria.php">Cadastro de Categoria</a></li>
					<li><a href="lista-produto.php">Lista de Produtos</a></li>
					<li><a href="logout.php">Sair</a></li>
					<li><a>Logado como: <?= strtoupper($_SESSION['login']); ?></a></li>
				</ul>
			</div>
		</nav>
	</div>
	<main class="container">
		<article class="principal">
<!-- Daqui pra baixo, colocar em uma nova página e inserir o cabecalho.php no include -->