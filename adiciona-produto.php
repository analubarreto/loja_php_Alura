<?php 

// Requisições
require_once "../conexoes/conecta.php";
require_once "../cabecalho.php";
require_once "banco-produto.php";
require_once "logica-usuario.php";

// Verifica se o usuário está logado
verificaUsuario();

// Declarações
$nome = $_POST["nome"];
$preco = $_POST["preco"];
$descricao = $_POST["descricao"]; // Enviando a descrição através do corpo
$categoria_id = $_POST['categoria_id'];

if(array_key_exists($usado = $_POST['usado'], $_POST)) {
	$usado = "true";
} else {
	// Quando você concatena strings false é uma string vazia, ela não é zero
	$usado = "false";
}



if(insereProduto($conexao, $nome, $preco, $descricao, $categoria_id, $usado)) { 
	?>
	<form action="produto-formulario.php">
		
		<p class="text-success"> O produto <?php echo $nome?>, R$<?php echo $preco?> adicionado com sucesso! </p>
		<button class="btn" type="submit">Voltar</button>

	</form>

<?php
 } else { 

 	require_once "formulario-inicio.php"; 
 	$msg = mysqli_error($conexao);

 	?>
	<form action="produto-formulario.php">

		<p class="text-danger"> O produto <?php echo $nome?>, R$<?php echo $preco;?> não foi adicionado: <?php $msg; ?> </p>
		<button class="btn" type="submit">Voltar</button>

	</form>

	<?php 
	require_once "formulario-fim.php";
}

// Fechar a conexão: não é necessário colocar, o php fecha a conexão automaticamente para a gente
mysqli_close($conexao);

?>
	

<?php require_once "rodape.php" ?>