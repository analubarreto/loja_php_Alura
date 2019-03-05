<?php

class Ebook extends Livro {

  private $waterMark;

	public function getWaterMark() {
		return $this->waterMark;
	}

	public function setWaterMark($waterMark) {
		return $this->waterMark;
		return $this;
	}
}