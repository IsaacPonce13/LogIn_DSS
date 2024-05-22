<?php


// Incluye el archivo de conexión a la base de datos
include('sesiones.php');
include 'conexion.php';


// Accede al nombre de usuario desde la variable de sesión
$nombreUsuario = $_SESSION['Nombre'];

// Consulta para obtener los datos del usuario
$consulta = "SELECT * FROM usuarios WHERE Nombre = '$nombreUsuario'";
$resultado = mysqli_query($conn, $consulta);

if (!$resultado) {
    // Manejo de errores si la consulta falla
    die("Error al obtener datos del usuario: " . mysqli_error($conn));
}

// Obtener los datos del usuario como un arreglo asociativo
$usuario = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        p {
            text-align: center;
            color: #666;
        }
        form {
            margin-top: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        span {
            display: inline-block;
            margin-bottom: 10px;
            padding: 8px 12px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            display: block;
            margin: 20px auto 0;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Mi Perfil</h2>
        <p>Bienvenido, <?php echo $nombreUsuario; ?></p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="nombre">Nombre:</label>
            <span><?php echo $usuario['Nombre']; ?></span>
            
            <label for="edad">Edad:</label>
            <span><?php echo $usuario['Edad']; ?></span>
            
            <label for="contraseña">Contraseña:</label>
            <span><?php echo $usuario['Contraseña']; ?></span>
            
        </form>
    </div>
</body>
</html>


<?php
// Cierra la conexión con la base de datos al finalizar
mysqli_close($conn);
?>
