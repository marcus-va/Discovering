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

// Insere um novo documento na coleção
function insertCliente($cliente) {

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

  return $documento->
