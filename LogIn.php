<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión y Registrar</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://www.google.com/recaptcha/api.js?render=explicit"async defer></script>
</head>
<body>
    <form id="loginForm" action="validar.php" method="post">
        <label for="usuario">Usuario:</label>
        <input type="text" id="username" name="usuario" required placeholder="Usuario">

        <label for="Contraseña">Contraseña:</label>
        <input type="password" id="password" name="Contraseña" required placeholder="Contraseña">
        <!-- onclick="login()" -->
        <button type="submit" >Iniciar sesión</button>

        <div class="form-group">
            <div id="recaptcha" class="g-recaptcha"></div>
        </div>
    </form>
    <script>
        grecaptcha.ready(function () {
            grecaptcha.render("recaptcha", {
            sitekey: "6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI",
            });
        });

        form.addEventListener("submit", (event) => {
            event.preventDefault();
            grecaptcha.execute();
        });

        grecaptcha.render("recaptcha", {
            sitekey: "6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI",
            callback: function (token) {
                submitBtn.disabled = false;
                submitBtn.addEventListener("click", () => {
                    // Realizar la acción de inicio de sesión aquí
                    console.log("Inicio de sesión exitoso");
                });
            },
        });
    </script>

    <div id="register-link">
        <p>¿No tienes una cuenta? <a href="#" onclick="showRegisterForm()">Regístrate</a></p>
    </div>

    <form id="registerForm" action="#" method="post" style="display: none;">
        <h2>Registro</h2>

        <label for="newusuario">Nuevo Usuario:</label>
        <input type="text" id="newusuario" name="newusuario" required>

        <label for="newPassword">Nueva Contraseña:</label>
        <input type="password" id="newPassword" name="newPassword" required>

        <button type="button" onclick="register()">Registrarse</button>
        <button type="button" onclick="CloseRegisterForm()">Cancelar</button>
    </form>
    <!-- <script src="LogIn.js"></script> -->
</body>
</html>
