<?php
$categoria = $dados['categorias'][0];
?>
<h1>Alterar categoria</h1>

<form method="post" action="index.php?acao=gravaAlterar&id=<?= $categoria->getId() ?>">
    nome <input type="text" name="nome" value="<?= $categoria->getNome() ?>">
    descricao <input type="text" name="descricao" value="<?= $categoria->getDescricao() ?>">
    <input type="submit">
</form>

