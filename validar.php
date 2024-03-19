<?php
session_start();

$usuario = $_POST['usuario'];
$contraseña = $_POST['Contraseña'];

include('conexion.php');

// Consulta para verificar en la tabla de usuarios
$consulta_usuarios = "SELECT * FROM usuarios WHERE Nombre = '$usuario' AND Contraseña = '$contraseña'";
$resultado_usuarios = mysqli_query($conn, $consulta_usuarios);
$filas_usuarios = mysqli_num_rows($resultado_usuarios);

// Consulta para verificar en la tabla de administradores
$consulta_admins = "SELECT * FROM admins WHERE Ncuenta = '$usuario' AND Contraseña = '$contraseña'";
$resultado_admins = mysqli_query($conn, $consulta_admins);
$filas_admins = mysqli_num_rows($resultado_admins);

if ($filas_usuarios) {
    $_SESSION['Nombre'] = $usuario;
    header("location: Inicio.html");
} elseif ($filas_admins) {
    $_SESSION['Nombre'] = $usuario;
    header("location: Vadmin.html");
} else {
    include("Login.html");
    echo '<br><h1 class="bad">ERROR EN LA AUTENTIFICACIÓN</h1><br>';
}

mysqli_free_result($resultado_usuarios);
mysqli_free_result($resultado_admins);
mysqli_close($conn);
?>
