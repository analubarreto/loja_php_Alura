<?php

class ProdutoDAO {

    private $conexao;

    function __construct($conexao) {
        $this->conexao = $conexao;
    }

    function insereProduto(Produto $produto) {

        $isbn = "";
        if($produto->hasIsbn()) {
            $isbn = $produto->getIsbn();
        }

        $taxaImpressao = "";
        if($produto->hasTaxaImpressao()) {
            $taxaImpressao = $produto->getTaxaImpressao();
        }

        $waterMark = "";
        if($produto->hasWaterMark()) {
            $waterMark = $produto->getWaterMark();
        }

        $tipoProduto = get_class($produto);

        $query = "INSERT INTO produtos (nome, preco, descricao, categoria_id, usado, isbn, tipoProduto, taxaImpressao, waterMark) VALUES('{$produto->getNome()}', {$produto->getPreco()}, '{$produto->getDescricao()}', {$produto->getCategoria()->getId()}, {$produto->isUsado()}, '{$isbn}', '{$tipoProduo}, '{$taxaImpressao}', '{$waterMark}')";
    
        // Retorno da execução da conexão (conexão, query)
        return mysqli_query($this->conexao, $query);
    
    }
    
    function listaProdutos() {
    
        $produtos = array();
        $resultado = mysqli_query($this->conexao, "SELECT p.*, c.nome AS categoria_nome FROM produtos AS p JOIN categorias AS c ON p.categoria_id = c.id");
    
        while($produto_array = mysqli_fetch_assoc($resultado)) {
            
            $tipoProduto = $produto_array['tipoProduto'];

            $factory = new ProdutoFactory();
            $produto = $factory->criarProd($tipoProduto, $produto_array);
            $produto->atualizaBaseadoEm($produto_array);

            $produto->getCategoria()->setNome($produto_array['categoria_nome']);
    
            array_push($produtos, $produto);
    
        }
    
        return $produtos;
    }
    
    function buscaProduto($id) {

        $query = "SELECT * FROM produtos WHERE id = {$id}";
        $resultado = mysqli_query($this->conexao, $query);
        return mysqli_fetch_assoc($resultado);

        $produto_buscado = mysqli_fetch_assoc($resultado);
        
        $categoria = new Categoria();
        $categoria->setId($produto_buscado['categoria_id']);

        $nome = $produto_buscado['nome'];
        $descricao = $produto_buscado['descricao'];
        $preco = $produto_buscado['preco'];
        $usado = $produto_buscado['preco'];
        $isbn = $produto_buscado['isbn'];
        $tipoProduto = $produto_buscado['tipoProduto'];
        $taxaImpressao = $produto_buscado['taxaImpressao'];
        $waterMark = $produto_buscado['waterMark'];

        if ($tipoProduto == "Livro Físico") {
            $produto = new LivroFisico($nome, $preco, $descricao, $categoria, $usado);
            $produto->setIsbn($isbn);
            $produto->setTaxaImpressao($taxaImpressao);
        } else if ($tipoProduto == "Ebook") {
            $produto = new Ebook($nome, $preco, $descricao, $categoria, $usado);
            $produto->setIsbn($isbn);
            $produto->setWaterMark($waterMark);
        } else {
            $produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
        }

        $produto->setId($produto_buscado['id']);

        return $produto;

    }
    
    function alteraProduto(Produto $produto) {

        $isbn = "";
        if($produto->hasIsbn()) {
            $isbn = $produto->getIsbn();
        }

        $tipoProduto = get_class($produto);

        $query = "UPDATE produtos SET nome = '{$produto->getNome()}', preco = {$produto->getPreco()}, descricao = '{$produto->getDescricao()}', 
            categoria_id = {$produto->getCategoria()->getId()}, usado = {$produto->isUsado()}, isbn = '{$isbn->getIsbn()}', tipoProduto = '{$tipoProduto->getTipoProduto()}', taxaImpressao = {$taxaImpressao->getTaxaImpressao()}, waterMark =  '{$waterMark->getWaterMark()}' WHERE id = '{$produto->getId()}'";
            
        return mysqli_query($this->conexao, $query);
    }
    
    function removeProduto($id) {
        $query = "DELETE FROM produtos WHERE id = {$id}";
        return mysqli_query($this->conexao, $query);
    }

}