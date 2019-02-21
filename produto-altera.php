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
$produto->id = $_POST["id"];
$produto->nome = $_POST["nome"];
$produto->preco = $_POST["preco"];
$produto->descricao = $_POST["descricao"]; // Enviando a descrição através do corpo

if(array_key_exists('usado', $_POST)) {
	$produto->usado = "true";
} else {
	// Quando você concatena strings false é uma string vazia, ela não é zero
	$produto->usado = "false";
}

$produto->categoria = $categoria;

if(alteraProduto($conexao, $produto)) {
	?>
	<form action="produto-lista.php">
		
		<p class="text-success"> O produto <?php echo $produto->nome?>, R$<?php echo $produto->preco?> alterado com sucesso! </p>
		<button class="btn" type="submit">Voltar</button>

	</form>

<?php
 } else { 

 	$msg = mysqli_error($conexao);

 	?>
	<form action="produto-lista.php">

		<p class="text-danger"> O produto <?php echo $produto->nome?>, R$<?php echo $produto->preco;?> não foi alterado: <?php $msg; ?> </p>
		<button class="btn" type="submit">Voltar</button>

	</form>

	<?php
}

// Fechar a conexão: não é necessário colocar, o php fecha a conexão automaticamente para a gente
mysqli_close($conexao);

?>
	

<?php require_once "rodape.php" ?>