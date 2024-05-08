<?php
session_start();

// Cerrar sesión
if (isset($_GET['logout'])) {
    session_destroy();
    //header("Location: index.html");
    exit();
}

// Verificar si hay una sesión activa
if (isset($_SESSION['userName']) && isset($_SESSION['nombre'])) {
    // Obtener los datos de la sesión
    $idAdmin = $_SESSION['idAdmin'];
    $userName = $_SESSION['userName'];
    $nombre = $_SESSION['nombre'];
    // Realizar cualquier otra operación que necesites con los datos de la sesión

    // Crear un array con los datos de respuesta
    $response = [
        'idAdmin' => $idAdmin,
        'userName' => $userName,
        'nombre' => $nombre,
    ];

    // Enviar los datos como respuesta en formato JSON
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // Si no hay una sesión activa, puedes enviar una respuesta con un código de error o redireccionar a otra página
    // En este ejemplo, simplemente enviaremos una respuesta vacía
    echo 'Sin datos por que no hay session iniciada.';
}
?>