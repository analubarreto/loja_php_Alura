<?php 

// Requisições
require_once "conecta.php";
require_once "cabecalho.php";
require_once "banco-produto.php";

$id = $_POST['id'];
removeProduto($conexao, $id);

// Volta para a lista automaticamente
header("Location: produto-lista.php?removido=true");

// Deixar claro que não é para o php executar mais nada
die();
