<?php

session_start();

if (!isset($_SESSION['Nombre'])) {
  header("Location:Index.php");
} else {
  print_r($_SESSION['Nombre']);
}

?>
