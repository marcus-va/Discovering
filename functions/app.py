# app.py
from flask import Flask, render_template, request, jsonify
from flask_cors import CORS
import firebase_admin
from firebase_admin import credentials, firestore

import os

script_dir = os.path.dirname(os.path.abspath(__file__))
key_file_path = os.path.join(script_dir, "assist-2u-firebase-adminsdk-51903-ec84fa9368.json")
app = Flask(__name__)
CORS(app)

# Initialize Firebase Admin SDK
cred = credentials.Certificate("assist-2u-firebase-adminsdk-51903-ec84fa9368.json")
firebase_admin.initialize_app(cred)

# Initialize Firestore
db = firestore.client()

# Route to fetch customers
@app.route('/api/customers', methods=['GET'])
def get_customers():
    customers = []
    docs = db.collection('clientes').stream()
    for doc in docs:
        customers.append(doc.to_dict())
    return jsonify(customers)

# Route to register a new customer
@app.route('/api/register-customer', methods=['POST'])
def register_customer():
    data = request.get_json()
    db.collection('clientes').add(data)
    return jsonify({'message': 'Customer registered successfully!'})

if __name__ == '__main__':
    app.run(debug=True)
