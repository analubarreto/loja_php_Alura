<?php 


// INSERIR PRODUTOS
function insereProduto($conexao, $nome, $preco, $descricao, $categoria_id, $usado) {
	$query = "INSERT INTO produtos (nome, preco, descricao, categoria_id, usado) VALUES('{$nome}', {$preco}, '{$descricao}', {$categoria_id}, {$usado})";

	// Retorno da execução da conexão (conexão, query)
	return mysqli_query($conexao, $query);

}

// LISTAR PRODUTOS
function listaProdutos($conexao) {
	// Declaração do array produtos vazio
	$produtos = [];
	$resultado = mysqli_query($conexao, "SELECT p.*, c.nome AS categoria_nome FROM produtos AS p JOIN categorias AS c ON p.categoria_id = c.id");

	// Enquanto houverem produtos sendo buscados pelo mysqli_fetch_assoc
	while($produto = mysqli_fetch_assoc($resultado)) {

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
function alteraProduto($conexao, $id, $nome, $preco, $descricao, $categoria_id, $usado) {
	$query = "UPDATE produtos SET nome = '{$nome}', preco = {$preco}, descricao = '{$descricao}', 
        categoria_id= {$categoria_id}, usado = {$usado} WHERE id = '{$id}'";
	return mysqli_query($conexao, $query);
}

// REMOVER PRODUTO
function removeProduto($conexao, $id) {
	$query = "DELETE FROM produtos WHERE id = {$id}";
	return mysqli_query($conexao, $query);
}