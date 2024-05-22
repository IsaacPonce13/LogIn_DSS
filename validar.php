<?php


$usuario = $_POST['usuario'];
$contraseña = $_POST['Contraseña'];

include('conexion.php');

$hash = hash('sha256', $contraseña);
// Consulta para verificar en la tabla de usuarios
$consulta_usuarios = "SELECT * FROM usuarios WHERE Nombre = '$usuario' AND Contraseña = '$hash'";
$resultado_usuarios = mysqli_query($conn, $consulta_usuarios);
$filas_usuarios = mysqli_num_rows($resultado_usuarios);

// Consulta para verificar en la tabla de administradores
$consulta_admins = "SELECT * FROM admins WHERE Ncuenta = '$usuario' AND Contraseña = '$contraseña'";
$resultado_admins = mysqli_query($conn, $consulta_admins);
$filas_admins = mysqli_num_rows($resultado_admins);


if ($filas_usuarios) {
    $usuario_data = mysqli_fetch_assoc($resultado_usuarios);
    if($usuario_data['Estado']==0){
        include("index.php");
        echo '<br><h1 class="bad">Espera a que el admin active tu cuenta</h1><br>';
    }else {
        session_start();
        $_SESSION['Nombre'] = $usuario; 
        header("location: Inicio.php");
    }   
} elseif ($filas_admins) {
    session_start();
    $_SESSION['Nombre'] = $usuario;
    header("location: Vadmin.php");
}else{
    include("index.php");
    echo '<br><h1 class="bad">ERROR EN LA AUTENTIFICACIÓN</h1><br>';
}

mysqli_free_result($resultado_usuarios);
mysqli_free_result($resultado_admins);
mysqli_close($conn);
?>
