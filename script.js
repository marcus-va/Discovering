// app.js
// Initialize Firebase
const firebaseConfig = {
    apiKey: "AIzaSyBDg8DoMJlqrVB3EqPPfq9_qgaORyyv-W8",
    authDomain: "assist-2u.firebaseapp.com",
    projectId: "assist-2u",
    storageBucket: "assist-2u.appspot.com",
    messagingSenderId: "330758355520",
    appId: "1:330758355520:web:e8e15ef77d5ca504367da5"
  };

firebase.initializeApp(firebaseConfig);

const db = firebase.firestore();

// Function to register a new customer
function registerCustomer() {
    const name = $("#name").val();
    const email = $("#email").val();
    const phone = $("#phone").val();
    const address = $("#address").val();

    db.collection("clientes").add({
        nome: name,
        email: email,
        telefone: phone,
        endereco: address
    })
    .then(() => {
        alert("Customer registered successfully!");
        $("#customerForm")[0].reset();
        fetchCustomers();
    })
    .catch(error => {
        console.error("Error adding customer: ", error);
    });
}

// Function to fetch customers and display in the table
function fetchCustomers() {
    db.collection("clientes").get()
    .then(snapshot => {
        $("#customerTableBody").empty();
        snapshot.forEach(doc => {
            const customer = doc.data();
            $("#customerTableBody").append(`
                <tr>
                    <td>${customer.nome}</td>
                    <td>${customer.email}</td>
                    <td>${customer.telefone}</td>
                    <td>${customer.endereco}</td>
                </tr>
            `);
        });
    })
    .catch(error => {
        console.error("Error fetching customers: ", error);
    });
}

// Fetch customers when the page loads
$(document).ready(() => {
    fetchCustomers();
});
