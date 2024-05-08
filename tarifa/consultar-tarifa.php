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

// Consultar la información de la tabla Tarifa
$sqlTarifa = "SELECT * FROM Tarifa";
$resultTarifa = $conn->query($sqlTarifa);

$tarifas = array();

if ($resultTarifa->num_rows > 0) {
    while ($row = $resultTarifa->fetch_assoc()) {
        $tarifas[] = $row;
    }
}

$conn->close();

// Devolver los datos en formato JSON
header('Content-Type: application/json');
echo json_encode($tarifas);
?>
