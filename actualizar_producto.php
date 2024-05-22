<?php
// Verificar si se ha enviado el formulario de actualización
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si los campos del formulario están establecidos y no están vacíos
    if (isset($_POST["nombreEdit"]) && isset($_POST["precioEdit"]) && isset($_POST["cantidadEdit"])) {
        // Obtener los datos enviados desde el formulario
        $nombre = $_POST["nombreEdit"];
        $precio = $_POST["precioEdit"];
        $cantidad = $_POST["cantidadEdit"];

        // Aquí deberías validar y sanitizar los datos recibidos antes de continuar

        // Incluir el archivo de conexión a la base de datos
        include('conexion.php');

        // Consulta para actualizar los datos del producto
        $consulta = "UPDATE productos SET Precio = '$precio', Cantidad = '$cantidad' WHERE Nombre = '$nombre'";

        // Ejecutar la consulta
        if (mysqli_query($conn, $consulta)) {
            // Redirigir al usuario de vuelta a la página de la tabla de productos
            header("Location: Vadmin.php");
            exit();
        } else {
            // Si la consulta falla, mostrar un mensaje de error
            echo "Error al actualizar los datos del producto: " . mysqli_error($conn);
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
