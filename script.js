const baseURL = 'https://console.cloud.google.com/firestore/databases/assiti/data/panel/clientes2?project=tanzania-408718';

function registerCustomer() {
    const nome = document.getElementById('nome').value;
    const email = document.getElementById('email').value;
    const telefone = document.getElementById('telefone').value;
    const endereco = document.getElementById('endereco').value;

    const data = {
        fields: {
            nome: { stringValue: nome },
            email: { stringValue: email },
            telefone: { stringValue: telefone },
            endereco: { stringValue: endereco }
        }
    };

    fetch(baseURL, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ fields: data.fields }),
    })
    .then(response => response.json())
    .then(() => {
        console.log('Customer registered successfully!');
        document.getElementById('customerForm').reset();
        fetchCustomers();
    })
    .catch(error => {
        console.error('Error registering customer:', error);
    });
}

function fetchCustomers() {
    const customerList = document.getElementById('customerList');
    customerList.innerHTML = ''; // Clear previous entries

    fetch(baseURL, {
        method: 'GET'
    })
    .then(response => response.json())
    .then(data => {
        data.documents.forEach(doc => {
            const customerData = doc.fields;
            const customerInfo = `Nome: ${customerData.nome.stringValue}, Email: ${customerData.email.stringValue}, Telefone: ${customerData.telefone.stringValue}, Endereço: ${customerData.endereco.stringValue}`;
            const listItem = document.createElement('div');
            listItem.textContent = customerInfo;
            customerList.appendChild(listItem);
        });
    })
    .catch(error => {
        console.error('Error fetching customers:', error);
    });
}
