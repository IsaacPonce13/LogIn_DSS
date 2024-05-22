<?php
// Verificar si se ha enviado el formulario de agregar producto
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si los campos del formulario están establecidos y no están vacíos
    if (isset($_POST["nombre"]) && isset($_POST["precio"]) && isset($_POST["cantidad"])) {
        // Obtener los datos enviados desde el formulario
        $nombre = $_POST["nombre"];
        $precio = $_POST["precio"];
        $cantidad = $_POST["cantidad"];

        // Aquí deberías validar y sanitizar los datos recibidos antes de continuar

        // Incluir el archivo de conexión a la base de datos
        include('conexion.php');

        // Consulta para agregar un nuevo producto a la base de datos
        $consulta = "INSERT INTO productos (Nombre, Precio, Cantidad) VALUES ('$nombre', '$precio', '$cantidad')";

        // Ejecutar la consulta
        if (mysqli_query($conn, $consulta)) {
            // Redirigir al usuario de vuelta a la página de la tabla de productos
            header("Location: Vadmin.php");
            exit();
        } else {
            // Si la consulta falla, mostrar un mensaje de error
            echo "Error al agregar el producto: " . mysqli_error($conn);
        }

        // Cerrar la conexión a la base de datos
        mysqli_close($conn);
    } else {
        // Si algún campo del formulario no está establecido o está vacío, mostrar un mensaje de error
        echo "Por favor, complete todos los campos del formulario.";
    }
} else {
    // Si el método de solicitud no es POST, redirigir al usuario a la página de inicio de sesión
    header("Location: Index.php");
    exit();
}
?>
