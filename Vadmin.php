<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tabla de Usuarios</title>
  <style>
    body {
        font-family: Arial, sans-serif;
        font-size: 16px;
    }
    table {
      border-collapse: collapse;
      width: 90%;
    }
    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }
    th {
      background-color: #f2f2f2;
    }
    button {
    background-color: #4caf50;
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    width: 25%;
    margin-top: 5px;
}
    h2 {

    }
  </style>
</head>
<body>

<h2>Tabla de Usuarios</h2>

<table id="userTable" style="margin: 20px;">
  <tr>
    <th>Nombre</th>
    <th>Edad</th>
    <th>Correo</th>
    <th>Acceso</th>
  </tr>
</table>

<button style="margin: 20px;">Cerrar sesión</button>

<script>
  // Array de usuarios inventados
  const usuarios = [
    { nombre: "Juan", edad: 30, correo: "juan@example.com" },
    { nombre: "María", edad: 25, correo: "maria@example.com" },
    { nombre: "Pedro", edad: 35, correo: "pedro@example.com" }
  ];

  // Función para renderizar la tabla de usuarios
  function renderizarUsuarios() {
    const table = document.getElementById("userTable");
    table.innerHTML = `
      <tr>
        <th>Nombre</th>
        <th>Edad</th>
        <th>Correo</th>
        <th>Acceso</th>
      </tr>
    `;
    usuarios.forEach(usuario => {
      const row = `
        <tr>
          <td>${usuario.nombre}</td>
          <td>${usuario.edad}</td>
          <td>${usuario.correo}</td>
          <td><button onclick="toggleBloqueado(this)">Bloquear</button></td>
        </tr>
      `;
      table.innerHTML += row;
    });
  }

  // Función para alternar entre bloquear y desbloquear usuarios
  function toggleBloqueado(button) {
    const usuarioRow = button.parentElement.parentElement;
    const nombreUsuario = usuarioRow.cells[0].innerText;
    const usuario = usuarios.find(user => user.nombre === nombreUsuario);

    if (button.textContent === "Bloquear") {
      button.textContent = "Desbloquear";
      button.style.backgroundColor = "red";
      usuarioRow.style.backgroundColor = "#ffcdd2"; // Cambia el color de fondo para indicar bloqueado
    } else {
      button.textContent = "Bloquear";
      button.style.backgroundColor = "green";
      usuarioRow.style.backgroundColor = ""; // Restaura el color de fondo a su estado original
    }
  }

  // Llama a la función para renderizar la tabla al cargar la página
  renderizarUsuarios();
</script>

</body>
</html>