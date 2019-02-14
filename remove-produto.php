<?php 

// Requisições
require_once "conecta.php";
require_once "cabecalho.php";
require_once "banco-produto.php";
require_once "logica-usuario.php";

$id = $_POST['id'];
removeProduto($conexao, $id);
$_SESSION["success"] = "Produto removido com sucesso";

// Volta para a lista automaticamente
header("Location: produto-lista.php");

// Deixar claro que não é para o php executar mais nada
die();
