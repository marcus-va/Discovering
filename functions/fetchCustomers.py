import os
from google.cloud import firestore

def fetch_customers():
    # Determine the path to the service account key file dynamically
    script_dir = os.path.dirname(os.path.abspath(__file__))
    key_file_path = os.path.join(script_dir, "service_account_key.json")

    # Set the environment variable for the service account key file
    os.environ["GOOGLE_APPLICATION_CREDENTIALS"] = key_file_path

    # Initialize Firestore client
    db = firestore.Client()

    # Get all documents from the 'clientes' collection
    docs = db.collection("clientes2").stream()

    # Print customer information
    for doc in docs:
        data = doc.to_dict()
        print(f"Nome: {data['nome']}, Email: {data['email']}, Telefone: {data['telefone']}, Endereço: {data['endereco']}")

if __name__ == "__main__":
    # Example usage
    fetch_customers()
