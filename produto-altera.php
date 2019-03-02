<?php 

require_once "conecta.php";
require_once "cabecalho.php";

$categoria = new Categoria();
$categoria->id = $_POST['categoria_id'];

$nome = $_POST["nome"];
$preco = $_POST["preco"];
$descricao = $_POST["descricao"]; // Enviando a descrição através do corpo
$categoria = $categoria->setNome($categoria);

array_key_exists('usado', $_POST) ? $usado = "true" : $usado = "false";
$produto = new Produto($nome, $preco, $descricao, $categoria, $usado);

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

		<p class="text-danger"> O produto <?php echo $produto->getNome()?>, R$<?php echo $produto->getPreco();?> não foi alterado: <?php $msg; ?> </p>
		<button class="btn" type="submit">Voltar</button>

	</form>

	<?php
}

// Fechar a conexão: não é necessário colocar, o php fecha a conexão automaticamente para a gente
mysqli_close($conexao);

?>
	

<?php require_once "rodape.php" ?>