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

// Consultar la información de la tabla Empleado
$sqlEmpleado = "SELECT * FROM Empleado";
$resultEmpleado = $conn->query($sqlEmpleado);

$empleados = array();

if ($resultEmpleado->num_rows > 0) {
	while ($row = $resultEmpleado->fetch_assoc()) {
		$empleados[] = $row;
	}
}

$conn->close();

// Devolver los datos en formato JSON
header('Content-Type: application/json');
echo json_encode($empleados);
?>
