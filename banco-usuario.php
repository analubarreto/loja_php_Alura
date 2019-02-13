<?php

function buscaUsuario($conexao, $email, $senha) {
	// transformar senha em md5
	$senhaMd5 = md5($senha);

	$query = "SELECT * FROM usuarios WHERE email='{$email}' AND senha = '{$senhaMd5}'";
	$resultado = mysqli_query($conexao, $query);
	$usuario = mysqli_fetch_assoc($resultado);
	return $usuario;
}