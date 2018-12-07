<?php

    require 'CategoriaDAO.php';
//INSERT
    $cat = new Categoria();
    $cat->setNome("Material de Escritório");
    $cat->setDescricao("Tudo para seu escritório!");

    $dao = new CategoriaDAO();
    if ($dao->insert($cat)){
        echo "inserido";
    }else{
        echo "nao inserido";
    }

//UPDATE
$cat = new Categoria();
$cat->setId(9);
$cat->setNome("Categoria alterada");
$cat->setDescricao("Descricao alterada!");

$dao = new CategoriaDAO();
if ($dao->update($cat)){
    echo "alterado";
}else{
    echo "nao alterado";
}

//DELETE
$cat = new Categoria();
$cat->setId(9);

$dao = new CategoriaDAO();
if ($dao->delete($cat)){
    echo "excluido";
}else{
    echo "nao excluido";
}

