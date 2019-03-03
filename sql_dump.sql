USE lojadb;

DROP TABLE produtos;

CREATE TABLE produtos (
	id INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
	nome VARCHAR(255) NOT NULL,
	preco DECIMAL(10,2) NOT NULL);
	
INSERT INTO produtos VALUES(1, 'Carro', 20000);
INSERT INTO produtos VALUES(2, 'Motocicleta', 10000);
INSERT INTO produtos (nome, preco) VALUES('Bicicleta', 300);
INSERT INTO produtos (nome, preco) VALUES('Livro Stephen King', 75);

DELETE FROM produtos WHERE id=9;

ALTER TABLE produtos ADD COLUMN descricao TEXT;
ALTER TABLE produtos ADD COLUMN categoria_id INTEGER NOT NULL;
ALTER TABLE produtos ADD COLUMN usado BOOLEAN DEFAULT FALSE;
ALTER TABLE produtos ADD COLUMN isbn VARCHAR(255);
ALTER TABLE produtos ADD COLUMN tipoProduto VARCHAR(255) NOT NULL;

UPDATE produtos SET descricao = "Descrição desse produto";
UPDATE produtos SET categoria_id=3;
UPDATE produtos SET categoria_id=4 WHERE id=15;
UPDATE produtos SET categoria_id = 5 WHERE ID = 2;
UPDATE produtos SET isbn = 111111111111 WHERE ID = 2;

SELECT * FROM produtos;

/////////////////////////////////////

CREATE TABLE categorias (
	id INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
	nome VARCHAR(255) NOT NULL
);

INSERT INTO categorias (nome) VALUES ("esporte"), ("escolar"), ("mobilidade");
INSERT INTO categorias (nome) VALUES ("guloseimas");
INSERT INTO categorias (nome) VALUES ("livros");
INSERT INTO categorias (nome) VALUES ("eletrônicos");

SELECT * FROM categorias;

////////////////////////////////////////

CREATE TABLE usuarios (
	id INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
	email VARCHAR(255) NOT NULL,
	senha VARCHAR(255) NOT NULL
);

INSERT INTO usuarios (email, senha) VALUES ("analuibm2@gmail.com", "733d7be2196ff70efaf6913fc8bdcabf");

SELECT * FROM usuarios;