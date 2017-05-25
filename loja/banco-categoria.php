<?php
require_once('conexao.php');
require_once('Categoria.php');

function listaCategorias($conexao)
{

    $categorias = array();
    $query = "SELECT id, nome FROM categorias";
    $resultado = mysqli_query($conexao, $query);

    while($linha = mysqli_fetch_assoc($resultado)) {
        $categoria = new Categoria();
        $categoria->setId($linha['id']);
        $categoria->setNome($linha['nome']);
        array_push($categorias ,$categoria);
    }
    return $categorias;
}

function insereCategoria($conexao, $nome)
{
    $query = "INSERT INTO categorias (nome) VALUES ('{$nome}')";
    $resultadodaInsercao = mysqli_query($conexao, $query);
    return $resultadodaInsercao;
}

function removeCategoria($conexao, $id)
{
    $query = "DELETE FROM categorias WHERE id = {$id}";
    return mysqli_query($conexao, $query);
}