<?php

require_once "cabecalho.php";
require_once "banco-categoria.php";
require_once "banco-produto.php";

$id = $_GET['id'];
$produto = buscaProduto($conexao, $id);
$categorias = listaCategorias($conexao);

$selecao_usado = $produto->getUsado() ? "checked='checked'" : "";
// Se for usado, setar o botão checked = checked, se não, devolver ele vazio
$produto->setUsado($selecao_usado);

?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1 class="display-4">Alterar Produto</h1>
		</div>
			<div class="col-md-12">
				<form action="altera-produto.php" method="post">
					<input type="hidden" name="id" value="<?=$produto->getId()?>">
					<table class="table">
						<?php require_once "produto-formulario-base.php"; ?>
						<tr>
							<td>
								<button class="btn btn-primary" type="submit">Alterar</button>
							</td>
						</tr>
					</table>
				</form>
			</div>
	</div>
</div>

	



<?php require_once "rodape.php" ?>