<?php 

class Produto {

	private $id;
	private $nome;
	private $preco;
	private $descricao;
	private $categoria;
	private $usado;

	function __construct($nome, $preco, $descricao, Categoria $categoria, $usado) {
		$this->nome = $nome;
		$this->preco = $preco;
		$this->descricao = $descricao;
		$this->categoria = $categoria;
		$this->usado = $usado;
	}

	function __toString() {
		return $this->nome . ": R$ " . $this->preco;
	}

	public function precoComDesconto($valor = 0.1) {
		if ($valor > 0 && $valor <= 0.5) {
			return $this->preco - ($this->preco * $valor);
		}	
	}

	public function getId() {
		return $this->id;
	}

	public function setID($id) {
		$this->id = $id;
		return $this;
	}

	public function getNome() {
		return $this->nome;
	}

	public function getPreco() {
		return $this->preco;
	}

	public function getDescricao() {
		return $this->descricao;
	}

	public function getCategoria() {
		return $this->categoria;
	}

	public function isUsado() {
		return $this->usado;
	}

	public function setUsado($usado) {
		$this->usado = $usado;
		return $this;
	}
	
}