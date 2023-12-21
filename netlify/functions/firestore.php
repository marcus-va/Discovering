<?php
require_once __DIR__ . '/vendor/autoload.php';


use Google\Cloud\Firestore\FirestoreClient;

class Firestore
{
    private $db;


    public function __construct()
    {
        $this->db = new FirestoreClient([
            'projectId' => getenv('FIREBASE_PROJECT_ID'),
            'keyFilePath' => base64_decode(getenv('GOOGLE_APPLICATION_CREDENTIALS')),
        ]);
    }

    public function getCustomers()
    {
        $customersRef = $this->db->collection('(default)');
        $snapshot = $customersRef->documents();

        $customers = [];

        foreach ($snapshot as $document) {
            $customers[] = $document->data();
        }

        return $customers;
    }

    public function addCustomer($data)
    {
        $customersRef = $this->db->collection('(default)');
        $customersRef->add($data);
    }
}
