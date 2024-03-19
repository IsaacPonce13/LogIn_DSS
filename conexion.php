<?php
$servername = "localhost";
$database = "login";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
<<<<<<< HEAD
?>
=======
// echo "Connected successfully";
function cerrarConexion($conn) {
    mysqli_close($conn);
}
?>
>>>>>>> a58d9ece717e12966fe3e31d70e060500f2f76d0
