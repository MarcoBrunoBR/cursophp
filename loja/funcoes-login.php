<?php
require_once('conexao.php');
session_start();
/**/
function buscaUsuario($conexao, $login, $senha)
{
    $login = mysqli_real_escape_string($conexao, $login);

    $query = "SELECT login, senha FROM usuarios WHERE login = '{$login}' AND senha = md5('{$senha}');";

/* Use para depurar a condição
    var_dump($query);
    die();
*/
    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
}
/**/
function protegePagina()
{
    if(!isset($_SESSION['login'])) {
        header("Location: index.php");
    }
}
/**/
function usuarioLogado()
{
    return $_SESSION['login'];
}
/**/
function realizaLogin($login)
{
    $_SESSION['usuario'] = $login;
}
/**/
function usuarioLogout()
{
    session_destroy();
    header("Location: index.php");
}

