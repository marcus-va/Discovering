<?php

// Importa a biblioteca do Cloud Firestore
require_once "vendor/autoload.php";

// Cria uma instância do cliente do Firestore
$firestore = new Google\Cloud\Firestore\FirestoreClient();

// Obtém a coleção "clientes"
$colecao = $firestore->collection("clientes");

// Insere um novo documento na coleção
function insert($cliente) {

  // Cria um novo documento
  $documento = $colecao->document();

  // Adiciona os dados do cliente ao documento
  $documento->set([
    "nome" => $cliente["nome"],
    "email" => $cliente["email"],
    "telefone" => $cliente["telefone"],
    "endereco" => $cliente["endereco"],
  ]);

  // Salva o documento
  $documento->save();
}

?>
