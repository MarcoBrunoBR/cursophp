<?php
require_once('funcoes-login.php');

session_start();

$login = $_POST['login'];
$senha = $_POST['senha'];

$usuario = buscaUsuario($conexao, $login, $senha);

if(! is_null ($usuario)) {
    $url = "loja.php";
    $_SESSION['login'] = $usuario['login'];
} else {
    $url = "index.php?login=false";
}
header("Location: {$url}");
