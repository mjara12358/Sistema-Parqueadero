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

// Consultar la información de la tabla usuario
$sqlAdmin = "SELECT * FROM admin";
$resultAdmin = $conn->query($sqlAdmin);

$admins = array();

if ($resultAdmin->num_rows > 0) {
	while ($row = $resultAdmin->fetch_assoc()) {
		$admins[] = $row;
	}
}

$conn->close();

// Devolver los datos en formato JSON
header('Content-Type: application/json');
echo json_encode($admins);
?>