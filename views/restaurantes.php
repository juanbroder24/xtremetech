<?php
session_start(); // Iniciar la sesión
include 'db.php';
include 'funciones.php';

// Acceder a la variable de sesión 'zona'
if (isset($_SESSION['zona'])) {
    $zona = $_SESSION['zona'];
} else {
    echo "La zona no está definida";
}
?>

<!DOCTYPE html>
<html lang="es">
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
      background-color: #000000;
      height: 100vh; /* Establece la altura de la página al 100% del viewport */
      margin: 0; /* Elimina el margen por defecto del body */
      padding: 0; /* Elimina el padding por defecto del body */
      color: #ffffff; /* Establece el color del texto a blanco */
    }

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
  </style>
</head>
<body>

    <!-- Encabezado con menú desplegable -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="../logo%20xtremetech.png" alt="Logo de XtremeTech" width="70" height="70">
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
                                  <a class="dropdown-item" href="zona_norte.php">Zona Norte</a>
                                </li>
                                <li>
                                   <a class="dropdown-item" href="zona_centro.php">Zona Centro</a>
                                </li>
                                <li>
                                   <a class="dropdown-item" href="zona_sur.php">Zona Sur</a>
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
        <h1 class="fw-bold text-danger">Restaurantes</h1>
        <h5 class="text-danger">Las <span style="letter-spacing: 2px;">experiencias</span> <span style="letter-spacing: 2px;">nocturnas</span> <span style="letter-spacing: 2px;">más</span> <span style="letter-spacing: 2px;">exclusivas</span> <span style="letter-spacing: 2px;">en</span> <span style="letter-spacing: 2px;">Córdoba</span></h5>
        <br>
        <!-- Botón de volver -->
        <?php if ($_SESSION['zona'] == 1)  :?>
             <a class="btn btn-secondary btn-lg mt-3" href="zona_norte.php">Volver</a>
         <?php else :?>
          <?php if ($_SESSION['zona'] == 2)  :?>
             <a class="btn btn-secondary btn-lg mt-3" href="zona_centro.php">Volver</a>
         <?php else :?>
                  <a class="btn btn-secondary btn-lg mt-3" href="zona_sur.php">Volver</a>
          <?php endif; ?>
         <?php endif; ?>
        <br>
    </div>

<?php

$sql = "SELECT * FROM restaurants where Id_Zonas = $zona";
$result = $conn->query($sql);

echo "<div class='container justify-content-center'>";
// Mostrar los datos en un estilo minimalista
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='row my-4'>";
        echo "<div class='col-md-4'>";
        echo "<img src='" . $row["Foto"] . "' class='img-fluid rounded' alt='" . $row["Nombre"] . "'>";
        echo "</div>";
        echo "<div class='col-md-8'>";
        echo "<h5 class='text-danger'>" . $row["Nombre"] . "</h5>";
        echo "<p>" . $row["Direccion"] . "</p>";
        echo "<p><small>" . $row["Horario"] . "</small></p>";
        if ($row["CantComentarios"] != 0) {
            echo mostrar_estrellas($row["PuntajeAcum"] / $row["CantComentarios"]);
        } else {
            echo "Sin calificaciones";
        }
        echo "<div class='mt-2'>";
        echo "<form action='../includes/funciones.php' method='post'>";
        echo "<input type='hidden' name='Nombre' value='" . $row["Nombre"] . "'>";
        echo "<button type='submit' name='accion' value='ver_comentarios_restaurantes' class='btn btn-danger mx-2'>Ver Comentarios</button>";
        echo "<input type='hidden' name='Nombre' value='" . $row["Nombre"] . "'>";
        echo "<button type='submit' name='accion' value='dejar_comentarios_restaurantes' class='btn btn-danger mx-2'>Dejar Comentarios</button>";
        echo "</form>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "<p style='text-align: center; margin-top: 20px;'>No se encontraron resultados</p>";
}
echo "</div>";

echo "<div class='container'>";
echo "<br>";
echo "</div>";

// Cerrar la conexión
$conn->close();
?>
