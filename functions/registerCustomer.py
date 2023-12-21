import os
from google.cloud import firestore

def register_customer(nome, email, telefone, endereco):
    # Determine the path to the service account key file dynamically
    script_dir = os.path.dirname(os.path.abspath(__file__))
    key_file_path = os.path.join(script_dir, "path/to/your/service_account_key.json")

    # Set the environment variable for the service account key file
    os.environ["GOOGLE_APPLICATION_CREDENTIALS"] = key_file_path

    # Initialize Firestore client
    db = firestore.Client()

    # Define the data to be added
    data = {
        "nome": nome,
        "email": email,
        "telefone": telefone,
        "endereco": endereco
    }

    # Add a new document with a generated ID
    db.collection("clientes2").add(data)

if __name__ == "__main__":
    # Example usage
    register_customer("John Doe", "john@example.com", "123456789", "123 Main St")
