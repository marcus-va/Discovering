<?php

// Importa a biblioteca do Cloud Firestore
require_once "vendor/autoload.php";

// Cria uma instância do cliente do Firestore
$firestore = new Google\Cloud\Firestore\FirestoreClient();

// Obtém a coleção "clientes"
$colecao = $firestore->collection("clientes");

// Retorna um array de objetos que representam os clientes
function queryClientes() {

  // Cria uma consulta
  $consulta = $colecao->where("nome", ">=", "");

  // Executa a consulta
  $documentos = $consulta->documents();

  // Retorna um array de objetos que representam os clientes
  return $documentos;
}

?>
