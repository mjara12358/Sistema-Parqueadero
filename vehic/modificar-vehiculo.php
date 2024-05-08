<?php
// Verificar si se recibieron los datos necesarios para modificar el vehículo
if (
    isset($_POST['idVehiculo']) &&
    isset($_POST['placa']) &&
    isset($_POST['tipoVehiculo']) &&
    isset($_POST['idEmpleado']
)) {
    $idVehiculo = $_POST['idVehiculo'];
    $placa = $_POST['placa'];
    $tipoVehiculo = $_POST['tipoVehiculo'];
    $idEmpleado = $_POST['idEmpleado'];

    // Establecer conexión con la base de datos
    $conn = new mysqli("localhost", "root", "", "parqueadero");

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Ejecutar consulta UPDATE para modificar el registro del vehículo
    $sql = "UPDATE Vehiculo SET
            placa = '$placa',
            tipoVehiculo = '$tipoVehiculo',
            idEmpleado = $idEmpleado
            WHERE id = $idVehiculo";

    if ($conn->query($sql) === TRUE) {
        // Enviar respuesta de éxito
        echo "El vehículo ha sido modificado exitosamente.";
    } else {
        // Enviar respuesta de error
        echo "Error al modificar el vehículo: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
} else {
    // Enviar respuesta de error si no se recibieron los datos necesarios
    echo "Datos insuficientes para modificar el vehículo. Regresa y asegúrate de llenar todos los campos";
}
?>
