<?php
require_once 'firestore.php';

$firestore = new Firestore();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'nome' => $_POST['nome'],
        'email' => $_POST['email'],
        'telefone' => $_POST['telefone'],
        'endereco' => $_POST['endereco'],
    ];

    $firestore->addCustomer($data);

    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
