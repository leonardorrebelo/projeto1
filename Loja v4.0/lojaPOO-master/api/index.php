<?php

$method = $_SERVER['REQUEST_METHOD'];
$request = explode("/", substr(@$_SERVER['PATH_INFO'], 1));

$data = file_get_contents("php://input");
$data = json_decode($data, true);

require_once "controller/CategoriaController.php";

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
    $cat = new CategoriaController();
    $cat->read($id);
    break;
  case 'DELETE':
    $id = (isset($_GET['id']) ? $_GET['id'] : null);
    $cat = new CategoriaController();
    $cat->delete($id);
    break;
  default:
    handle_error($request);  
    break;
}
