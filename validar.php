<?php
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['Contraseña'];
    session_start();
    $_SESSION['Nombre'] = $usuario;

    include('conexion.php');

    $consulta="SELECT * FROM usuarios WHERE Nombre = '$usuario' AND Contraseña = '$contraseña'";
    $resultado = mysqli_query($conn, $consulta);

    $filas = mysqli_num_rows($resultado);

    if ($filas) {
        header("location:Vadmin.php");
    }else {
        ?>
        <?php
        include("Login.php");
        ?>
        <h1 Class="bad">ERROR EN LA AUTENTIFICACIÓN</h1>
        <?php
    }
    mysqli_free_result($resultado);
    mysqli_close($conn);
?>