<?php

// Importa a função `queryClientes()`
require_once "query.php";

// Obtém os dados do formulário
$nome = $_POST["nome"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];
$endereco = $_POST["endereco"];

// Insere o cliente no banco de dados
$cliente = [
  "nome" => $nome,
  "email" => $email,
  "telefone" => $telefone,
  "endereco" => $endereco,
];

queryClientes()->insert($cliente);

// Redireciona para a página inicial
header("Location: index.html");

?>
