<?php
// Requere arquivos necessários
require_once "cabecalho.php";
require_once "conecta.php";
require_once "banco-categoria.php";
require_once "logica-usuario.php";
require_once "class/Categoria.php";
require_once "class/Produto.php";

// Verifica se o usuário está logado
verificaUsuario();

// Criando novos objetos
$categoria = new Categoria();
$categoria->setId(1);

$produto = new Produto();
$produto->categoria = $getCategoria();

$categorias = listaCategorias($conexao);
// Seta categoria igual a função
$categorias = listaCategorias($conexao);

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