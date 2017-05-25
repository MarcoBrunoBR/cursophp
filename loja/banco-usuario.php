<?php
require_once('conexao.php');

function buscaUsuario($conexao, $login, $senha)
{
    $login = mysqli_real_escape_string($conexao, $login);

    $query = "SELECT login, senha FROM usuarios WHERE login = '{$login}' AND senha = md5('{$senha}');";
    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
}