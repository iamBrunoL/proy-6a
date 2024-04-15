<?php
// Incluye el archivo de conexión a la base de datos
include 'conexion.php';

// Cierra la sesión actual
session_start();
session_destroy();

// Borra el LocalStorage
echo '<script>
        localStorage.clear();
        window.location.href = "login.php";
      </script>';
exit;
?>
