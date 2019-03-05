<?php 

require_once "cabecalho.php";

$tipoProduto = $_POST['tipoProduto'];
$produto_id = $_POST['id'];
$categoria_id = $_POST['categoria_id'];

$factory = new ProdutoFactory();
$produto = $factory->criarProd($tipoProduto, $_POST);
$produto->atualizaBaseadoEm($_POST);

$produto->setId($produto_id);
$produto->getCategoria()->setId($categoria_id);

array_key_exists('usado', $_POST) ? $produto->setUsado("true") : $produto->setUsado("false");

$produtoDAO = new ProdutoDAO($conexao);

if($produtoDAO->alteraProduto($produto)) {
	?>
	<form action="produto-lista.php">
		
		<p class="text-success"> O produto <?php echo $produto->getNome()?>, R$<?php echo $produto->getPreco()?> alterado com sucesso! </p>
		<button class="btn" type="submit">Voltar</button>

	</form>

<?php
 } else { 

 	$msg = mysqli_error($conexao);

 	?>
	<form action="produto-lista.php">

		<p class="text-danger"> O produto <?php echo $produto->getNome()?>, R$<?php echo $produto->getPreco();?> não foi alterado: <?php $msg; var_dump($produto)?> </p>
		<button class="btn" type="submit">Voltar</button>

	</form>

	<?php
}

// Fechar a conexão: não é necessário colocar, o php fecha a conexão automaticamente para a gente
mysqli_close($conexao);

?>
	

<?php require_once "rodape.php" ?>