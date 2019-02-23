<?php 

// Requisições
require_once "conecta.php";
require_once "cabecalho.php";
require_once "class/Produto.php";
require_once "class/Categoria.php";
require_once "banco-produto.php";
require_once "logica-usuario.php";;

// Verifica se o usuário está logado
verificaUsuario();

// Declarações
$categoria = new Categoria();
$categoria->setId($_POST['categoria_id']);

$produto = new Produto();
$produto->setNome($_POST["nome"]);
$produto->preco($_POST["preco"]);
$produto->descricao($_POST["descricao"]); // Enviando a descrição através do corpo
$produto->setCategoria($categoria->setNome($categoria));

if(array_key_exists('usado', $_POST)) {
	$produto->setUsado("true");
} else {
	// Quando você concatena strings false é uma string vazia, ela não é zero
	$produto->setUsado("false");
}



if(insereProduto($conexao, $produto)) { ?>
	<form action="produto-formulario.php">
		
		<p class="text-success"> O produto <?php echo $produto->getNome()?>, R$<?php echo $produto->getPreco()?> adicionado com sucesso! </p>
		<button class="btn" type="submit">Voltar</button>

	</form>

<?php
 } else { 

 	$msg = mysqli_error($conexao);

 	?>
	<form action="produto-formulario.php">

		<p class="text-danger"> O produto <?php echo $produto->getNome?>, R$<?php echo $produto->getPreco()?> não foi adicionado
		<br><span>Erro: <?=var_dump($msg);?></span></p>
		<button class="btn" type="submit">Voltar</button>

	</form>

	<?php 
}

// Fechar a conexão: não é necessário colocar, o php fecha a conexão automaticamente para a gente
mysqli_close($conexao);

?>
	

<?php require_once "rodape.php" ?>