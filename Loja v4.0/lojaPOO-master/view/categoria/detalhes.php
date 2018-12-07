<?php
//capturo o objeto categoria que foi passado em $dados
$categoria = $dados['categorias'][0];
?>
<h1>Detalhes da categoria</h1>

<p>id: <?= $categoria->getId() ?></p>
<p>nome:<?= utf8_encode($categoria->getNome()) ?></p>
<p>descrição:<?= utf8_encode($categoria->getDescricao()) ?></p>

<a href="index.php?acao=excluir&id=<?= $categoria->getId() ?>">Excluir</a>
<a href="index.php?acao=alterar&id=<?=$categoria->getId() ?>">Aterar</a>