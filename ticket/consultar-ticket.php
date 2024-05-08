<?php
$servername = "localhost";
$database = "parqueadero";
$username = "root";
$password = "";
$port = 3306;

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $database, $port);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}

// Consultar la información de la tabla Ticket, incluyendo los datos relacionados
$sqlTicket = "SELECT * FROM Ticket";

$resultTicket = $conn->query($sqlTicket);

$tickets = array();

if ($resultTicket->num_rows > 0) {
    while ($row = $resultTicket->fetch_assoc()) {
        $tickets[] = $row;
    }
}

$conn->close();

// Devolver los datos en formato JSON
header('Content-Type: application/json');
echo json_encode($tickets);
?>
