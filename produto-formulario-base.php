<table class="table">
	<tr>
		<td>Nome:</td>
		<td><input class="form-control" type="text" name="nome" value="<?=$produto->getNome()?>"></td>
	</tr>

	<tr>
		<td>Preço:</td>
		<td><input class="form-control" type="text" name="preco" value="<?=$produto->getPreco()?>"></td>
	</tr>

	<tr>
		<td>Descrição:</td>
		<td><textarea name="descricao" cols="15" rows="5" class="form-control"><?=$produto->getDescricao()?></textarea></td>
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

	<tr>
		<td>Tipo do Produto:</td>
		<td>
			<select name="tipoProduto">
				<?php
				$tipos = array("Livro Físico", "Ebook");
				foreach($tipos as $tipo) :
					$tipoSemEspaco = str_replace(array(" ", "í"), array("", "i"), $tipo);
					$esseEhOTipo = get_class($produto) == $tipoSemEspaco;
					$selecaoTipo = $esseEhOTipo ? "selected='selected'" : "";
					?> 

							<optgroup label="Livros">
								<option type="radio" name="tipoProduto" value="<?=$tipo?>" <?=$selecaoTipo?> class="form-control">
									<?=$tipo?>
								</option>
							</optgroup>
						
				<?php endforeach ?>
			</select>
		</td>
	</tr>

	<tr>
		<td>ISBN:</td>
		<td><input class="form-control" type="number" name="isbn" value="
		<?php if($produto->hasIsbn()) {
			echo $produto->getIsbn(); }?>"></td>
	</tr>

	<tr>
		<td>Taxa de Impressão:</td>
		<td><input class="form-control" type="number" name="taxaImpressao" value="
		<?php if($produto->hasTaxaImpressao()) {
			echo $produto->getTaxaImpressao(); }?>"></td>
	</tr>

	<tr>
		<td>Water Mark:</td>
		<td><input class="form-control" type="number" name="waterMark" value="
		<?php if($produto->hasWaterMark()) {
			echo $produto->getWaterMark(); }?>"></td>
	</tr>

	<tr>
		<td></td>
		<td><input type="checkbox" name="usado" value="true" <?=$produto->isUsado()?>> Usado</td>
	</tr>
