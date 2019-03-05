USE lojadb;

DROP TABLE produtos;

CREATE TABLE produtos (
	id INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
	nome VARCHAR(255) NOT NULL,
	preco DECIMAL(10,2) NOT NULL),
	descricao TEXT,
	categoria_id INTEGER NOT NULL,
	usado BOOLEAN DEFAULT FALSE,
	isbn VARCHAR(255),
	tipoProduto VARCHAR(255) NOT NULL
);
	
INSERT INTO produtos (nome, preco, descricao, categoria_id, usado, isbn)
VALUES('Livro Stephen King', 75, 'Um livro pelo grande autor Stephen King', 5, 0, '002589753', 'Livro');

INSERT INTO produtos

DELETE FROM produtos WHERE id=2;
DELETE FROM produtos WHERE id=8;

ALTER TABLE produtos ADD COLUMN taxaImpressao VARCHAR(255);
ALTER TABLE produtos DROP COLUMN taxaImpressao;

ALTER TABLE produtos ADD COLUMN waterMark VARCHAR(255);
ALTER TABLE produtos DROP COLUMN waterMark;

SELECT * FROM produtos;

/////////////////////////////////////

CREATE TABLE categorias (
	id INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
	nome VARCHAR(255) NOT NULL
);

DROP TABLE categorias;

INSERT INTO categorias (nome) VALUES ("Esporte"), ("Papelaria"), ("Mobilidade"), ("Guloseimas"), ("Livros"), ("Eletrônicos");

SELECT * FROM categorias;

////////////////////////////////////////

CREATE TABLE usuarios (
	id INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
	email VARCHAR(255) NOT NULL,
	senha VARCHAR(255) NOT NULL
);

INSERT INTO usuarios (email, senha) VALUES ("analuibm2@gmail.com", "733d7be2196ff70efaf6913fc8bdcabf");

SELECT * FROM usuarios;