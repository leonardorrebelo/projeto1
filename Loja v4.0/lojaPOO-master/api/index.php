<?php

$method = $_SERVER['REQUEST_METHOD'];
$request = explode("/", substr(@$_SERVER['PATH_INFO'], 1));

$data = file_get_contents("php://input");
$data = json_decode($data, true);

require_once "controller/CategoriaController.php";
require_once "model/CategoriaDAO.php";

switch ($method) {
  case 'PUT':
    $cat = new CategoriaController();
    $cat->update($data);
    break;
  case 'POST':
    $cat = new CategoriaController();
    $cat->create($data);
    break;
  case 'GET':
    $id = (isset($_GET['id']) ? $_GET['id'] : null);
    $cat = new CategoriaDAO();
    $categorias = $cat->selectAll($id);
    $resultado = array();
    foreach($categorias as $categoria){
        $resultado[] = ['id'=>$categoria->getId(), 'nome'=>$categoria->getNome(), 'descricao'=>$categoria->getDescricao()];
    }
    echo json_encode($resultado);
    break;
  case 'DELETE':
    $id = $data['id'];
    $cat = new CategoriaController();
    try{
      $cat->delete($id);
      echo json_encode(['msg'=>'Categoria excluída']);
    }
    catch(PDOException $e){
      echo json_encode(['msg'=>$e->getMessage()]);
    }
    break;
  default:
    handle_error($request);  
    break;
}
