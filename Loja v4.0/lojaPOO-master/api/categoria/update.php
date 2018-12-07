<?php

//vai usar o CategoriaDAO.php
require_once "../../model/CategoriaDAO.php";
require_once "../../model/Categoria.php";

$dados = file_get_contents('php://input');
print_r($dados);

$dados = json_decode($dados, true);
//print_r($dados);


$id = $dados['id'];

$nome = $dados['nome'];

$descricao = $dados['descricao'];

$categoria = new Categoria($nome, $descricao, $id);

$dao = new CategoriaDAO();

$dao->update($categoria);