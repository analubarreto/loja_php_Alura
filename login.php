<?php

// Requisições
require_once "conecta.php";
require_once "banco-usuario.php";
require_once "logica-usuario.php";

session_start();

// Declarações
$usuario = buscaUsuario($conexao, $_POST['email'], $_POST['senha']);

// Chamada da função usuário
if ($usuario == null) {
	$_SESSION["danger"] = "Usuário ou senha inválido";
	header("Location: index.php");
} else {
	// Set cookie usuario_logado
	logaUsuario($usuario["email"]);
	$_SESSION["success"] = "Usuário logado com sucesso";
	header("Location: index.php");
}

die();


