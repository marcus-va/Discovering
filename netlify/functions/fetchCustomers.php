<?php


require_once 'firestore.php';

$firestore = new Firestore();

$customers = $firestore->getCustomers();

echo json_encode($customers);