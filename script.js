fetch('/customers')
    .then(response => response.json())
    .then(customers => {
        const customersDiv = document.getElementById('customers');
        customers.forEach(customer => {
            const customerDiv = document.createElement('div');
            customerDiv.innerHTML = `
                Name: ${customer.nome}<br>
                Email: ${customer.email}<br>
                Telefone: ${customer.telefone}<br>
                Endereco: ${customer.endereco}<br>
            `;
            customersDiv.appendChild(customerDiv);
        });
    });

const addCustomerForm = document.getElementById('add-customer');
addCustomerForm.addEventListener('submit', (event) => {
    event.preventDefault();
    const nome = document.getElementById('nome').value;
    const email = document.getElementById('email').value;
    const telefone = document.getElementById('telefone').value;
    const endereco = document.getElementById('endereco').value;

    const customerData = {
        nome,
        email,
        telefone,
        endereco
    };

    fetch('/customers', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(customerData)
    })
    .then(response => response.json())
    .then(responseData => {
        console.log(responseData);
        // Clear form fields and display success message
    });
});
