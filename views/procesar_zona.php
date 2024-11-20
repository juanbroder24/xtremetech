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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link rel="icon" type="image/x-icon" href="../assets/IMG/favicon-xtremetech.ico">
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
                                    <button class="dropdown-item" type="submit" name="zona" value="norte">Zona Norte</button>
                                </li>
                                <li>
                                    <button class="dropdown-item" type="submit" name="zona" value="centro">Zona Centro</button>
                                </li>
                                <li>
                                    <button class="dropdown-item" type="submit" name="zona" value="sur">Zona Sur</button>
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
        <h1 style="padding: 50px 100px 50px 100px;" class="fw-bold">Descubre Córdoba Nocturna</h1>
        <h4 style="padding: 10px 100px 150px 50px; line-height: 1.8;">
            Bienvenidos a Xtreme Nights<br> tu guía definitiva para explorar la vibrante vida nocturna <br>y las mejores opciones gastronómicas de Córdoba
        </h4>
    </div>
</body>
</html>
