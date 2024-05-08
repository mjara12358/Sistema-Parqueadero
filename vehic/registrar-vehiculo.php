<?php
// Verificar si se recibieron los datos necesarios para registrar un nuevo vehículo
if (
    isset($_POST['placa']) &&
    isset($_POST['tipoVehiculo']) &&
    isset($_POST['idEmpleado'])
) {
    $placa = $_POST['placa'];
    $tipoVehiculo = $_POST['tipoVehiculo'];
    $idEmpleado = $_POST['idEmpleado'];

    // Establecer conexión con la base de datos
    $conn = new mysqli("localhost", "root", "", "parqueadero");

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Ejecutar consulta INSERT para registrar un nuevo vehículo
    $sql = "INSERT INTO Vehiculo (placa, tipoVehiculo, idEmpleado)
            VALUES ('$placa', '$tipoVehiculo', $idEmpleado)";

    if ($conn->query($sql) === TRUE) {
        // Enviar respuesta de éxito
        echo "El vehículo ha sido registrado exitosamente.";
    } else {
        // Enviar respuesta de error
        echo "Error al registrar el vehículo: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
} else {
    // Enviar respuesta de error si no se recibieron los datos necesarios
    echo "Datos insuficientes para registrar el vehículo. Regresa y asegúrate de llenar todos los campos";
}
?>
