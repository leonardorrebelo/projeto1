<?php
//capturo o objeto categoria que foi passado em $dados
$categoria = $dados['categorias'][0];
?>
<h1>Detalhes da categoria</h1>
<form   action="index.php?acao=gravaalterar" method="post">
 <input type="hidden" name="id" value="<?= $categoria->getId() ?>">
<p>nome: <input type="text" name="nome" value="<?= utf8_encode($categoria->getNome()) ?>"></p>
<p>descrição:<input type="text" name="descricao"    value=" <?= utf8_encode($categoria->getDescricao()) ?>"></p>
 <input type="submit">
</form>