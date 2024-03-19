<?php
// Verificar si se ha enviado el formulario de actualización
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si los campos del formulario están establecidos y no están vacíos
    if (isset($_POST["nombreEdit"]) && isset($_POST["edadEdit"]) && isset($_POST["contraseñaEdit"]) && isset($_POST["estadoEdit"])) {
        // Obtener los datos enviados desde el formulario
        $nombre = $_POST["nombreEdit"];
        $edad = $_POST["edadEdit"];
        $contraseña = $_POST["contraseñaEdit"];
        $estado = $_POST["estadoEdit"];
        

        // Aquí deberías validar y sanitizar los datos recibidos antes de continuar

        // Incluir el archivo de conexión a la base de datos
        include('conexion.php');

        // Consulta para actualizar los datos del usuario
        $hash = hash('sha256', $contraseña);
        $consulta = "UPDATE usuarios SET Edad = '$edad', Contraseña = '$hash', Estado = '$estado' WHERE Nombre = '$nombre'";

        // Ejecutar la consulta
        if (mysqli_query($conn, $consulta)) {
            // Redirigir al usuario de vuelta a la página de la tabla de usuarios
            header("Location: Vadmin.php");
            exit();
        } else {
            // Si la consulta falla, mostrar un mensaje de error
            echo "Error al actualizar los datos del usuario: " . mysqli_error($conn);
        }

        // Cerrar la conexión a la base de datos
        mysqli_close($conn);
    } else {
        // Si algún campo del formulario no está establecido o está vacío, mostrar un mensaje de error
        echo "Por favor, complete todos los campos del formulario.";
    }
} else {
    // Si el método de solicitud no es POST, redirigir al usuario a la página de inicio de sesión
    header("Location: Login.php");
    exit();
}
?>
