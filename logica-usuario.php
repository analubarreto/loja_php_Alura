<?php

// se a sessão existe fica na sessão, se ela não existe, cria a sessão
// Usar sessão ao invés de cookie

function usuarioEstaLogado() {
	return isset($_SESSION["usuario_logado"]);
}

function verificaUsuario() {
	if(!usuarioEstaLogado()) {
		$_SESSION["danger"] = "Você não tem acesso a esta funcionalidade";
		header("Location: index.php");
		die();
	}
}

function usuarioLogado() {
	return $_SESSION["usuario_logado"];
}

function logaUsuario($email) {
	$_SESSION["usuario_logado"] = $email;
}

function logout() {
	session_destroy();
	session_start();
}