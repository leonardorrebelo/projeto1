<?php
require_once "../config/Database.php";
//AQUI FAREMOS O PRIMEIRO TESTE DE CONEXAO E CONSULTA

$conexao = Database::getConexao();

$sql = "select * from categoria";

$resultado = $conexao->query($sql);

$categorias = $resultado->fetchAll(PDO::FETCH_ASSOC);
echo ('<pre>');
print_r($categorias);
