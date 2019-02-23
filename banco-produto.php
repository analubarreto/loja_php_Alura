<?php 
require_once "conecta.php";
require_once "class/Produto.php";
require_once "class/Categoria.php";


// INSERIR PRODUTOS
function insereProduto($conexao, Produto $produto) {
	$query = "INSERT INTO produtos (nome, preco, descricao, categoria_id, usado) VALUES('{$produto->getNome()}', {$produto->getPreco()}, '{$produto->getDescricao()}', {$produto->getCategoria()->getId()}, {$produto->getUsado()})";

	// Retorno da execução da conexão (conexão, query)
	return mysqli_query($conexao, $query);

}

// LISTAR PRODUTOS
function listaProdutos($conexao) {
	// Declaração do array produtos vazio
	$produtos = array();
	$resultado = mysqli_query($conexao, "SELECT p.*, c.nome AS categoria_nome FROM produtos AS p JOIN categorias AS c ON p.categoria_id = c.id");

	// Enquanto houverem produtos sendo buscados pelo mysqli_fetch_assoc
	while($produto_array = mysqli_fetch_assoc($resultado)) {

		$categoria = new Categoria();
		$categoria->setNome($produto_array['categoria_nome']);

		$produto = new Produto();
		$produto->setNome($produto_array['nome']);
		$produto->setDescricao($produto_array['descricao']);
		$produto->setCategoria($categoria->setNome($categoria));
		$produto->setPreco($produto_array['preco']);
		$produto->setUsado($produto_array['usado']);

		// Colocar dentro do array produtos, o produto
		array_push($produtos, $produto);

	}

	// Retornar array de produtos
	return $produtos;
}

// BUSCA PRODUTO
function buscaProduto($conexao, $id) {
	$query = "SELECT * FROM produtos WHERE id = {$id}";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

// ALTERA PRODUTO
function alteraProduto($conexao, Produto $produto) {
	$query = "UPDATE produtos SET nome = '{$produto->getNome()}', preco = {$produto->preco}, descricao = '{$produto->getDescricao()}', 
        categoria_id= {$produto->categoria->getId()}, usado = {$produto->getUsado()} WHERE id = '{$produto->getId()}'";
	return mysqli_query($conexao, $query);
}

// REMOVER PRODUTO
function removeProduto($conexao, $id) {
	$query = "DELETE FROM produtos WHERE id = {$id}";
	return mysqli_query($conexao, $query);
}