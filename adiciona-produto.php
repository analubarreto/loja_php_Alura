<?php 

// Requisições
require_once "conecta.php";
require_once "cabecalho.php";
require_once "class/Produto.php";
require_once "banco-produto.php";
require_once "logica-usuario.php";

// Verifica se o usuário está logado
verificaUsuario();

// Declarações
$produto = new Produto();
$produto->nome = $_POST["nome"];
$produto->preco = $_POST["preco"];
$produto->descricao = $_POST["descricao"]; // Enviando a descrição através do corpo
$produto->categoria_id = $_POST['categoria_id'];

if(array_key_exists($produto->usado = $_POST['usado'], $_POST)) {
	$produto->usado = "true";
} else {
	// Quando você concatena strings false é uma string vazia, ela não é zero
	$produto->usado = "false";
}



if(insereProduto($conexao, $produto)) { 
	?>
	<form action="../produto/produto-formulario.php">
		
		<p class="text-success"> O produto <?php echo $produto->nome?>, R$<?php echo $produto->preco?> adicionado com sucesso! </p>
		<button class="btn" type="submit">Voltar</button>

	</form>

<?php
 } else { 

 	require_once "formulario-inicio.php"; 
 	$msg = mysqli_error($conexao);

 	?>
	<form action="produto-formulario.php">

		<p class="text-danger"> O produto <?php echo $produto->nome?>, R$<?php echo $produto->preco;?> não foi adicionado: <?php $msg; ?> </p>
		<button class="btn" type="submit">Voltar</button>

	</form>

	<?php 
	require_once "formulario-fim.php";
}

// Fechar a conexão: não é necessário colocar, o php fecha a conexão automaticamente para a gente
mysqli_close($conexao);

?>
	

<?php require_once "../rodape.php" ?>