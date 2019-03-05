<?php 

require_once "conecta.php";
require_once "cabecalho.php";
require_once "logica-usuario.php";

// Verifica se o usuário está logado
verificaUsuario();

$tipoProduto = $_POST['tipoProduto'];
$categoria_id = $_POST['categoria_id'];

$factory = new ProdutoFactory();
$produto = $factory->criarProd($tipoProduto, $_POST);
$produto->atualizaBaseadoEm($_POST);

$produto->getCategoria()->setId($categoria_id);

array_key_exists('usado', $_POST) ? $produto->setUsado("true") : $produto->setUsado("false");

$produtoDAO = new ProdutoDAO($conexao);

if($produtoDAO->insereProduto($produto)) { ?>
	<form action="produto-formulario.php">
		
		<p class="text-success"> O produto <?php echo $produto->getNome()?>, R$<?php echo $produto->getPreco()?> adicionado com sucesso! </p>
		<button class="btn" type="submit">Voltar</button>

	</form>

<?php
 } else { 

 	$msg = mysqli_error($conexao);

 	?>
	<form action="produto-formulario.php">

		<p class="text-danger"> O produto <?php echo $produto->getNome()?>, R$<?php echo $produto->getPreco()?> não foi adicionado
		<br><span>Erro: <?=var_dump($msg);?></span></p>
		<button class="btn" type="submit">Voltar</button>

	</form>

	<?php 
}

mysqli_close($conexao);

?>
	

<?php require_once "rodape.php" ?>