<?php

use Google\Cloud\Firestore\FirestoreClient;

class Firestore
{
    private $db;


    public function __construct()
    {
        $this->db = new DatastoreClient([
            'projectId' => getenv('FIREBASE_PROJECT_ID'),
            'keyFilePath' => base64_decode(getenv('GOOGLE_APPLICATION_CREDENTIALS')),
        ]);
    }

    public function getCustomers()
    {
        $customersRef = $this->db->kind('naosei');
        $snapshot = $customersRef->entities();

        $customers = [];

        foreach ($snapshot as $document) {
            $customers[] = $document->data();
        }

        return $customers;
    }

    public function addCustomer($data)
    {
        $customersRef = $this->db->kind('naosei');
        $customersRef->add($data);
    }
}
