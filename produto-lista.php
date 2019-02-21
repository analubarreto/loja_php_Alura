<?php 

// Requisições
require_once "conecta.php";
require_once "cabecalho.php";
require_once "banco-produto.php";
require_once "mostra-alerta.php";

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
		<?php 
			// Chamar a função listaProdutos com $conexão como parâmetro
			$produtos = listaProdutos($conexao);

		?>

			<tr>
				<th scope="col">Produto</th>
				<th scope="col">Preço</th>
				<th scope="col">Descrição</th>
				<th scope="col">Categoria</th>
				<th scope="col">Alterar</th>
				<th scope="col">Remover</th>
			</tr>
		<?php
			// Para cada um desses produtos dentro do array produto, chama de produto
			// Início foreach
			$produtos = listaProdutos($conexao);
			foreach($produtos as $produto) :
			?>

			    <tr>
			        <td><?=$produto->nome?></td>
			        <td><?=$produto->preco?></td>
			        <td><?= substr($produto->descricao, 0, 15) ?></td>
			        <td><?=$produto->categoria->nome?></td>
			        <td>
			        	<a href="produto-altera-formulario.php?id=<?=$produto['id']?>" class="btn btn-primary">alterar</a>
			        </td>
			        <td>
						<form action="remove-produto.php" method="post">
							<input type="hidden" name="id" value="<?=$produto['id']?>">
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
	// Requisição do rodape.php
	require_once "rodape.php";
?>