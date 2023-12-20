<?php

require_once "insert.php";
require_once "query.php";

// Insira um cliente
if (isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["telefone"]) && isset($_POST["endereco"])) {
  insertCliente();
}

// Consulte os clientes
$clientes = queryClientes();

// Imprima os clientes
foreach ($clientes as $cliente) {
  echo $cliente->nome . " - " . $cliente->email . " - " . $cliente->telefone . " - " . $cliente->endereco . "<br>";
}