<?php

class Livro extends Produto {

  private $isbn;

  public function getIsbn() {
		return $this->isbn;
	}

	public function setIsbn($isbn) {
		$this->isbn = $isbn;
		return $this;
	}

	public function calculaImposto() {
		return $this->getPreco() * 0.065;
	}

}