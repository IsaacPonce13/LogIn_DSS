// function login() {
//     var username = document.getElementById('username').value;
//     var password = document.getElementById('password').value;
//     console.log('Intento de inicio de sesión:', username, password);
// }

// function showRegisterForm() {
//     document.getElementById('loginForm').style.display = 'none';
//     document.getElementById('registerForm').style.display = 'block';
// }

// function CloseRegisterForm() {
//     document.getElementById('loginForm').style.display = 'block';
//     document.getElementById('registerForm').style.display = 'none';
// }


// function register() {
//     var newUsername = document.getElementById('newUsername').value;
//     var newPassword = document.getElementById('newPassword').value;
//     console.log('Intento de registro:', newUsername, newPassword);
// }
var users = [
    { username: 'admin', password: '123456' },
    { username: 'usuario1', password: '654321' }
];

function hashPassword(password) {

    return btoa(password);
}

function login() {
    var username = document.getElementById('username').value;
    var password = hashPassword(document.getElementById('password').value);

    var user = users.find(u => u.username === username && u.password === password);
    
    if (user) {
        alert('¡Bienvenido, ' + username + '!');
    } else {
        alert('Credenciales incorrectas. Por favor, inténtalo de nuevo.');
    }
}

function showRegisterForm() {
    document.getElementById('loginForm').style.display = 'none';
    document.getElementById('registerForm').style.display = 'block';
    document.getElementById('register-link').style.display = 'none';
}

function CloseRegisterForm() {
    document.getElementById('loginForm').style.display = 'block';
    document.getElementById('registerForm').style.display = 'none';
    document.getElementById('register-link').style.display = 'block';
}

function register() {
    var newUsername = document.getElementById('newUsername').value;
    var newPassword = hashPassword(document.getElementById('newPassword').value);

    if (users.some(u => u.username === newUsername)) {
        alert('El nombre de usuario ya existe. Por favor, elige otro.');
    } else {
        users.push({ username: newUsername, password: newPassword });
        alert('¡Registro exitoso para ' + newUsername + '! Ahora puedes iniciar sesión.');
        CloseRegisterForm();
    }
}

