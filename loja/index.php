<?php
$TituloPagina = 'Nossa Loja';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $TituloPagina; ?></title>
<link href="css/form-login.css" rel="stylesheet" type="text/css">
</head>

<body>
	<main class="container">
		<article class="principal">
    <div class="container">
    <form class="form-container" action="login.php" method="post">
      <div class="form-title"><h2></h2></div>
      <div class="form-title">Login</div>
        <input class="form-field" type="text" name="login" /><br />
        <div class="form-title">Senha</div>
        <input class="form-field" type="password" name="senha" /><br />
        <div class="submit-container">
        <input class="submit-button" type="submit" value="Entrar" />
      </div>
    </form>
    </div>

<?php
  if(array_key_exists('login',$_GET) && $_GET['login'] == "false") {
?>

<p class="alert alert-danger">Login Inválido!</p>

<?php } ?>
<!-- Fim do body que está no rodape.php -->
<?php include('rodape.php'); ?>