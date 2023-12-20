<?php

$cliente = [
  "nome" => $_POST["nome"],
  "email" => $_POST["email"],
  "telefone" => $_POST["telefone"],
  "endereco" => $_POST["endereco"],
];

$firestore = new Google\Cloud\Firestore\FirestoreClient();

$colecao = $firestore->collection("clientes");

$colecao->addDocument($cliente);