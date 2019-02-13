<?php 

// Requisições
require_once "conecta.php";
require_once "cabecalho.php";
require_once "banco-produto.php";


// Declarações
$id = $_POST["id"];
$nome = $_POST["nome"];
$preco = $_POST["preco"];
$descricao = $_POST["descricao"]; // Enviando a descrição através do corpo
$categoria_id = $_POST['categoria_id'];

if(array_key_exists('usado', $_POST)) {
	$usado = "true";
} else {
	// Quando você concatena strings false é uma string vazia, ela não é zero
	$usado = "false";
}



if(alteraProduto($conexao, $id, $nome, $preco, $descricao, $categoria_id, $usado)) {
	?>
	<form action="produto-lista.php">
		
		<p class="text-success"> O produto <?php echo $nome?>, R$<?php echo $preco?> alterado com sucesso! </p>
		<button class="btn" type="submit">Voltar</button>

	</form>

<?php
 } else { 

 	$msg = mysqli_error($conexao);

 	?>
	<form action="produto-lista.php">

		<p class="text-danger"> O produto <?php echo $nome?>, R$<?php echo $preco;?> não foi alterado: <?php $msg; ?> </p>
		<button class="btn" type="submit">Voltar</button>

	</form>

	<?php
}

// Fechar a conexão: não é necessário colocar, o php fecha a conexão automaticamente para a gente
mysqli_close($conexao);

?>
	

<?php require_once "rodape.php" ?>