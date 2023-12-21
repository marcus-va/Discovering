import flask
from flask import jsonify
from google.cloud import firestore
from flask_cors import CORS; CORS(app)

import os

script_dir = os.path.dirname(os.path.abspath(__file__))
key_file_path = os.path.join(script_dir, "assist-2u-firebase-adminsdk-51903-ec84fa9368.json")

# Set the environment variable for the service account key file
os.environ["GOOGLE_APPLICATION_CREDENTIALS"] = key_file_path

# Initialize Firestore
db = firestore.Client()

# Initialize Flask app
app = flask.Flask(__name__)

app.config['CORS_HEADERS'] = 'Content-Type'

app.app_context().push()

# Fetch customers
@app.route('/customers', methods=['GET'])
def get_customers():
    customers_data = db.collection('clientes').get()
    customers = [doc.to_dict() for doc in customers_data]
    return jsonify(customers)

# Add a new customer
@app.route('/customers', methods=['POST'])
def add_customer():
    data = flask.request.json
    doc_ref = db.collection('clientes').document()
    doc_ref.set(data)
    return jsonify({'message': 'Customer added successfully'})

if __name__ == '__main__':
    app.run(debug=True)
