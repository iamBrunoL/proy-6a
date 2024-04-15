<?php
// Incluir archivo de conexión
require_once '../../conexion.php';


session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['username'])) {
    // Redirigir al usuario a la página de inicio de sesión
    header("Location: login.php");
    exit;
}

?>



<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro  de datos de usuarios</title> 
  
  
  <!-- Favicons -->
  <link href="../../../img/logo.jpg" rel="icon">
  <link href="../../../img/logo.jpg" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../../diseno/vendor/aos/aos.css" rel="stylesheet">
  <link href="../../../diseno/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../../diseno/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../../../diseno/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../../diseno/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">


  <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<style>
    /* Estilos adicionales */
    body,
    html {
      height: 100%;
    }

    .container-fluid {
      min-height: 100%;
    }

    .sidebar {
      background-color: #f8f9fa;
      padding: 20px;
    }

    .content {
      padding: 20px;
    }

    .footer {
      background-color: #343a40;
      color: #fff;
      padding: 20px;
      text-align: center;
    }

    /* Animaciones */
    .sidebar,
    .nav-link,
    .footer {
      animation: fadeIn 1s ease-in-out;
    }

    @keyframes fadeIn {
      0% {
        opacity: 0;
        transform: translateY(-10px);
      }

      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="../bienvenidaAdmin.php">
      Ferretería DLC
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">

      <ul class="navbar-nav ml-auto">
        <span class="navbar-text" style="padding-right: 255px;">
          Bienvenido
        </span>

        <li class="nav-item dropdown" style="padding-right: 25px;">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Contacto
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="../Contacto/consulta_contacto.php">Consultar msj de contacto</a>
            <a class="dropdown-item" href="../Contacto/modificar_contacto.php">Modificar msj de contacto</a>
            <a class="dropdown-item" href="../Contacto/eliminar_contacto.php">Eliminar msj de contacto</a>
          </div>
        </li>

        <li class="nav-item dropdown" style="padding-right: 25px;">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Compras
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="../Compras/consulta_compras.php">Consultar compras</a>
            <a class="dropdown-item" href="../Compras/modificar_compras.php">Modificar compras</a>
            <a class="dropdown-item" href="../Compras/eliminar_compras.php">Eliminar compras</a>
            <a class="dropdown-item" href="../../carrito/CompraProductos.php">Agregar compras</a>
          </div>
        </li>

        <li class="nav-item dropdown" style="padding-right: 25px;">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Usuarios
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="consulta_usuarios.php">Consultar usuarios</a>
            <a class="dropdown-item" href="modificar_usuarios.php">Modificar usuarios</a>
            <a class="dropdown-item" href="eliminar_usuarios.php">Eliminar usuarios</a>
          </div>
        </li>

        <li class="nav-item dropdown" style="padding-right: 25px;">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Productos
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="../Productos/consulta_productos.php">Consultar productos</a>
            <a class="dropdown-item" href="../Productos/modificar_productos.php">Modificar productos</a>
            <a class="dropdown-item" href="../Productos/eliminar_productos.php">Eliminar productos</a>
            <a class="dropdown-item" href="../Productos/registro_productos.php">Agregar productos</a>
          </div>
        </li>

        <li class="nav-item active">
          <a class="nav-link" href="../../cerrar_sesion.php">Cerrar sesión</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container-fluid d-flex flex-column">
    <div class="row flex-grow-1">
      <div class="col-md-2 sidebar">
      
      <h2>Contacto</h2>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="../Contacto/consulta_contacto.php">Consultar msj de contacto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Contacto/modificar_contacto.php">Modificar  msj de contacto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Contacto/eliminar_contacto.php">Eliminar  msj de contacto</a>
          </li>
        </ul>
        <hr>

      
      <h2>Compras</h2>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="../Compras/consulta_compras.php">Consultar compras</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Compras/modificar_compras.php">Modificar compras</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Compras/eliminar_compras.php">Eliminar compras</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../carrito/CompraProductos.php">Agregar compras</a>
          </li>
        </ul>
        <hr>

        <h2>Usuarios</h2>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="consulta_usuarios.php">Consultar usuarios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="modificar_usuarios.php">Modificar usuarios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="eliminar_usuarios.php">Eliminar usuarios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" style="color:black;">Agregar usuarios</a>
          </li>
        </ul>
        <hr>
        <h2>Productos</h2>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="../Productos/consulta_productos.php">Consultar productos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Productos/modificar_productos.php">Modificar productos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Productos/eliminar_productos.php">Eliminar productos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Productos/registro_productos.php">Agregar productos</a>
          </li>
        </ul>
      </div>
      <div class="col-md-10 content">
		
	  
      <h1 class="text-center">Registro de Usuarios</h1>
<?php

// Inicializar variables de error
$registro_error = "";

// Variable para almacenar el mensaje de éxito
$message = '';

// Verificar si se recibió una solicitud de registro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener valores del formulario
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $correo = $_POST["correo"];
    $direccion = $_POST["direccion"];
    $username = $_POST["username"];
    $edad = $_POST["edad"];
    $genero = $_POST["genero"];
    $password = $_POST["password"];
	
    $nivel = $_POST["nivel"];
    $confirm_password = $_POST["confirm_password"];

    // Verificar si las contraseñas coinciden
    if ($password != $confirm_password) {
        $registro_error = "Las contraseñas no coinciden";
    } else {
        // Verificar si el nombre de usuario ya existe en la tabla de usuarios
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE username = ?");
        $stmt->execute([$username]);
        $usuario = $stmt->fetch();

        if ($usuario) {
            // El nombre de usuario ya existe, mostrar mensaje de error
            $registro_error = "El nombre de usuario ya está en uso. Por favor, elija otro.";
        } else {
            // Registrar el usuario en la base de datos
            $stmt = $pdo->prepare("INSERT INTO usuarios (nombre, apellido, correo, direccion, username, edad, genero, contrasena,nivel) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$nombre, $apellido, $correo, $direccion, $username, $edad, $genero, $password, $nivel]);

            $message = "¡Registro exitoso!";
        }
    }
}
?>



<?php if ($registro_error != "") { ?>
			<div class="alert alert-danger"><?php echo $registro_error; ?></div>
		<?php } ?>

		<?php if ($message !== '') { ?>
        <div class="alert alert-success"><?php echo $message; ?></div>
    <?php } ?>

    

		<form method="post">
			<div class="form-group">
				<label for="nombre">Nombre:</label>
				<input type="text" name="nombre" class="form-control" required>
			</div>

			<div class="form-group">
				<label for="apellido">Apellido:</label>
				<input type="text" name="apellido" class="form-control" required>
			</div>

			<div class="form-group">
				<label for="correo">Correo electrónico:</label>
				<input type="email" name="correo" class="form-control" required>
			</div>

			<div class="form-group">
				<label for="direccion">Dirección:</label>
				<input type="text" name="direccion" class="form-control" required>
			</div>

			<div class="form-group">
				<label for="username">Nombre de usuario:</label>
				<input type="text" name="username" class="form-control" required>
			</div>

			<div class="form-group">
				<label for="edad">Edad:</label>
				<input type="number" name="edad" class="form-control" required>
			</div>

			<div class="form-group">
				<label for="nivel">Nivel:</label>
				<select name="nivel" class="form-control" required>
					<option value="">Seleccionar</option>
					<option value="Administrador">Administrador</option>
					<option value="Cliente">Cliente</option>
				</select>
			</div>

			<div class="form-group">
				<label for="genero">Género:</label>
				<select name="genero" class="form-control" required>
					<option value="">Seleccionar</option>
					<option value="Masculino">Masculino</option>
					<option value="Femenino">Femenino</option>
					<option value="Otro">Otro</option>
				</select>
			</div>

			<div class="form-group">
    <label for="password">Contraseña:</label>
    <input type="password" name="password" class="form-control" required>
</div>

<div class="form-group">
    <label for="confirm_password">Confirmar contraseña:</label>
    <input type="password" name="confirm_password" class="form-control" required>
</div>

<div class="form-group">
    <input type="submit" value="Registrar usuario" class="btn btn-primary">
</div>

</form>

      </div>
    </div>
  </div>

  


   <!-- ======= Footer ======= -->
   <footer id="footer">
    <hr>
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6 footer-contact">
            <h3>Ferretería D.L.C</h3>
            <p>
              Olivares Santana No. 107,<br>
              Ciénega Grande, Asientos,<br>
              Aguascalientes.<br><br>
              <strong style="color: blue;">Teléfono:</strong> 496 143 54 65.<br>
              <strong style="color: blue;">Correo:</strong> mdelunacervantes@yahoo.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Frecuente</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="../../../antecedentes.html">Antecedentes</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="../../../aplicacion/carrito/CompraProductos.php">Productos</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-3 footer-links">
            <h4>Acerca de</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="../../../contacto.php">Contacto</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="../../../preguntas_frecuentes.html">Preguntas frecuentes</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="../../../mision.html">Misión y Visión</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Redes Sociales</h4>
            <p>Para ser avisado o estar informado sobre promociones, síganos en nuestras redes sociales.</p>
            <div class="social-links mt-3">
              <a href="https://www.facebook.com/people/Ferreter%C3%ADa-Dlc/pfbid04ec6Bq2G5VhsQEyVesJRxf4jDZotEPAA1wXJUSScp2hyFBB4Gp77E77SepmbNCqCl/" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="https://wa.link/l31kb3" class="instagram"><i class="bx bxl-whatsapp"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div><br>
  </footer><!-- End Footer -->

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>