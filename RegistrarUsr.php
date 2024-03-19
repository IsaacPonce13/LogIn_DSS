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
        include("Registro.html");
        echo '<br><h1 class="bad">El usuario ya existe. Por favor, elige otro nombre de usuario.</h1><br>';
    } else {
        // El usuario no existe, proceder con la inserción
        // Preparar la consulta SQL para insertar el nuevo usuario
        $hash = hash('sha256', $contraseña);
        $consulta_insertar = "INSERT INTO usuarios (Nombre, Edad, Contraseña, Estado) VALUES ('$nombre', '$edad', '$hash', 0)";
        
        // Ejecutar la consulta
        if (mysqli_query($conn, $consulta_insertar)) {
            include("Registro.html");
            echo '<br><h1 class="good"> Usuario registrado con exito </h1><br>';
        } else {
            include("Registro.html");
            echo '<br><h1 class="bad">ERROR EN LA AUTENTIFICACIÓN</h1><br>'. mysqli_error($conn);
        }
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conn);
}
?>
