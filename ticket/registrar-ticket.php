<?php
// Verificar si se recibieron los datos necesarios para registrar 
if (
    isset($_POST['placa']) &&
    isset($_POST['tipoVehiculo']) &&
    isset($_POST['empleado']) &&
    isset($_POST['documento']) &&
    isset($_POST['fechaEntrada']) &&
    isset($_POST['fechaSalida']) &&
    isset($_POST['tarifa']) &&
    isset($_POST['total'])
) {
    $placa = $_POST['placa'];
    $tipoVehiculo = $_POST['tipoVehiculo'];
    $empleado = $_POST['empleado'];
    $documento = $_POST['documento'];
    $fechaEntrada = $_POST['fechaEntrada'];
    $fechaSalida = $_POST['fechaSalida'];
    $tarifa = $_POST['tarifa'];
    $total = $_POST['total'];

    // Establecer conexión con la base de datos
    $conn = new mysqli("localhost", "root", "", "parqueadero");

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Ejecutar consulta INSERT para registrar un nuevo ticket
    $sql = "INSERT INTO Ticket (placa, tipoVehiculo, empleado, documento, fechaEntrada, fechaSalida, tarifa, total)
            VALUES ('$placa', '$tipoVehiculo', '$empleado', '$documento', '$fechaEntrada', '$fechaSalida', '$tarifa', $total)";

    if ($conn->query($sql) === TRUE) {
        // Enviar respuesta de éxito
        echo "El ticket ha sido registrado exitosamente.";
    } else {
        // Enviar respuesta de error
        echo "Error al registrar el ticket: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
} else {
    // Enviar respuesta de error si no se recibieron los datos necesarios
    echo "Datos insuficientes para registrar el ticket. Regresa y asegúrate de llenar todos los campos";
}
?>
