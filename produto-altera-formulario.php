<?php

require_once "cabecalho.php";

$produtoDAO = new ProdutoDAO($conexao);
$produto = $produtoDAO->buscaProduto($id);

$categoriaDAO = new CategoriaDAO($conexao);
$categorias = $categoriaDAO->listaCategorias();

$id = $_GET['id'];

$selecao_usado = $produto->isUsado() ? "checked='checked'" : "";
$produto->setUsado($selecao_usado); 

?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1 class="display-4">Alterar Produto</h1>
		</div>
			<div class="col-md-12">
				<form action="produto-altera.php" method="post">
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