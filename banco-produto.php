<?php 

// INSERIR PRODUTOS
function insereProduto($conexao, Produto $produto) {
	$query = "INSERT INTO produtos (nome, preco, descricao, categoria_id, usado) VALUES('{$produto->nome}', {$produto->preco}, '{$produto->descricao}', {$produto->categoria->id}, {$produto->usado})";

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
		$categoria->nome = $produto_array['categoria_nome'];

		$produto = new Produto();
		$produto->nome = $produto_array['nome'];
		$produto->descricao = $produto_array['descricao'];
		$produto->categoria = $categoria;
		$produto->preco = $produto_array['preco'];
		$produto->usado = $produto_array['usado'];

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
	$query = "UPDATE produtos SET nome = '{$produto->nome}', preco = {$produto->preco}, descricao = '{$produto->descricao}', 
        categoria_id= {$produto->categoria_id}, usado = {$produto->usado} WHERE id = '{$produto->id}'";
	return mysqli_query($conexao, $query);
}

// REMOVER PRODUTO
function removeProduto($conexao, $id) {
	$query = "DELETE FROM produtos WHERE id = {$produto->id}";
	return mysqli_query($conexao, $query);
}