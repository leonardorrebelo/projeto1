

<h1>Lista de Categorias</h1>
<a href="index.php?acao=incluir">Nova categoria</a>
<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
<?php


    $categorias = $dados['categorias'];
    foreach ($categorias as $categoria){
        echo '<tr>';
        echo '<td>'.$categoria->getId().'</td>';
        echo '<td><a href="index.php?acao=detalhes&id='.$categoria->getId().'">'.utf8_encode($categoria->getNome()).'</a></td>';
        echo '<td>'.utf8_encode($categoria->getDescricao()).'</td>'; //convertando de ISO para UTF-8
        echo '<td><a href="index.php?acao=alterar&id='.$categoria->getId().'">alterar</a> | <a href="index.php?acao=excluir&id='.$categoria->getId().'">excluir</a></td>';
        echo '</tr>';
    }
?>
    </tbody>
</table>


