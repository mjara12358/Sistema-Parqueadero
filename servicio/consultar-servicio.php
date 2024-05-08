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

// Consultar la información de la tabla Servicio
$sqlServicio = "SELECT Servicio.*, 
                Tarifa.tipoTarifa AS tipoTarifa, Tarifa.valorHora AS valorTarifa
                FROM Servicio
                INNER JOIN Tarifa ON Servicio.idTarifa = Tarifa.id";

$resultServicio = $conn->query($sqlServicio);

$servicios = array();

if ($resultServicio->num_rows > 0) {
    while ($row = $resultServicio->fetch_assoc()) {
        $servicios[] = $row;
    }
}

$conn->close();

// Devolver los datos en formato JSON
header('Content-Type: application/json');
echo json_encode($servicios);
?>
