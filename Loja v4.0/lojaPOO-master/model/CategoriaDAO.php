<?php
/**
 * Created by PhpStorm.
 * User: speroni
 * Date: 29/09/18
 * Time: 22:24
 *
 * Classe de Acesso a Dados de Categoria - Contem os métodos para manipulacao dos dados
 */

require_once "Categoria.php";
require_once "DAO.php";

class CategoriaDAO extends DAO
{
    public function select($id){
        $sql = "select * from Categoria where id = :id";
        try{
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $categorias = $stmt->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Categoria', ['nome', 'descricao', 'id']);

            return $categorias;
        }catch (PDOException $e){

            throw new PDOException($e);
        }
    }

    public function selectAll(){
        $sql = "select * from categoria order by nome";
        try{
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();
            $categorias = $stmt->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Categoria', ['nome', 'descricao', 'id']);

            return $categorias;
        }catch (PDOException $e){

            throw new PDOException($e);
        }
    }

    public function insert($nome, $descricao){
        $sql = "insert into Categoria (nome, descricao) values (:nome, :descricao)";
        try{
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindParam(':nome', $nome, PDO::PARAM_STR, 60);
            $stmt->bindParam(':descricao', $descricao, PDO::PARAM_STR, 255);
            $stmt->execute();
        }catch (PDOException $e){

            throw new PDOException($e);
        }
    }

    public function update($dados, $id){
        $sql = "update Categoria set nome = :nome, descricao = :descricao where id = :id";
        try{
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindParam(':nome', $dados['nome'], PDO::PARAM_STR, 60);
            $stmt->bindParam(':descricao', $dados['descricao'], PDO::PARAM_STR, 255);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        }catch (PDOException $e){

            throw new PDOException($e);
        }
    }

    public function delete($id){

        $sql1 = "delete from produto where id_categoria = :id";
        try{
            $stmt = $this->conexao->prepare($sql1);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        }catch (PDOException $e){
            throw new PDOException($e);
        }

        $sql2 = "delete from categoria where id = :id";
        try{
            $stmt = $this->conexao->prepare($sql2);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        }catch (PDOException $e){
            throw new PDOException($e);
        }

    }
}