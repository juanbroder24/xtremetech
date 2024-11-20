<?php
session_start();
if (isset($_POST['zona'])) {
  switch ($_POST['zona']) {
    case 'norte':
      $_SESSION['zona'] = 1;
      header("Location: zona_norte.php");
      exit();
    case 'centro':
      $_SESSION['zona'] = 2;
      header("Location: zona_centro.php");
      exit();
    case 'sur':
      $_SESSION['zona'] = 3;
      header("Location: zona_sur.php");
      exit();
  }
}

// Configuración de la conexión a la base de datos
include 'db.php';

// Registro de usuario
if(isset($_POST['registro'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (user_login, user_email, user_pass) VALUES ('$username', '$email', '$contraseña')";
    if ($conn->query($sql) === TRUE) {
        $sql = "SELECT * FROM users WHERE user_email='$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['username'] = $row['user_login'];
            header('Location: procesar_zona.php');
            exit();
        } else {
            echo "Usuario no encontrado.";
        }
    } else {
        echo "Error al registrar el usuario: " . $conn->error;
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
     <link rel="shortcut icon" type="image/x-icon" href="../assets/IMG/favicon-xtremetech.ico">
    <title>XtremeTech</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <style>
    /* Estilo para el fondo de la página */
    body {
      /* Estilo para el fondo de la página */
      background-color: #000000;
      height: 100vh; /* Establece la altura de la página al 100% del viewport */
      margin: 0; /* Elimina el margen por defecto del body */
      padding: 0; /* Elimina el padding por defecto del body */
      color: #ffffff; /* Establece el color del texto a blanco */

    /* Estilo para los botones */
    .btn-danger {
      background-color: #D9534F;
      border-color: #D9534F;
    }

    .btn-danger:hover {
      background-color: #C9302C;
      border-color: #B92C28;
    }

    .btn-danger:focus, .btn-danger.focus {
      box-shadow: 0 0 0 0.25rem rgba(217, 83, 79, 0.5);
    }

    .btn-danger.disabled, .btn-danger:disabled {
      background-color: #D9534F;
      border-color: #D9534F;
    }

    .btn-danger:not(:disabled):not(.disabled):active, .btn-danger:not(:disabled):not(.disabled).active,
    .show > .btn-danger.dropdown-toggle {
      background-color: #B92C28;
      border-color: #AC2925;
    }

    .btn-danger:not(:disabled):not(.disabled):active:focus, .btn-danger:not(:disabled):not(.disabled).active:focus,
    .show > .btn-danger.dropdown-toggle:focus {
      box-shadow: 0 0 0 0.25rem rgba(217, 83, 79, 0.5);
    }
.dropdown-item:hover {
      background-color: #D9534F; /* Color de fondo del botón en hover */
      color: white; /* Color del texto del botón en hover */
    }
     }
  </style>
</head>
 <!-- Encabezado con menú desplegable -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">

            <a class="navbar-brand" href="index.php">
                <img src="../logo%20xtremetech.png" alt="Logo de XtremeTech" width="70" height="70">
                </a>
                       </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">

                <ul class="navbar-nav">

                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">

                            Navegar

                        </a>

                      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
    <form method="POST" action="">
        <li>
            <button class="dropdown-item type="submit" name="zona" value="norte">Zona Norte</button>
        </li>
        <li>
            <button class="dropdown-item type="submit" name="zona" value="centro">Zona Centro</button>
        </li>
        <li>
            <button class="dropdown-item type="submit" name="zona" value="sur">Zona Sur</button>
        </li>
    </form>
</ul>




                    </li>
                    <?php if (!isset($_SESSION['username'])): ?>
                                              <li class="nav-item">

                            <a href="login.php" class="nav-link">Ingresar</a>

                        </li>

                        <li class="nav-item">

                            <a href="registro.php" class="nav-link">Registrarse</a>

                        </li>

                    <?php else: ?>

                        <li class="nav-item">

                            <span class="nav-link">Bienvenid@ <?php echo $_SESSION['username']; ?></span>

                        </li>

                    <?php endif; ?>

                </ul>

            </div>

        </div>

    </nav>
  <div class="container text-center">
    <br>
    <h3>Registrate</h3>
    <br>
    <h6>Si no tenés usuario en nuestra plataforma registrate acá</h6>
    <form method="post" action="">
        <input type="text" class="form-control-sm rounded-3 mb-2" name="username" placeholder="Usuario" required><br>
        <input type="email" class="form-control-sm rounded-3 mb-2" name="email" placeholder="Email" required><br>
        <input type="password" class="form-control-sm rounded-3 mb-2" name="contraseña" placeholder="Contraseña" required><br><br>
        <button class="btn btn-secondary btn-lg" name="registro" value="Registrar">Registrar</button>
    </form>
</body>
</html>
