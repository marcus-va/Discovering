<?php

// Importa a biblioteca do Cloud Firestore
require_once "vendor/autoload.php";

// Cria uma instância do cliente do Firestore
$firestore = new Google\Cloud\Firestore\FirestoreClient([
  "projectId" => $_ENV["FIREBASE_PROJECT_ID"],
  "clientId" => $_ENV["FIREBASE_CLIENT_ID"],
  "authUri" => $_ENV["FIREBASE_AUTH_URI"],
  "tokenUri" => $_ENV["FIREBASE_TOKEN_URI"],
  "authProviderX509CertUrl" => $_ENV["FIREBASE_AUTH_PROVIDER_X509_CERT_URL"],
]);

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
