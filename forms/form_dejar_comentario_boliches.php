<?php
session_start()
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
      background-image: url('night.jpg');
      background-size: cover; /* Ajusta la imagen para que cubra toda el área */
     // background-repeat: no-repeat; /* Evita la repetición de la imagen */
     // height: 100vh; /* Establece la altura de la página al 100% del viewport */
     // margin: 0; /* Elimina el margen por defecto del body */
     // padding: 0; /* Elimina el padding por defecto del body */
     // background-color: rgba(255, 255, 255, 0.8);
     // filter: hue-rotate(20deg) saturate(150%);
    }
    table {
      background-color: #2b2628; /* Color de fondo de la tabla */
      margin: 20px auto; /* Margen alrededor de la tabla */
      padding: 10px; /* Relleno dentro de la tabla */
      border-collapse: collapse; /* Colapsar bordes de celda */
      width: 40%; /* Ancho de la tabla */
    }

    th, td {
      border: 1px solid white; /* Borde de celda */
      padding: 8px; /* Relleno dentro de las celdas */
      color: white; /* Color de texto */
.dropdown-item:hover {
      background-color: #D9534F; /* Color de fondo del botón en hover */
      color: white; /* Color del texto del botón en hover */
    }

    }
  </style>
</head>
<body class="text-center">


    <!-- Encabezado con menú desplegable -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">

            <a class="navbar-brand" href="../views/index.php">
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

                            <a href="../views/login.php" class="nav-link">Ingresar</a>

                        </li>

                        <li class="nav-item">

                            <a href="../views/registro.php" class="nav-link">Registrarse</a>

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



    <!-- Boton Volver -->
    <a class="btn btn-secondary btn-lg mt-3" href="../views/boliches.php">Volver</a>
    <br>

<br>
<h5>Dejá tus comentarios sobre </h5>
<?php
include 'db.php';
include 'funciones.php';
include 'mensajes.php';

$nombresitio = isset($_GET['nombresitio']) ? $_GET['nombresitio'] : '';

echo "<h1>" . $nombresitio . "</h1>";
echo "<br>";
echo "<br>";

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los valores del formulario

    $puntaje = $_POST['puntaje'];
    $comentario = $_POST['comentario'];
    $username = $_SESSION['username']; // Recuperar el nombre de usuario de la sesión

    // Preparar la sentencia SQL de inserción
    $sql = "INSERT INTO Comentarios (Tipo, Nombre, Puntaje, Comentario, Fecha, username) 
            VALUES ('BO', '$nombresitio', $puntaje, '$comentario', CURRENT_TIMESTAMP, '$username')";

    // Ejecutar la sentencia SQL
    if ($conn->query($sql) === TRUE) {
       echo "<script>";
        echo "var mensajeFormateado = formatearMensaje('Tu comentario se registró exitosamente', 'success');";
        echo "document.getElementById('mensajeContainer').appendChild(mensajeFormateado);";
        echo "</script>";

        //actualizar puntaje en tabla de sitio
                $sql = "UPDATE boliches 
                SET PuntajeAcum = PuntajeAcum + $puntaje, CantComentarios = CantComentarios + 1
                WHERE Nombre =$_SESSION 'username'";
                $conn->query($sql);
                }
    else {
        echo "<script>";
        echo "var mensajeFormateado = formatearMensaje('Error al insertar el comentario', 'warning');";
        echo "document.getElementById('mensajeContainer').appendChild(mensajeFormateado);";
        echo "</script>";
    }

    // Cerrar la conexión
    $conn->close();
}


echo "<form action='" . $_SERVER["PHP_SELF"] . "?nombresitio=$nombresitio' method='post'>
  <br>
  <label for='puntaje'>Puntaje (de 1 a 5):</label>
  <input type='number' id='puntaje' name='puntaje' min='1' max='5' required>
  <br>
  <label for='comentario'>Comentario:</label>
  <br>
  <textarea id='comentario' name='comentario' rows='4' cols='50' required></textarea>
  <br><br>
  <input type='submit' value='Enviar Comentario'>
</form>";
echo "</div>"; // Cierra el contenedor
?>


</body>
</html>
