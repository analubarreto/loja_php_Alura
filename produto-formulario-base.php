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
		<td><input type="checkbox" name="usado" value="true" <?=$usado?>> Usado</td>
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
