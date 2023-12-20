// Fetch and display existing customers
function fetchCustomers() {
  fetch("functions/fetchCustomers.php")
      .then(response => response.json())
      .then(data => {
          const customerList = document.getElementById("customerList");
          customerList.innerHTML = "<h2>Customer List</h2>";

          data.forEach(customer => {
              const customerInfo = document.createElement("div");
              customerInfo.innerHTML = `<strong>Name:</strong> ${customer.name}, <strong>Email:</strong> ${customer.email}, <strong>Phone:</strong> ${customer.phone}, <strong>Address:</strong> ${customer.address}`;
              customerList.appendChild(customerInfo);
          });
      });
}

// Register a new customer
function registerCustomer() {
  const form = document.getElementById("customerForm");
  const formData = new FormData(form);

  fetch("functions/registerCustomer.php", {
      method: "POST",
      body: formData
  })
  .then(response => response.json())
  .then(data => {
      console.log(data);
      fetchCustomers(); // Refresh customer list after registration
  });
}

// Fetch customers on page load
window.onload = fetchCustomers;