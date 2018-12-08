<?php

require_once "model/CategoriaDAO.php";
require_once "model/Categoria.php";

class CategoriaController
{
    private $dados;

    public function create($dados)
    {
        $catdao = new CategoriaDAO();

        try{
            $nome = $dados['nome'];
            $descricao = $dados['descricao'];

            $categoria = $catdao->insert($nome, $descricao);
        }catch (PDOException $e){
            echo "Erro: ".$e->getMessage();
        }
    }

    public function read ($id = null)
    {
        $this->dados = array();
        $catdao = new CategoriaDAO();

        try{
            if ($id) {
                $categorias = $catdao->select($id);
            } else {
                $categorias = $catdao->selectAll();
            }
        }catch (PDOException $e){
            echo "Erro: ".$e->getMessage();
        }

        echo json_encode($categorias, JSON_PRETTY_PRINT);
    }

    public function update($dados)
    {
        $catdao = new CategoriaDAO();

        try{
            $catdao->update($dados);
            exit;
        }catch (PDOException $e){
            echo "Erro: ".$e->getMessage();
        }
    }

    public function delete($id)
    {
        $catdao = new CategoriaDAO();

        try{
            $catdao->delete($id);
            exit;
        }catch (PDOException $e){
            throw $e;
            
        }
    }
}
