<?php

require_once('conecta.php');

function listaProdutos($conexao)
{
    $produtos = [];
    $query = "select p.*, c.nome as categoria_nome from produtos p join categorias c on c.id = p.categoria_id";
    $resultado = mysqli_query($conexao, $query);
    while ($produto = mysqli_fetch_assoc($resultado)) {
        array_push($produtos, $produto);
    }

    return $produtos;
}

function buscaProduto($conexao, $id)
{
    $id = mysqli_escape_string($conexao, $id);

    $query = "select * from produtos where id = {$id}";
    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
}

function insereProduto($conexao, $nome, $preco, $descricao, $categoria_id, $usado)
{
    $nome = mysqli_escape_string($conexao, $nome);
    $preco = mysqli_escape_string($conexao, $preco);
    $descricao = mysqli_escape_string($conexao, $descricao);
    $categoria_id = mysqli_escape_string($conexao, $categoria_id);
    $usado = mysqli_escape_string($conexao, $usado);

    $query = "insert into produtos (nome, preco, descricao, categoria_id, usado) values ('{$nome}', {$preco}, '{$descricao}', {$categoria_id}, {$usado})";
    return mysqli_query($conexao, $query);
}

function alteraProduto($conexao, $id, $nome, $preco, $descricao, $categoria_id, $usado)
{
    $id = mysqli_escape_string($conexao, $id);
    $nome = mysqli_escape_string($conexao, $nome);
    $preco = mysqli_escape_string($conexao, $preco);
    $descricao = mysqli_escape_string($conexao, $descricao);
    $categoria_id = mysqli_escape_string($conexao, $categoria_id);
    $usado = mysqli_escape_string($conexao, $usado);

    $query = "update produtos set nome = '{$nome}', preco = {$preco}, descricao = '{$descricao}', categoria_id = {$categoria_id} , usado = {$usado} where id = {$id}";
    return mysqli_query($conexao, $query);
}


function removeProduto($conexao, $id)
{
    $query = "delete from produtos where id = {$id}";
    return mysqli_query($conexao, $query);
}
