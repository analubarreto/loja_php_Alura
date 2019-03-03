<?php

class ProdutoDAO {

    private $conexao;

    function __construct($conexao) {
        $this->conexao = $conexao;
    }

    function insereProduto(Produto $produto) {
        $query = "INSERT INTO produtos (nome, preco, descricao, categoria_id, usado, isbn, tipoProduto) VALUES('{$produto->getNome()}', {$produto->getPreco()}, '{$produto->getDescricao()}', {$produto->getCategoria()->getId()}, {$produto->isUsado()}, '{$produto->getIsbn()}', '{$produto->getTipoProduto()}')";
    
        // Retorno da execução da conexão (conexão, query)
        return mysqli_query($this->conexao, $query);
    
    }
    
    function listaProdutos() {
    
        $produtos = array();
        $resultado = mysqli_query($this->conexao, "SELECT p.*, c.nome AS categoria_nome FROM produtos AS p JOIN categorias AS c ON p.categoria_id = c.id");
    
        // Enquanto houverem produtos sendo buscados pelo mysqli_fetch_assoc
        while($produto_array = mysqli_fetch_assoc($resultado)) {
    
            $categoria = new Categoria();
            $categoria->setNome($produto_array['categoria_nome']);
    
            $nome = $produto_array['nome'];
            $preco = $produto_array['preco'];
            $descricao = $produto_array['descricao'];
            $categoria = $categoria;
            $usado = $produto_array['usado'];
            $isbn = $produto_array['isbn'];
            $tipoProduto = $produto_array['tipoProduto'];
    
            $produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
            $produto->setIsbn($isbn);
            $produto->setTipoProduto($tipoProduto);
    
            array_push($produtos, $produto);
    
        }
    
        return $produtos;
    }
    
    function buscaProduto($id) {
        $query = "SELECT * FROM produtos WHERE id = {$id}";
        $resultado = mysqli_query($this->conexao, $query);
        return mysqli_fetch_assoc($resultado);
    }
    
    function alteraProduto(Produto $produto) {
        $query = "UPDATE produtos SET nome = '{$produto->getNome()}', preco = {$produto->getPreco()}, descricao = '{$produto->getDescricao()}', 
            categoria_id = {$produto->getCategoria()->getId()}, usado = {$produto->isUsado()}, isbn = '{$produto->getIsbn()}', tipoProduto = '{$produto->getTipoProduto()}'  WHERE id = '{$produto->getId()}'";
            
        return mysqli_query($this->conexao, $query);
    }
    
    function removeProduto($id) {
        $query = "DELETE FROM produtos WHERE id = {$id}";
        return mysqli_query($this->conexao, $query);
    }

}