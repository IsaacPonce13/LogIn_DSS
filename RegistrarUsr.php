<?php
// Verificar si se enviaron datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $contraseña = $_POST['contraseña'];
    
    // Conectar a la base de datos
    include('conexion.php');

    // Verificar si el usuario ya existe
    $consulta_existencia = "SELECT * FROM usuarios WHERE Nombre = '$nombre'";
    $resultado_existencia = mysqli_query($conn, $consulta_existencia);

    if (mysqli_num_rows($resultado_existencia) > 0) {
        // El usuario ya existe, mostrar mensaje de error
        echo '<h1 class="bad">El usuario ya existe. Por favor, elige otro nombre de usuario.</h1>';
    } else {
        // El usuario no existe, proceder con la inserción
        // Preparar la consulta SQL para insertar el nuevo usuario
        $consulta_insertar = "INSERT INTO usuarios (Nombre, Edad, Contraseña, Estado) VALUES ('$nombre', '$edad', '$contraseña', 1)";
        
        // Ejecutar la consulta
        if (mysqli_query($conn, $consulta_insertar)) {
            echo '<h1 class="good"> Usuario registrado con exito </h1>';
        } else {
            echo '<h1 class="bad">ERROR EN LA AUTENTIFICACIÓN</h1>'. mysqli_error($conn);
        }
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conn);
}
?>
