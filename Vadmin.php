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
    width: 30%;
    margin-top: 5px;
}
    h2 {
      font-family: Arial, sans-serif;
    }
  </style>
</head>
<body>

<h2>Tabla de Usuarios</h2>

<table id="userTable" style="margin: 20px;">
  <tr>
    <th>Nombre</th>
    <th>Edad</th>
    <th>Contraseña</th>
    <th>Estado</th>
    <th>Acceso</th>
  </tr>
  <?php
    // Incluir archivo de conexión a la base de datos
    include('conexion.php');
    
    // Consulta para obtener los usuarios desde la tabla usuarios
    $consulta = "SELECT * FROM usuarios";
    $resultado = mysqli_query($conn, $consulta);

    // Renderizar filas de la tabla con los datos de la base de datos
    while ($fila = mysqli_fetch_assoc($resultado)) {
      echo "<tr>";
      echo "<td>" . $fila['Nombre'] . "</td>";
      echo "<td>" . $fila['Edad'] . "</td>";
      echo "<td>" . $fila['Contraseña'] . "</td>";
      echo "<td>" . ($fila['Estado'] ? 'Activo' : 'Inactivo') . "</td>";
      echo "<td><button onclick=\"toggleBloqueado(this)\">" . ($fila['Estado'] ? 'Bloquear' : 'Desbloquear') . "</button></td>";
      echo "</tr>";
    }

    // Liberar resultado y cerrar conexión
    mysqli_free_result($resultado);
    mysqli_close($conn);
  ?>
</table>

<button style="margin: 20px;" onclick="cerrarSesion()">Cerrar sesión</button>
<script>
  function cerrarSesion() {
      // 
      //     mysqli_close($conn); // Cierra la conexión con la base de datos
      // 
      // Redirigir al usuario a la página de inicio de sesión
      window.location.href = "Login.html"; // Reemplaza "login.html" con la URL de tu página de inicio de sesión
  }
</script>
<script>
  // Función para alternar entre bloquear y desbloquear usuarios
  function toggleBloqueado(button) {
    const usuarioRow = button.parentElement.parentElement;
    const nombreUsuario = usuarioRow.cells[0].innerText;
    // No necesitas buscar el usuario en JavaScript, ya que la fila de la tabla ya contiene todos los datos necesarios
    
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
</script>

</body>
</html>
