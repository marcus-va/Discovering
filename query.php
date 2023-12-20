<?php

$firestore = new Google\Cloud\Firestore\FirestoreClient();

$colecao = $firestore->collection("clientes");

$documentos = $colecao->documents();

return $documentos;