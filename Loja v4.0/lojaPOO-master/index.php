<?php

require_once "controller/CategoriaController.php";

//ROTAS -

if (isset($_GET['acao'])){
    $acao = $_GET['acao'];
}else{
    $acao = 'index';
}

switch ($acao){
    case 'index':
        $cat = new CategoriaController();
        $cat->principal();
        exit;
    case 'detalhes':
        //pega o ID enviado
        $id = $_GET['id'];
        //instancia o controlador
        $cat = new CategoriaController();
        //chama o método
        $cat->detalhes($id);
        exit;
    case 'incluir':
        $cat = new CategoriaController();
        $cat->incluir();
        exit;
    case 'gravaInserir':
        //pegar dados do POST
        $categoriaNova = new Categoria();
        $categoriaNova->setNome($_POST['nome']);
        $categoriaNova->setDescricao($_POST['descricao']);
        $cat = new CategoriaController();
        $cat->inserir($categoriaNova);
        exit;
    case 'alterar':
        $id = $_GET['id'];
        $cat = new CategoriaController();
        $cat->alterar($id);
        exit;
    case 'gravaAlterar':
        $id = $_GET['id'];
        $dados = [
            'nome' => $_POST['nome'],
            'descricao' => $_POST['descricao']
        ];
        $cat = new CategoriaController();
        $cat->atualizar($dados, $id);
        exit;
    case 'excluir':
        $cat = new CategoriaController();
        $id = $_GET['id'];
        $cat->excluir($id);
        exit;
    default:
        echo "Ação inválida";

}




