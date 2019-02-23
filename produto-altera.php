<?php 

// Requisições
require_once "conecta.php";
require_once "cabecalho.php";
require_once "class/Produto.php";
require_once "banco-produto.php";

// Declarações
$categoria = new Categoria();
$categoria->id = $_POST['categoria_id'];

$produto = new Produto();
$produto->setId($_POST["id"]);
$produto->setNome($_POST["nome"]);
$produto->setPreco($_POST["preco"]);
$produto->setDescricao($_POST["descricao"]); // Enviando a descrição através do corpo

if(array_key_exists('usado', $_POST)) {
	$produto->setUsado("true") ;
} else {
	// Quando você concatena strings false é uma string vazia, ela não é zero
	$produto->setUsado("false");
}

$produto->setCategoria($categoria);

if(alteraProduto($conexao, $produto)) {
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