<?php

//vai usar o CategoriaDAO.php
require_once "../../model/CategoriaDAO.php";
require_once "../../model/Categoria.php";

//cria uma instância do CategoriaDAO

$dados = file_get_contents('php://input');
print_r($dados);

$dados = json_decode($dados, true);
//print_r($dados);


$nome = $dados['nome'];
$descricao = $dados['descricao'];

$categoria = new Categoria($nome, $descricao);

$catdao = new CategoriaDAO();

$catdao->insert($categoria);