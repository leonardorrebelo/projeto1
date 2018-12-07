<?php
/**
 * Created by PhpStorm.
 * User: speroni
 * Date: 30/09/18
 * Time: 14:45
 */

require_once "model/CategoriaDAO.php";
require_once "model/Categoria.php";
require_once "view/View.php";

class CategoriaController
{
    private $dados;
    public function principal(){
        $this->dados = array();
        $catdao = new CategoriaDAO();

        try{
            $categorias = $catdao->selectAll();
        }catch (PDOException $e){
            echo "Erro: ".$e->getMessage();
        }
        $this->dados['categorias'] = $categorias;

        View::carregar('view/template/cabecalho.html');
        View::carregar('view/categoria/listar.php', $this->dados);
        View::carregar('view/template/rodape.html');
    }

    public function detalhes($id){
        $this->dados = array();
        $catdao = new CategoriaDAO();

        try{
            $categorias = $catdao->select($id);
        }catch (PDOException $e){
            echo "Erro: ".$e->getMessage();
        }
        $this->dados['categorias'] = $categorias;

        View::carregar('view/template/cabecalho.html');
        View::carregar('view/categoria/detalhes.php', $this->dados);
        View::carregar('view/template/rodape.html');
    }

    public function incluir(){
        View::carregar('view/template/cabecalho.html');
        View::carregar('view/categoria/incluir.html');
        View::carregar('view/template/rodape.html');
    }

    public function gravaInserir($categoria){
        $catdao = new CategoriaDAO();
        $catdao->insert($categoria);
        header('location: index.php');
    }
    public function gravaExcluir($id){
        $catdao = new CategoriaDAO();
        $catdao->delete($id);
        header('location: index.php');
    }
    public function alterar($id){
            $this->dados = array();
            $catdao = new CategoriaDAO();

            try{
                $categorias = $catdao->select($id);
            }catch (PDOException $e){
                echo "Erro: ".$e->getMessage();
            }
            $this->dados['categorias'] = $categorias;

            View::carregar('view/template/cabecalho.html');
            View::carregar('view/categoria/alterar.php', $this->dados);
            View::carregar('view/template/rodape.html');
        }

    public function gravaalterar($categoria)
    {
        $catdao = new CategoriaDAO();
        $catdao->update($categoria);
        header('location: index.php');

    }




}