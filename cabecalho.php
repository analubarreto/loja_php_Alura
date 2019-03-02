<?php 

function carregaClasse($nomeDaClasse) {
	require_once("class/".$nomeDaClasse.".php");
}

spl_autoload_register("carregaClasse");

error_reporting(E_ALL ^ E_NOTICE);
require_once "mostra-alerta.php";
require_once "conecta.php";

?>

<html>
<head>
	
	<meta charset="utf-8">
	<title>Minha Loja</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/loja.css
	">

</head>

<body>
			
	<ul class="nav nav-pills nav-fill">
		<li class="nav-item">
			<a class="nav-link" href="index.php">Minha Loja</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="produto-formulario.php">Adiciona Produto</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="produto-lista.php">Produtos</a
			>
		</li>
		<li class="nav-item">
			<a class="nav-link disabled" href="contato.php">Contato</a>
		</li>
	</ul>

	<div class="container">
		
		<div class="principal">
			<?php
				// Requisições
				require_once "mostra-alerta.php";

				// Chamada de funções 
				mostraAlerta("success");
				mostraAlerta("danger");
				 ?>