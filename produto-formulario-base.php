<table class="table">
	<tr>
		<td>Nome:</td> 
		<td><input class="form-control" type="text" name="nome" value="<?=$produto->getNome()?>"></td>
	</tr>

	<tr>
		<td>Preço:</td> 
		<td><input class="form-control" type="number" name="preco" value="<?=$produto->getPreco()?>"></td>
	</tr>

	<tr>
		<td>Descrição:</td> 
		<td><textarea name="descricao" cols="15" rows="5" class="form-control"><?=$produto->getDescricao()?></textarea></td>
	</tr>

	<tr>
		<td></td>
		<td><input type="checkbox" name="usado" value="true" <?=$produto->getUsado()?>> Usado</td>
	</tr>

	<tr>
		<td>Categoria:</td>
		<td>
			<select name="categoria_id">
				<?php foreach($categorias as $categoria) : ?>
					<option type="radio" name="categoria_id" value="<?=$categoria->getId()?>" class="form-control">
						<?=$categoria->getNome()?>		
					</option>
				<?php endforeach ?>
			</select>
		</td>
	</tr>
