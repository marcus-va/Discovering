function salvarCliente() {
  const nome = document.querySelector("#nome").value;
  const email = document.querySelector("#email").value;
  const telefone = document.querySelector("#telefone").value;
  const endereco = document.querySelector("#endereco").value;

  const dados = {
    nome,
    email,
    telefone,
    endereco,
  };

  fetch("script.php", {
    method: "POST",
    body: JSON.stringify(dados),
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        alert("Cliente salvo com sucesso!");
      } else {
        alert("Erro ao salvar cliente!");
      }
    });
}

document.querySelector(".btn-primary").addEventListener("click", salvarCliente);
