<?php 

// Requisições
require_once "cabecalho.php";

?>

<?php mostraAlerta("success") ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1 class="display-4">Produtos</h1>
			<p class="lead">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
		</div>
	</div>
</div>

<?php 
	if(isset($_SESSION["success"])) {?>
		<p class="alert-success"><?= $_SESSION["success"]?></p>
<?php } ?>

<?php 
	unset($_SESSION["success"]);
?>

<!-- inicio tabela -->
<table class="table">
	<thead>

			<tr>
				<th scope="col">Produto</th>
				<th scope="col">Preço</th>
				<th scope="col">Imposto</th>
				<th scope="col">Descrição</th>
				<th scope="col">Categoria</th>
				<th scope="col">ISBN</th>
				<th scope="col">Alterar</th>
				<th scope="col">Remover</th>
			</tr>
		<?php
			// Início foreach
			$produtoDAO = new ProdutoDAO($conexao);
			$produtos = $produtoDAO->listaProdutos();
			foreach($produtos as $produto) :
			?>

			    <tr>
			        <td><?=$produto->getNome()?></td>
					<td><?=$produto->getPreco()?></td>
					<td><?=$produto->calculaImposto()?></td>
			        <td><?=substr($produto->getDescricao(), 0, 40) ?></td>
			        <td><?=$produto->getCategoria()->getNome();?></td>
					<td>
					<?=$produto->hasIsbn() ? $produto->getIsbn() : ""; ?>
					</td>

			        <td>
			        	<a href="produto-altera-formulario.php?id=<?=$produto->getId()?>" class="btn btn-primary">alterar</a>
			        </td>
			        <td>
						<form action="remove-produto.php" method="post">
							<input type="hidden" name="id" value="<?=$produto->getId()?>">
			        		<button class="btn btn-danger">remover</button>
			        	</form>
			        </td>
			    </tr>

			<?php
				// : e "endforeach" ou "endif" é uma forma diferente de declarar foreach e if no php que deixa mais claro o que está acontecendo
				endforeach
			?>
	</thead>
<!-- Fim tabela -->
</table>

<?php		
	require_once "rodape.php";
?>