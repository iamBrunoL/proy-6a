<?php
// Configuración de la conexión a la base de datos
$servidor = "localhost";
$usuario = "root";
$password = "";
$nombreBD = "tienda";


// Crear conexión
$conexion = new mysqli($servidor, $usuario, $password, $nombreBD);

// Verificar si la conexión es correcta
if ($conexion->connect_error) {
    die("La conexión ha fallado " . $conexion->connect_error);
}

// Función para verificar si hay una sesión iniciada
function sesion_iniciada() {
    session_start();
    if (isset($_SESSION['username'])) {
        return true;
    } else {
        return false;
    }
}

// Crear una instancia de PDO
try {
    $pdo = new PDO("mysql:host=$servidor;dbname=$nombreBD", $usuario, $password);
    // Configurar PDO para que lance excepciones en caso de errores
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Si la conexión falla, mostrar un mensaje de error
    die("Conexión fallida: " . $e->getMessage());
}

// Función para iniciar sesión
function iniciar_sesion($username, $password) {
    global $conexion, $pdo;
    
    $maxIntentos = 3; // Establece el número máximo de intentos permitidos
$tiempoEspera = 190; // Tiempo de espera en segundos

session_start(); // Inicia la sesión

if (isset($_SESSION['intentos'])) {
    $_SESSION['intentos']++; // Incrementa el contador de intentos fallidos
} else {
    $_SESSION['intentos'] = 1; // Inicializa el contador si no existe
}

if ($_SESSION['intentos'] > $maxIntentos) {
    // Si se supera el límite de intentos
    if (isset($_SESSION['tiempoEspera']) && time() - $_SESSION['tiempoEspera'] < $tiempoEspera) {
        // Si todavía está dentro del tiempo de espera, muestra un mensaje de error y redirige al usuario
        $tiempoRestante = $tiempoEspera - (time() - $_SESSION['tiempoEspera']);
        echo "<script>alert('Se ha superado el límite de intentos de inicio de sesión.');</script>";
        echo "<link href='css/style.css' rel='stylesheet'>";
        echo "<div class='container tarjetacompra2'>
        <img src='../img/tiempo_espera.png' class='tiempoDeEspera'>

        <h1>Por favor, espere <span id='tiempoRestante' style='color: blue;'>$tiempoRestante</span> segundos y actualice la página</h1>
        </div>";

        // JavaScript para actualizar dinámicamente el contador de tiempo restante
        echo "<script>
            var tiempoRestante = $tiempoRestante;
            var tiempoRestanteElement = document.getElementById('tiempoRestante');

            function actualizarContador() {
                if (tiempoRestante > 0) {
                    tiempoRestante--;
                    tiempoRestanteElement.textContent = tiempoRestante;
                    setTimeout(actualizarContador, 1000); // Actualiza cada segundo
                }
            }

            actualizarContador();
        </script>";

        exit; // Finaliza la ejecución del script después de la redirección
    } else {
        // Si ha pasado el tiempo de espera, restablece los intentos y marca el nuevo tiempo de espera
        $_SESSION['intentos'] = 1;
        $_SESSION['tiempoEspera'] = time();
    }
}
    
    $sql = "SELECT * FROM usuarios WHERE username=:username AND contrasena=:password";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($result) {
        $_SESSION['username'] = $result['username'];
        $_SESSION['nivel'] = $result['nivel'];
        
        $_SESSION['intentos'] = 0; // Restablece el contador de intentos fallidos
        
        if ($result['nivel'] == 'Administrador') {
            header("Location: admin/bienvenidaAdmin.php"); // Redirigir a la página de administrador
        } else {
            header("Location: cliente/bienvenidaCliente.php"); // Redirigir a la página de cliente
        }
        exit;
    } else {
        return false;
    }
}

// Función para registrar un nuevo usuario
function registrar_usuario($nombre, $apellido, $correo, $direccion, $username, $edad, $genero, $password, $nivel) {
    global $conexion, $pdo;
    $sql = "INSERT INTO usuarios (nombre, apellido, correo, direccion, username, edad, genero, contrasena, nivel)
    VALUES (:nombre, :apellido, :correo, :direccion, :username, :edad, :genero, :password, :nivel)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellido', $apellido);
    $stmt->bindParam(':correo', $correo);
    $stmt->bindParam(':direccion', $direccion);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':edad', $edad);
    $stmt->bindParam(':genero', $genero);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':nivel', $nivel);
    
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

// Función para registrar una compra
function registrar_compra($id_usuario, $fecha, $total) {
    global $conexion, $pdo;
    $sql = "INSERT INTO compras (id_usuario, fecha, total) VALUES (:id_usuario, :fecha, :total)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_usuario', $id_usuario);
    $stmt->bindParam(':fecha', $fecha);
    $stmt->bindParam(':total', $total);
    
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}
?>