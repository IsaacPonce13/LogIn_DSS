<?php
// Incluye el archivo de conexión a la base de datos
include('conexion.php');

if (!isset($_SESSION['username'])) {
    header("Location: Login.php");
    exit();
}

// Obtiene la identificación del usuario de la sesión
$idUsuario = $_SESSION['username'];

$consulta = "SELECT * FROM usuarios WHERE  = $idUsuario";
$resultado = mysqli_query($conn, $consulta);

if (!$resultado) {
    // Manejo de errores si la consulta falla
    die("Error al obtener datos del usuario: " . mysqli_error($conn));
}

// Obtiene los datos del usuario
$usuario = mysqli_fetch_assoc($resultado);

// Si se envió el formulario de actualización, actualiza los datos del usuario en la base de datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibe los datos del formulario
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $contraseña = $_POST['contraseña'];

    // Actualiza los datos del usuario en la base de datos
    $actualizar = "UPDATE usuarios SET nombre = '$nombre', edad = $edad, contraseña = '$contraseña' WHERE id = $idUsuario";
    $resultadoActualizar = mysqli_query($conn, $actualizar);

    if (!$resultadoActualizar) {
        // Manejo de errores si la actualización falla
        die("Error al actualizar los datos del usuario: " . mysqli_error($conn));
    }

    // Redirige al usuario a esta misma página para mostrar los datos actualizados
    header("Location: perfil.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil</title>
</head>
<body>
    <h2>Mi Perfil</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $usuario['nombre']; ?>" required>
        
        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" value="<?php echo $usuario['edad']; ?>" required>
        
        <label for="contraseña">Contraseña:</label>
        <input type="password" id="contraseña" name="contraseña" value="<?php echo $usuario['contraseña']; ?>" required>
        
        <button type="submit">Guardar cambios</button>
    </form>
</body>
</html>

<?php
// Cierra la conexión con la base de datos al finalizar
mysqli_close($conn);
?>
