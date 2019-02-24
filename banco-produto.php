<?php 
require_once "conecta.php";
require_once "class/Produto.php";
require_once "class/Categoria.php";

function insereProduto($conexao, Produto $produto) {
	$query = "INSERT INTO produtos (nome, preco, descricao, categoria_id, usado) VALUES('{$produto->getNome()}', {$produto->getPreco()}, '{$produto->getDescricao()}', {$produto->getCategoria()->getId()}, {$produto->isUsado()})";

	// Retorno da execução da conexão (conexão, query)
	return mysqli_query($conexao, $query);

}

function listaProdutos($conexao) {

	$produtos = array();
	$resultado = mysqli_query($conexao, "SELECT p.*, c.nome AS categoria_nome FROM produtos AS p JOIN categorias AS c ON p.categoria_id = c.id");

	// Enquanto houverem produtos sendo buscados pelo mysqli_fetch_assoc
	while($produto_array = mysqli_fetch_assoc($resultado)) {

		$categoria = new Categoria();
		$categoria->setNome($produto_array['categoria_nome']);

		$produto = new Produto();
		$produto->setNome($produto_array['nome']);
		$produto->setDescricao($produto_array['descricao']);
		$produto->setCategoria($categoria);
		$produto->setPreco($produto_array['preco']);
		$produto->setUsado($produto_array['usado']);

		array_push($produtos, $produto);

	}

	return $produtos;
}

function buscaProduto($conexao, $id) {
	$query = "SELECT * FROM produtos WHERE id = {$id}";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function alteraProduto($conexao, Produto $produto) {
	$query = "UPDATE produtos SET nome = '{$produto->getNome()}', preco = {$produto->getPreco()}, descricao = '{$produto->getDescricao()}', 
		categoria_id= {$produto->getCategoria()->getId()}, usado = {$produto->isUsado()} WHERE id = '{$produto->getId()}'";
		
	return mysqli_query($conexao, $query);
}

function removeProduto($conexao, $id) {
	$query = "DELETE FROM produtos WHERE id = {$id}";
	return mysqli_query($conexao, $query);
}