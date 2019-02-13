<?php

// Requisições
require_once "conecta.php";
require_once "banco-usuario.php";
require_once "logica-usuario.php";

// Declarações
$usuario = buscaUsuario($conexao, $_POST['email'], $_POST['senha']);

// Chamada da função usuário
if ($usuario == null) {
	// Voltar para a página index.php com login setado para FALSE
	header("Location: index.php?login=0");
} else {
	// Set cookie usuario_logado
	logaUsuario($usuario["email"]);
	// Voltar para a página index.php com login setado para TRUE
	header("Location: index.php?login=1");
}

die();


