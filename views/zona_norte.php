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
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
   <link rel="shortcut icon" type="image/x-icon" href="../assets/IMG/favicon-xtremetech.ico">
  <title>XtremeTech</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.css">
  <link rel="stylesheet" href="../assets/css/Style.css">
</head>
<body>

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
        <h1 style="padding: 50px 100px 50px 100px;" class="fw-bold">Lo Mejor de Zona Norte</h1>
    <!-- Utiliza las clases de Bootstrap para centrar y hacer más grandes los botones -->
    <div class="d-flex justify-content-center">
        <button class="btn btn-danger btn-lg mx-1" onclick="irA('boliches')">Boliches</button>
        <button class="btn btn-danger btn-lg mx-1" onclick="irA('bares')">Bares</button>
        <button class="btn btn-danger btn-lg mx-1" onclick="irA('restaurantes')">Restaurantes</button>
    </div>



    <!-- Puedes agregar aquí más contenido según tus necesidades -->

    <!-- Puedes agregar enlaces a tus scripts JavaScript aquí -->
    <!-- <script src="script.js"></script> -->
</div>
    <script>
        function irA(categoria) {
            // Puedes agregar código JavaScript para redirigir a la página específica de la categoría
            // Por ejemplo, podrías usar window.location.href
            switch (categoria) {
                case 'boliches':
                    window.location.href = 'boliches.php';
                    break;
                case 'bares':
                    window.location.href = 'bares.php';
                    break;
                case 'restaurantes':
                    window.location.href = 'restaurantes.php';
                    break;
                default:
                    // Manejo de error o redirección predeterminada
                    break;
            }
        }
    </script>

    <!-- Agrega el script de Bootstrap JavaScript (opcional, pero necesario para algunas funcionalidades) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>
</html>

