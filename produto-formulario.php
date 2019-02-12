<?php

require_once "cabecalho.php";
require_once "conecta.php";
require_once "banco-categoria.php";

$categorias = listaCategorias($conexao);

?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1 class="display-4">Formulário de Produto</h1>
		</div>
			<div class="col-md-12">
				<form action="adiciona-produto.php" method="post">

					<table class="table">
						<tr>
							<td>Nome:</td> 
							<td><input class="form-control" type="text" name="nome"></td>
						</tr>

						<tr>
							<td>Preço:</td> 
							<td><input class="form-control" type="number" name="preco"></td>
						</tr>

						<tr>
							<td>Descrição:</td> 
							<td><textarea name="descricao" cols="15" rows="5" class="form-control"></textarea></td>
						</tr>

						<tr>
							<td></td>
							<td><input type="checkbox" name="usado" value="true"> Usado</td>
						</tr>

						<tr>
							<td>Categoria:</td>
						    <td>
						    	<select name="categoria_id">
							        <?php foreach($categorias as $categoria) : ?>
							        <option type="radio" name="categoria_id" value="<?=$categoria['id']?>" class="form-control">
							        	<?=$categoria['nome']?>		
							        </option>
							        <?php endforeach ?>
							    </select>
						    </td>
						</tr>

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