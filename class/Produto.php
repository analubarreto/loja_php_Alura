<?php 

class Produto {

	private $id;
	private $nome;
	private $preco;
	private $descricao;
	private $categoria;
	private $usado;

	public function precoComDesconto($valor = 0.1) {
		if ($valor > 0 && $valor <= 0.5) {
			return $this->preco - ($this->preco * $valor);
		}	
	}

	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
		return $this;
	}

	public function getNome() {
		return $this->nome;
	}

	public function setNome($nome) {
		$this->nome = $nome;
		return $this;
	}

	public function getPreco() {
		return $this->preco;
	}

	public function setPreco($preco) {
		if ($preco > 0) {
			$this->preco = $preco;
		}
	}

	public function getDescricao() {
		return $this->descricao;
	}

	public function setDescricao($descricao) {
		$this->descricao = $descricao;
		return $this;
	}

	public function getCategoria() {
		return $this->categoria;
	}

	public function setCategoria($categoria) {
		$this->categoria = $categoria;
		return $this;
	}

	public function isUsado() {
		return $this->usado;
	}

	public function setUsado($usado) {
		$this->usado = $usado;
		return $this;
	}
	
}