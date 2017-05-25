<?php
require_once('conexao.php');
require_once('Categoria.php');
require_once('Produto.php');

function insereProduto($conexao, Produto $produto)
{
    $query = "INSERT INTO produtos
    VALUES (null,'{$produto->getNome()}','{$produto->getPreco()}',
    '{$produto->getDescricao()}','{$produto->getCategoria()}','{$produto->getUsado()}')";
    
    return mysqli_query($conexao, $query);  
}

function listaProduto($conexao)
{
    $produtos = array();
    
    $sql = mysqli_query($conexao, "SELECT p.id, p.nome, p.preco, p.descricao, p.usado, c.nome as nome_categoria
    FROM produtos p
    INNER JOIN categorias c
    ON c.id = p.categoria_id");

    while($linha = mysqli_fetch_assoc($sql))
    {
        $prod = new Produto();
        $prod->setId($linha['id']);/*id = $linha['id'];*/
        $prod->setNome($linha['nome']); /* = $linha['nome'];*/
        $prod->setDescricao($linha['descricao']); /*= $linha['descricao'];*/
        $prod->setPreco($linha['preco']); /*= $linha['preco'];*/
        $prod->setUsado($linha['usado']); /*= $linha['usado'];*/

        $categoria = new Categoria();
        $categoria->setId($linha['id']);
        $categoria->setNome($linha['nome_categoria']);

        $prod->setCategoria($categoria);
        
        array_push($produtos, $prod);
    }
    return $produtos;
}

function removeProduto($conexao, $id)
{
    $query = "DELETE FROM produtos WHERE id = {$id}";
    return mysqli_query($conexao, $query);
}

function buscaProduto($conexao, $id)
{
    $query = "SELECT p.*, c.nome as categoria_nome
    FROM produtos AS p
    INNER JOIN categorias AS c
    ON p.categoria_id = c.id
    WHERE p.id = {$id}";

    $resultado = mysqli_query($conexao, $query);
    $array = mysqli_fetch_assoc($resultado);

    $produto = new Produto();
    $produto->setId($array['id']);
    $produto->setNome($array['nome']);
    $produto->setDescricao($array['descricao']);
    $produto->setPreco($array['preco']);
    $produto->setUsado($array['usado']);

    $produto->setCategoria(new Categoria());
    $produto->getCategoria()->setId($array['categoria_id']);
    $produto->getCategoria()->setNome($array['categoria_nome']);

    return $produto;
}

function alteraProduto($conexao, $produto)
{
    $query = "UPDATE produtos SET nome='{$produto->getNome()}',
    preco='{$produto->getPreco()}', descricao='{$produto->getDescricao()}',
    categoria_id={$produto->getCategoria()->getId()},
    usado={$produto->getUsado()} WHERE id = {$produto->getId()}";

    return mysqli_query($conexao, $query);
}