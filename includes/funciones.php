<?php
session_start();
include 'db.php';
include 'mensajes.php';

// Manejar la solicitud POST enviada desde el script JavaScript

if(isset($_POST['accion'])) {
    $accion = $_POST['accion'];
    // Llama a la función correspondiente según la acción recibida
    if($accion == 'mostrar_estrellas') {
        mostrar_estrellas();
    } elseif($accion == 'ver_comentarios_boliches') {
        $nombresitio = $_POST['Nombre'];
        ver_comentarios_boliches($nombresitio);
        }
     elseif($accion == 'dejar_comentarios_boliches') {
        $nombresitio = $_POST['Nombre'];
        dejar_comentarios_boliches($nombresitio);
    }
    elseif($accion == 'ver_comentarios_bares') {
        $nombresitio = $_POST['Nombre'];
        ver_comentarios_bares($nombresitio);
    }
    elseif($accion == 'dejar_comentarios_bares') {
        $nombresitio = $_POST['Nombre'];
        dejar_comentarios_bares($nombresitio);
    }
    elseif($accion == 'ver_comentarios_restaurantes') {
        $nombresitio = $_POST['Nombre'];
        ver_comentarios_restaurantes($nombresitio);
    }
    elseif($accion == 'dejar_comentarios_restaurantes') {
        $nombresitio = $_POST['Nombre'];
        dejar_comentarios_restaurantes($nombresitio);
    }
}

// Definir tus funciones PHP
function mostrar_estrellas($puntaje) {
    // Puntaje (del 1 al 5, puedes cambiar esto)

    // Construir una cadena HTML para mostrar las estrellas
    $estrellas_html = '';
    for ($es = 1; $es <= 5; $es++) {
        if ($es <= $puntaje) {
            $estrellas_html .= '* ';
        }
    }
    // Devolver la cadena HTML de las estrellas
    return $estrellas_html;
}


function ver_comentarios_boliches($nombresitio) {
    if (!isset($_SESSION['username'])) {
    echo "<script>";
        echo "var mensajeFormateado = formatearMensaje('Debes registrarte o ingresar con tu usuario para poder realizar esta acción', 'warning');";
        echo "document.getElementById('mensajeContainer').appendChild(mensajeFormateado);";
        echo "</script>";
        // Redirige a la página de inicio de sesión después de un breve retraso de 5 segundos
        echo "<script>";
        echo "setTimeout(function(){ window.location.href = 'login.php'; }, 5000);"; // Redirigir después de 5 segundos (5000 milisegundos)
        echo "</script>";
    } else {
        echo "<script>window.location.href = 'form_ver_comentario_boliches.php?nombresitio=" . urlencode($nombresitio) . "';</script>";
    }
}

function dejar_comentarios_boliches($nombresitio) {
    if (!isset($_SESSION['username'])) {
    echo "<script>";
        echo "var mensajeFormateado = formatearMensaje('Debes registrarte o ingresar con tu usuario para poder realizar esta acción', 'warning');";
        echo "document.getElementById('mensajeContainer').appendChild(mensajeFormateado);";
        echo "</script>";
        // Redirige a la página de inicio de sesión después de un breve retraso de 5 segundos
        echo "<script>";
        echo "setTimeout(function(){ window.location.href = 'login.php'; }, 5000);"; // Redirigir después de 5 segundos (5000 milisegundos)
        echo "</script>";
    }
    else {
    echo "<script>window.location.href = 'form_dejar_comentario_boliches.php?nombresitio=" . urlencode($nombresitio) . "';</script>";
    }
}

function ver_comentarios_bares($nombresitio) {
    if (!isset($_SESSION['username'])) {
    echo "<script>";
        echo "var mensajeFormateado = formatearMensaje('Debes registrarte o ingresar con tu usuario para poder realizar esta acción', 'warning');";
        echo "document.getElementById('mensajeContainer').appendChild(mensajeFormateado);";
        echo "</script>";
        // Redirige a la página de inicio de sesión después de un breve retraso de 5 segundos
        echo "<script>";
        echo "setTimeout(function(){ window.location.href = 'login.php'; }, 5000);"; // Redirigir después de 5 segundos (5000 milisegundos)
        echo "</script>";
    } else {
        echo "<script>window.location.href = 'form_ver_comentario_bares.php?nombresitio=" . urlencode($nombresitio) . "';</script>";
    }
}

function dejar_comentarios_bares($nombresitio) {
    if (!isset($_SESSION['username'])) {
    echo "<script>";
        echo "var mensajeFormateado = formatearMensaje('Debes registrarte o ingresar con tu usuario para poder realizar esta acción', 'warning');";
        echo "document.getElementById('mensajeContainer').appendChild(mensajeFormateado);";
        echo "</script>";
        // Redirige a la página de inicio de sesión después de un breve retraso de 5 segundos
        echo "<script>";
        echo "setTimeout(function(){ window.location.href = 'login.php'; }, 5000);"; // Redirigir después de 5 segundos (5000 milisegundos)
        echo "</script>";
    }
    else {
    echo "<script>window.location.href = 'form_dejar_comentario_bares.php?nombresitio=" . urlencode($nombresitio) . "';</script>";
    }
}

function ver_comentarios_restaurantes ($nombresitio) {
    if (!isset($_SESSION['username'])) {
    echo "<script>";
        echo "var mensajeFormateado = formatearMensaje('Debes registrarte o ingresar con tu usuario para poder realizar esta acción', 'warning');";
        echo "document.getElementById('mensajeContainer').appendChild(mensajeFormateado);";
        echo "</script>";
        // Redirige a la página de inicio de sesión después de un breve retraso de 5 segundos
        echo "<script>";
        echo "setTimeout(function(){ window.location.href = 'login.php'; }, 5000);"; // Redirigir después de 5 segundos (5000 milisegundos)
        echo "</script>";
    } else {
        echo "<script>window.location.href = 'form_ver_comentario_restaurantes.php?nombresitio=" . urlencode($nombresitio) . "';</script>";
    }
}
function dejar_comentarios_restaurantes($nombresitio) {
    if (!isset($_SESSION['username'])) {
    echo "<script>";
        echo "var mensajeFormateado = formatearMensaje('Debes registrarte o ingresar con tu usuario para poder realizar esta acción', 'warning');";
        echo "document.getElementById('mensajeContainer').appendChild(mensajeFormateado);";
        echo "</script>";
        // Redirige a la página de inicio de sesión después de un breve retraso de 5 segundos
        echo "<script>";
        echo "setTimeout(function(){ window.location.href = 'login.php'; }, 5000);"; // Redirigir después de 5 segundos (5000 milisegundos)
        echo "</script>";
    }
    else {
    echo "<script>window.location.href = 'form_dejar_comentario_restaurantes.php?nombresitio=" . urlencode($nombresitio) . "';</script>";
    }
}

?>
 
