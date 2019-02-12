<?php

require_once "cabecalho.php";
require_once "conecta.php";
require_once "banco-categoria.php";
require_once "banco-produto.php";

$id = $_GET['id'];
$produto = buscaProduto($conexao, $id);
$categorias = listaCategorias($conexao);
// Se for usado, setar o botão checked = checked, se não, devolver ele vazio
$usado = $produto['usado'] ? "checked='checked'" : "";

?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1 class="display-4">Alterar Produto</h1>
		</div>
			<div class="col-md-12">
				<form action="produto-altera.php" method="post">
					<!-- Campo de id escondido -->
					<input type="hidden" name="id" value="<?=$produto['id']?>" />
					<!-- Inicio da tabela -->
					<table class="table">
						<tr>
							<td>Nome:</td> 
							<td><input class="form-control" type="text" name="nome" value="<?=$produto['nome']?>"></td>
						</tr>

						<tr>
							<td>Preço:</td> 
							<td><input class="form-control" type="number" name="preco" value="<?=$produto['preco']?>"></td>
						</tr>

						<tr>
							<td>Descrição:</td> 
							<td><textarea name="descricao" cols="15" rows="5" class="form-control"><?=$produto['descricao']?></textarea></td>
						</tr>

						<tr>
							<td></td>
							<td><input type="checkbox" name="usado" <?=$usado?>> Usado</td>
						</tr>

						<tr>
							<td>Categoria:</td>
						    <td>
						    	<select name="categoria_id">
							        <?php foreach($categorias as $categoria) :
							        	// setar a categoria
							        	$essaEhACategoria = $produto['categoria_id'] == $categoria['id'];
							        	// checar se essa é a categoria do produto
							        	$selecao = $essaEhACategoria ? "selected='selected'" : "";
							         ?>
							        <option type="radio" name="categoria_id" value="<?=$categoria['id']?>" class="form-control" <?=$selecao?>>
							        	<?=$categoria['nome']?>		
							        </option>
							        <?php endforeach ?>
							    </select>
						    </td>
						</tr>

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