<?php

require_once "cabecalho.php";
require_once "conecta.php";
require_once "logica-usuario.php";

verificaUsuario();

$categoria = new Categoria();
$categoria->setId(1);

$produto = new Produto("", "", "", $categoria, "");

$categoriaDAO = new CategoriaDAO($conexao);
$categorias = $categoriaDAO->listaCategorias();

?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1 class="display-4">Formulário de Produto</h1>
		</div>
			<div class="col-md-12">
				<form action="adiciona-produto.php" method="post">

					<?php require_once "produto-formulario-base.php" ?>

						<tr>
							<td>
								<button class="btn btn-primary" type="submit">Cadastrar</button>
							</td>
						</tr>
					</table>

			</form>
		</div>
	</div>
</div>

	



<?php require_once "rodape.php" ?>