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

// Consultar la información de la tabla Vehiculo junto con los nombres de los empleados
$sqlVehiculo = "SELECT Vehiculo.*, Empleado.nombres AS nombresEmpleado 
               FROM Vehiculo
               INNER JOIN Empleado ON Vehiculo.idEmpleado = Empleado.id";
$resultVehiculo = $conn->query($sqlVehiculo);

$vehiculos = array();

if ($resultVehiculo->num_rows > 0) {
    while ($row = $resultVehiculo->fetch_assoc()) {
        $vehiculos[] = $row;
    }
}

$conn->close();

// Devolver los datos en formato JSON
header('Content-Type: application/json');
echo json_encode($vehiculos);

?>
