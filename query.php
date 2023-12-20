<?php

$firestore = new Google\Cloud\Firestore\FirestoreClient();

$colecao = $firestore->collection("clientes");

$documentos = $colecao->documents();

foreach ($documentos as $documento) {
  echo $documento->id;
}