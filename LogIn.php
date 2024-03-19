<?php
include('conexion.php');
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión y Registrar</title>
    <link rel="stylesheet" href="css/Formularios.css">
    <script src="https://www.google.com/recaptcha/api.js?render=explicit"></script>
</head>
<body>
    <form id="loginForm" action="validar.php" method="post">
        <h2>Iniciar Sesión</h2>
        <label for="usuario">Usuario:</label>
        <input type="text" id="username" name="usuario" required placeholder="Usuario">
    
        <label for="Contraseña">Contraseña:</label>
        <input type="password" id="password" name="Contraseña" required placeholder="Contraseña">
        
        <button type="submit" id="submitBtn" disabled>Iniciar sesión</button> <!-- Botón deshabilitado por defecto -->
    
        <div class="form-group">
            <div id="recaptcha" class="g-recaptcha"></div>
        </div>
    </form>

    <!-- Codigo para agregar el recaptcha -->
    <script>
        const form = document.getElementById("loginForm");
        const submitBtn = document.getElementById("submitBtn");
        grecaptcha.ready(function () {
            grecaptcha.render("recaptcha", {
                sitekey: "6Lcyep0pAAAAAIoivvLTCHWlDyszuGlHKaaNSIVB",
                callback: function (token) {
                    // Habilitar el botón de inicio de sesión después de que se complete el reCAPTCHA
                    submitBtn.disabled = false;
                    submitBtn.classList.add("enabled"); // Agregar clase para cambiar el color del botón
                },
            });
        });
    </script>

    <div id="register-link">
        <p>¿No tienes una cuenta? <a href="Registro.html">Regístrate</a></p>
    </div>
</body>
</html>
